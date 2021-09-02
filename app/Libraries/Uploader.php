<?php
/**
 * 공통 파일 업로드 처리 라이브러리
 */
namespace App\Libraries;

Class Uploader {

    protected $up_obj = array();
    protected $request;     // request 객체
    protected $save_path;   // 새로운 업로드 파일 저장 경로
    //protected $uploaded;    // 기존 업로드된 파일 경로 (신규파일 업로드 성공시 기존 파일 삭제/ 신규파일 업로드 실패시 기존 파일 정보 리턴)
    protected $options = array();
    protected $ready_to_del = array();    // 신규파일이 업로드되고 삭제 대기 상태의 파일
    protected $arrow_ext = array('jpg','jpeg','gif','png','hwp','pdf','zip','txt'
                                ,'xls','xlsx','ppt','pptx','doc','docx'
                                ); // 업로드 가능한 확장자 지정

    public function __construct($obj_id,$option="")
    {
        $this->request = \Config\Services::request();
        $this->up_obj = $obj_id;

        // 기본 저장 패스 설정
        $save_path = $option["path"];
        if(substr($save_path,0,1)=="/")$save_path = substr($save_path,1);
        if(substr($save_path,strlen($save_path)-1)=="/")$save_path = substr($save_path,0,strlen($save_path)-1);
        if($save_path)$save_path.="/".date("Ym");
        $this->save_path = $save_path;

        // 다른 메소드에서 사용할 수 있도록 옵션 저장
        $this->options = $option;

        // 이미지 최대 가로 사이즈 지정 - 일단...세로 사이즈는 지정하지 않겠다.
        if(!isset($this->options["image_max_width"]))$this->options["image_max_width"] = 1000;
        if(!$this->options["image_max_width"])$this->options["image_max_width"]=1000;

    }


    /**
     * 업로드 실행하기
     * 참고 - $options["uploaded"] 에 기존 업로드된 정보(배열형태)로 리턴하고
     * 업로드된 정보가 없거나 업로드에 실패할 경우 기존 업로드된 정보를 다시 리턴 해줌
     */
    public function upload(){

        $image_obj = \Config\Services::image();
        $post = \Config\Services::request();
        $result = array();

        foreach($this->request->getFiles() as $key=>$fup){
            $fName = $fup->getName();

            // 기본값 처리
            if(!isset($this->options["uploaded"][$key]["name"]))$this->options["uploaded"][$key]["name"]="";
            if(!isset($this->options["uploaded"][$key]["size"]))$this->options["uploaded"][$key]["size"]="";

            $isDel = $post->getPost($key . "_del");
            if(isset($this->options["uploaded"][$key]) && $isDel){    // 파일 삭제 처리
                $result[$key] = array(
                    "result" => "deleted",
                    "name" => "",
                    "upload" => "",
                    "size" => "",
                    "ext" => "",
                );
                if(isset($this->options["uploaded"][$key])){
                    $this->ready_to_del[] = $this->options["uploaded"][$key]["upload"];
                }
                continue;
            }
            
            // 업로드된 파일이 없을경우 기존 업로드했던 파일 정보 다시 넣거나 빈값 리턴
            if(!$fName){
                if(isset($this->options["uploaded"][$key])){
                    $result[$key] = array(
                        "result" => "keep",
                        "name" => $this->options["uploaded"][$key]["name"],
                        "upload" => $this->options["uploaded"][$key]["upload"],
                        "size" => $this->options["uploaded"][$key]["size"],
                        "ext" => "",
                    );
                }else {
                    $result[$key] = array(
                        "result" => "",
                        "name" => "",
                        "upload" => "",
                        "size" => "",
                        "ext" => "",
                    );
                }
                continue;
            }

            //-- 파일 유효성 체크 - 유효성 체크에 실패했을 경우 기존 업로드했던 파일 정보 다시 넣거나 빈값 리턴
            $ext = $fup->guessExtension();
            if(array_search($ext,$this->arrow_ext)===false){
                if(isset($this->options["uploaded"][$key])){
                    $result[$key] = array(
                        "result" => "deny extension",
                        "name" => $this->options["uploaded"][$key]["name"],
                        "upload" => $this->options["uploaded"][$key]["upload"],
                        "size" => $this->options["uploaded"][$key]["size"],
                        "ext" => "",
                    );
                }else {
                    $result[$key] = array(
                        "result" => "",
                        "name" => "",
                        "upload" => "",
                        "size" => "",
                        "ext" => "",
                    );
                }
                continue;
            }

            // 모든 체크 항목 통과. 실제 파일 업로드 하기
            $fName = $fup->getName();
            $uploaded_path = $fup->store($this->save_path);
            $result[$key] = array(
                "result"=>"success",
                "name"=>$fName,
                "upload"=>$uploaded_path,
                "size"=>$fup->getSize(),
                "ext"=>$ext,
            );

            // 이미지 사이즈 조절
            if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "bmp"){
                $img_size = getimagesize(WRITEPATH . "uploads/" .$uploaded_path);

                if($img_size[0]>$this->options["image_max_width"]) {
                    $image_obj->withFile(WRITEPATH . "uploads/" . $uploaded_path)
                        ->resize($this->options["image_max_width"], 0, true, 'width')
                        ->save(WRITEPATH . "uploads/" . $uploaded_path);
                }
            }

            if(isset($this->options["uploaded"][$key])){
                $this->ready_to_del[] = $this->options["uploaded"][$key]["upload"];
            }

        }
        //- foreach

        return $result;
    }

    // 새로운 파일이 업로드되 객체의 기존 파일 삭제
    public function clear_old_file(){

        foreach($this->ready_to_del as $del){
            if(file_exists(WRITEPATH . "uploads/".$del)){
                @unlink(WRITEPATH . "uploads/".$del);
            }
        }
    }

}

