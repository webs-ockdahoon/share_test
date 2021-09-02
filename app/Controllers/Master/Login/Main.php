<?php

namespace App\Controllers\Master\Login;
use App\Controllers\Master\MasterController;

class Main extends MasterController
{
    protected $models = array('MemberModel','LogLoginModel');
    protected $viewPath = "login/login";

    public function index()
    {

        $block_count = 5;   // 최대 연속 로그인 실패 횟수
        $block_time = 5;    // 최대 로그인 실패 회수 초과시 잠김 시간

        if($this->getGet("logout")){
            $array_items = ['MIDX','MID','Mname','Mlevel','Mpass'];
            $this->session->remove($array_items);
            $msg = "로그아웃되었습니다";
            if($this->getGet("redirect"))$msg = "";
            alert($msg,"/master/login");
            exit();
        }

        $validate = $this->validate([
            'mem_id' => [
                'rules'=>'required',
                'errors'=> ['required'=>'아이디를 입력해 주세요.'],
            ],
            'mem_pass' => [
                'rules'=>'required',
                'errors'=> ['required'=>'비밀번호를 입력해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력
            $data = array();
            $this->setView("login", $data);
            $this->setUseLayout(false);
            return $this->run();
        }else{
            $info = $this->getPost();
            $fail_info = $this->LogLoginModel->getFailCount();
            $add_msg = " (". ($fail_info["count"]+1) ."/".$block_count . ")";  // 연속 로그인 실패에 따른 추가 메세지
            if($fail_info["count"]>=$block_count){
                if(strtotime($fail_info["last_at"]) < time() - ($block_time*60)){   // 연속 실패 후 정해진 시간 초과
                    $this->LogLoginModel->resetFail(); // 실패 카운트 리셋
                }else{
                    alert("연속 로그인 실패로 일정시간동안 로그인이 제한도딥니다.");
                }
            }else if($fail_info["count"]+1>=ceil($block_count/2)){    // 지정 제한 횟수의 반이 넘을때는 추가 메세지
                $add_msg.="\\n" . $block_count . "회 이상 로그인 실패시 일정시간동안 로그인이 제한됩니다.";
            }

            if($rs = $this->model->where("mem_level>=",80)->where("mem_id",$info["mem_id"])
                    ->where("mem_deleted_at is null")
                    ->get()->getRowArray()){
                $pass = $this->model->makePassword($info["mem_pass"]);

                if($rs["mem_pass"] == $pass){

                    $session_data = array(
                        "MIDX"=>$rs["mem_idx"],
                        "MID"=>$rs["mem_id"],
                        "Mname"=>$rs["mem_name"],
                        "Mlevel"=>$rs["mem_level"],
                        "Mpass"=>$rs["mem_pass"],
                    );
                    $this->session->set($session_data);
                    $log_idx = $this->write_login_log($info["mem_id"],1);
                    return redirect()->to("/master/");
                }else{
                    $this->write_login_log($info["mem_id"],-1);
                    alert("아이디 또는 비밀번호가 맞지 않습니다.".$add_msg);
                }

            }else{
                $this->write_login_log($info["mem_id"],-1);
                alert("아이디 또는 비밀번호가 맞지 않습니다.".$add_msg);
            }
        }
    }

    private function write_login_log($mem_id,$result){

        $data = array(
          "lol_idx"=>"",
          "lol_mem_id"=>$mem_id,
          "lol_login_result"=>$result,
        );
        $this->LogLoginModel->edit($data);
        $log_idx = $this->LogLoginModel->getInsertID();
        return $log_idx;
    }

}