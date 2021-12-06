<?php
namespace App\Models;

class MenuModel extends BaseModel
{
    protected $table      = 'menu';
    protected $prefix     = 'mnu';
    protected $allowedFields = ['mnu_idx','mnu_code','mnu_title_kor','mnu_title_rus','mnu_url_type','mnu_url','mnu_page_idx','mnu_display_kor','mnu_display_rus','mnu_comment',
                                'mnu_sub_title',
                                'mnu_created_id','mnu_created_ip','mnu_created_at',
                                'mnu_updated_id','mnu_updated_ip','mnu_updated_at',
                                'mnu_deleted_id','mnu_deleted_ip','mnu_deleted_at',
                                ];

    function getMenu(){
        $this->where("mnu_deleted_at is null");
        $this->orderBy("mnu_code");
        $result = $this->get()->getResultArray();
        foreach($result as $key=>$rs){
            $result[$key]["mnu_level"] = $this->getLevel($rs["mnu_code"]);
        }
        return $result;
    }

    /**
     * 사용자쪽 메뉴 구성을 위해 사용중인 메뉴만 리턴하기
     * @return array
     */
    function getUsingMenu(){

        // 기본 언어 설정 및 현재 사용 언어 가져오기
        $config = config(App::class);
        $lang = service('request')->getLocale();

        $this->where("mnu_deleted_at is null");
        $this->where("mnu_display_".$lang,"Y");
        $this->orderBy("mnu_code");
        $result = $this->get()->getResultArray();
        $menu_list = array();
        foreach($result as $key=>$rs){
            $menu_level = $this->getLevel($rs["mnu_code"]);
            $result[$key]["mnu_level"] = $menu_level;

            $mnu_code_arr = str_split($rs["mnu_code"],2);

            // 기본언어와 다른 언어로 설정기 강제 URL 변환처리
            if($config->defaultLocale!=$lang && $rs['mnu_url'] && substr($rs['mnu_url'],0,1)=='/'){
                $rs['mnu_url'] = '/' . $lang . $rs['mnu_url'];
                if($rs['mnu_url']) {
                    $tmp = explode("/", $rs['mnu_url']);
                    if (isset($tmp[2]) && $tmp[2] == "board") {
                        $rs['mnu_url'].=$lang;
                    }
                }
            }

            // 언어별 메뉴 처리
            $rs["mnu_title"] = $rs["mnu_title_".$lang];
            if(!$rs["mnu_title"])continue;  // 메뉴명 미입력시 노출안함

            // 아이거 루프 못돌리겠다.
            if($menu_level==1){
                $menu_list[$mnu_code_arr[0]] = $rs;
            }else if($menu_level==2){
                if(!isset($menu_list[$mnu_code_arr[0]]["sub"]))$menu_list[$mnu_code_arr[0]]["sub"] = array();
                $menu_list[$mnu_code_arr[0]]["sub"][$mnu_code_arr[1]] = $rs;
            }else if($menu_level==3){
                if(!isset($menu_list[$mnu_code_arr[0]]["sub"]))$menu_list[$mnu_code_arr[0]]["sub"] = array();
                if(!isset($menu_list[$mnu_code_arr[0]]["sub"][$mnu_code_arr[1]]))$menu_list[$mnu_code_arr[0]]["sub"][$mnu_code_arr[1]]["sub"] = array();
                $menu_list[$mnu_code_arr[0]]["sub"][$mnu_code_arr[1]]["sub"][$mnu_code_arr[2]] = $rs;
            }
        }

        return $menu_list;
    }

    public function makeCode($parent_mnu_code=""){

        if($parent_mnu_code){
            $parent_mnu_level = $this->getLevel($parent_mnu_code);
            $mnu_level = $parent_mnu_level+1;
            $mnu_head = substr($parent_mnu_code,0,($parent_mnu_level*2));
        }else{
            $mnu_head = "";
            $mnu_level = 1;
        }

        $this->select("substr(max(mnu_code),1," . (($mnu_level)*2) . ") as mnu_code");
        if($mnu_level>1)$this->where("substr(mnu_code,1," . (($mnu_level-1)*2) . ")='" . $mnu_head . "'");
        if($mnu_level>1 && $mnu_level<4)$this->where("substr(mnu_code," . ((($mnu_level-1)*2)+3) . ",2)='00'");

        $mnu_code = "";
        $rs = $this->get()->getRowArray();
        //echo $this->getLastQuery();
        if($rs["mnu_code"]){
            $mnu_code = $rs["mnu_code"];
            $mnu_code = $mnu_code+1;
            $mnu_code = str_pad($mnu_code,($mnu_level*2),"0",STR_PAD_LEFT);
        }else{
            $mnu_code = $mnu_head."01";
        }

        $mnu_code = str_pad($mnu_code,10,"0",STR_PAD_RIGHT);

        return $mnu_code;
    }

    //-- 분류 코드로 레벨 구하기
    function getLevel($mnu_code){
        $code = str_split($mnu_code,2);
        $level = 0;
        foreach($code as $cd){
            if($cd=="00")return $level;
            else $level++;
        }
        return $level;
    }

}