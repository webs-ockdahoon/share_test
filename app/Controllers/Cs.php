<?php

namespace App\Controllers;

class Cs extends BaseController
{
    protected $models = array('InquiryModel','ReviewModel','DepartmentsModel');
    protected $viewPath = "cs";

    public function inquiry()
    {

        if($this->isAjax && $this->method=="post") {    //-- Form 출력

            $info = $this->getPost();

            if ($info["inq_name"]) {
                $info['inq_lang'] = $this->lang;
                if ($this->InquiryModel->edit($info)) {

                    /**
                     * 담당자 메일 발송하기
                     */
                    $Config = model("ConfigModel");
                    $conf = $Config->getConfig($this->lang,"site");
                    // 이메일 주소 정리 (쉼표로 처리)
                    $to_mail = $conf["manager_email1"];


                    if(trim($to_mail)) {

                        if($info["inq_gender"]=='male')$gender = "남자";
                        else $gender = "여자";

                        $form_content = "";
                        $form_content.= "<b>이름</b> : " . $info["inq_name"] . "<br>";
                        $form_content.= "<b>국적</b> : " . $info["inq_nationality"] . "<br>";
                        $form_content.= "<b>이메일</b> : " . $info["inq_email"] . "<br>";
                        $form_content.= "<b>연락처</b> : " . $info["inq_tel"] . "<br>";
                        $form_content.= "<b>생년월일</b> : " . $info["inq_birth"] . "<br>";
                        $form_content.= "<b>성별</b> : " . $gender . "<br>";
                        $form_content.= "<b>주제</b> : " . $info["inq_title"] . "<br>";
                        $form_content.= "<b>상담내용</b> : " . nl2br($info["inq_content"]) . "<br>";

                        $options = array(
                            "form_file" => "form01",
                            "to" => $to_mail,
                            "mail_title" => "[국제진료센터] 진료상담 - " . $info["inq_name"],
                            "form_title" => "진료상담",
                            "form_writer" => $info["inq_name"],
                            "form_content" => $form_content,
                        );

                        $this->send_mail($options);
                    }

                    $json["result"] = "OK";
                } else {
                    $json["result"] = "ERROR";
                }
            }
        }else{
            $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
            $this->setView("inquiry");
            return $this->run();
        }
        die(json_encode($json));
    }


    public function review()
    {
        if($this->isAjax && $this->method=="post") {    //-- Form 출력
            $info = $this->getPost();
            if($info["rev_name"]) {

                $info['rev_lang'] = $this->lang;

                if($info['rev_medical_type']) {
                    $temp = explode("::", $info['rev_medical_type']);    // 부서번호/명칭 분리하기. - 사실 명칭은 크게 필요없을듯하나. 백업용도도로 일단 저장
                    $info['rev_dep_idx'] = $temp[0];
                    $info['rev_dep_title'] = $temp[1];
                }else {
                    $info['rev_dep_idx'] = "";
                    $info['rev_dep_title'] = "";
                }

                if ($this->ReviewModel->edit($info)) {

                    /**
                     * 담당자 메일 발송하기
                     */
                    $Config = model("ConfigModel");
                    $conf = $Config->getConfig($this->lang,"site");
                    // 이메일 주소 정리 (쉼표로 처리)
                    $to_mail = $conf["manager_email2"];


                    if(trim($to_mail)) {

                        $medical_type = explode("::",$info["rev_medical_type"]);

                        $form_content = "";
                        $form_content.= "<b>이름</b> : " . $info["rev_name"] . "<br>";
                        $form_content.= "<b>국적</b> : " . $info["rev_nationality"] . "<br>";
                        $form_content.= "<b>이메일</b> : " . $info["rev_email"] . "<br>";
                        $form_content.= "<b>연락처</b> : " . $info["rev_tel"] . "<br>";

                        $form_content.= "<b>분야</b> : " . $medical_type[1] . "<br>";
                        $form_content.= "<b>제목</b> : " . $info["rev_title"] . "<br>";
                        $form_content.= "<b>내용</b> : " . nl2br($info["rev_content"]) . "<br>";


                        $options = array(
                            "form_file" => "form01",
                            "to" => $to_mail,
                            "mail_title" => "[국제진료센터] 진료후기 - " . $info["rev_name"],
                            "form_title" => "진료후기",
                            "form_writer" => $info["rev_name"],
                            "form_content" => $form_content,
                        );

                        $this->send_mail($options);
                    }

                    $json["result"] = "OK";
                } else {
                    $json["result"] = "ERROR";
                }
            }else{
                $json["result"] = "ERROR";
            }
            die(json_encode($json));
        }
        else{

            // 진료과
            $this->DepartmentsModel->select('dep_idx,dep_title_kor,dep_title_'.$this->lang . " as dep_title");
            $this->DepartmentsModel->where("(dep_deleted_at is null or dep_deleted_at = '')"); // 삭제한 데이터는 제외

            $this->DepartmentsModel->where("dep_display_".$this->lang,"Y"); // 화면 보이기/숨김
            $this->DepartmentsModel->orderBy('dep_title_'.$this->lang,"ASC"); // 과 제목
            $data['dep_list'] = $this->DepartmentsModel->get()->getResultArray();

            $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
            $this->setView("review",$data);
            return $this->run();
            //return view('welcome_message');

        }
    }
}
