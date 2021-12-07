<?php
/**
 * Common Function
 * Writen by Ock Da Hoon
 * 2021.03.31
 */

use App\Controllers\BaseController;

/**
 * 개발전용 IP 인지 체크
 * @return bool
 */
function isDev(){
    if($_SERVER["REMOTE_ADDR"]=="115.94.235.144" || $_SERVER["REMOTE_ADDR"]=="125.7.222.132" || $_SERVER["REMOTE_ADDR"]=="::1" || $_SERVER["REMOTE_ADDR"]=="UNKNOWN")return true;
    else return false;
}

/**
 * 개발전용 문자열 출력
 * @param $str
 */
function echoDev($str){
    if(!isDev())return;
    echo $str;
}

/**
 * 배열을 보기(확인)좋게 출력
 * @param $arr 배열
 */
function print_array($arr){
    if(!isDev())return;
    echo "<xmp>";
    print_r($arr);
    echo "</xmp>";
}


$editorLoaded=false;    // 스마트 에디터 로드 여부
/**
 * 스마트 에디터 사용하기
 * @param $objName 객체명
 * @param $defaultValue 기본값
 * @param int $h 높이
 * @param string $filePath 파일 저장 경로
 * @return string
 */
function fnPrintEditor($objName,$defaultValue,$h=200,$filePath=""){
    global $editorLoaded;

    $editor = "";
    if(!$editorLoaded){
        $editor.="<script type='text/javascript' src='/assets/plugins/smarteditor/js/HuskyEZCreator.js' charset='utf-8'></script>\n";
        $editor.="<script>function fnSmartEditorFilePathGet(){return '" .$filePath . "';}</script>";	//-- 저장 파일 경로
    }
    
    $editor.= "<textarea name='".$objName."' id='".$objName."' style='width:100%; height:".$h."px; min-width:610px;'>".$defaultValue."</textarea>\n";
    $editor.= "<script>	\n";
    if(!$editorLoaded)$editor.= "	var oEditors = [];\n";
    $editor.= "		nhn.husky.EZCreator.createInIFrame({\n";
    $editor.= "    oAppRef: oEditors,\n";
    $editor.= "    elPlaceHolder: '".$objName."',\n";
    $editor.= "    sSkinURI: '/assets/plugins/smarteditor/SmartEditor2Skin.html',\n";
    $editor.= "    fCreator: 'createSEditor2'\n";
    $editor.= "});";
    $editor.= "</script>";

    $editorLoaded = true;
    return $editor;
}

function fnPrintEditorMobile($objName,$defaultValue,$h=200,$filePath=""){
    global $editorLoaded;

    $editor = "";
    if(!$editorLoaded){
        $editor.="<script type='text/javascript' src='/assets/plugins/smarteditor/js/HuskyEZCreator.js' charset='utf-8'></script>\n";
        $editor.="<script>function fnSmartEditorFilePathGet(){return '" .$filePath . "';}</script>";	//-- 저장 파일 경로
    }

    $editor.= "<textarea name='".$objName."' id='".$objName."' style='width:100%; height:".$h."px; min-width:100px !important;'>".$defaultValue."</textarea>\n";
    $editor.= "<script>	\n";
    if(!$editorLoaded)$editor.= "	var oEditors = [];\n";
    $editor.= "		nhn.husky.EZCreator.createInIFrame({\n";
    $editor.= "    oAppRef: oEditors,\n";
    $editor.= "    elPlaceHolder: '".$objName."',\n";
    $editor.= "    sSkinURI: '/assets/plugins/smarteditor/SmartEditor2SkinM.html',\n";
    $editor.= "    fCreator: 'createSEditor2'\n";
    $editor.= "});";
    $editor.= "</script>";

    $editorLoaded = true;
    return $editor;
}

/**
 * 랜덤 코드 생성하기
 * @param $type 코드형식
 * @param $strLen 코드길이
 * @return string
 */
function fnMakeRandCode($type,$strLen){
    if($type=='code')$char = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0");
    else if($type=='num')$char = array("1","2","3","4","5","6","7","8","9","0");
    else if($type=='string')$char = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    else if($type=='ucase')$char = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    else if($type=='lcase')$char = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    $Code = "";
    for($i=0;$i<$strLen;$i++){
        $rand = rand(0,sizeof($char)-1);
        $Code .= $char[$rand];
    }
    return $Code;
}

/**
 * 파일 용량 표기시 단위 변경해서 보여주기
 * @param $bytes 파일용량 (숫자)
 * @return string
 */
function fnConvertFileSize($bytes){
    if ($bytes >= 1073741824)$bytes = number_format($bytes / 1073741824, 2) . ' GB';
    elseif ($bytes >= 1048576)$bytes = number_format($bytes / 1048576, 2) . ' MB';
    elseif ($bytes >= 1024)$bytes = number_format($bytes / 1024, 2) . ' kB';
    elseif ($bytes > 1)$bytes = $bytes . ' bytes';
    elseif ($bytes == 1)$bytes = $bytes . ' byte';
    else $bytes = '0 bytes';
    return $bytes;
}

/**
 * 파일 확장자 구하기
 * @param $Fname 파일명
 * @return false|string
 */
function fnGetExt($Fname){
    $dotPos = strrpos($Fname,".");
    if($dotPos){
        return substr($Fname,$dotPos+1);
    }else return "";
}

/**
 * Curl 함수로 외부 웹페이지 읽어들이기
 * @param $Url 웹페이지 주소
 * @param string $data 함께 전송할 주소
 * @param string $header 헤더
 * @return bool|string
 */
function fnCurl($Url,$data="",$header=""){
    $ch = curl_init();    
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_REFERER, "");
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);    
    if($data){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if($header){
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    }
    $output = curl_exec($ch);
    return $output;
}

/**
 * 요일값 한글로 변환
 * @param $w 요일 숫자 (0~6)
 * @return string
 */
function convWeek($w){
    switch($w){
        case 0:return "일";
        case 1:return "월";
        case 2:return "화";
        case 3:return "수";
        case 4:return "목";
        case 5:return "금";
        case 6:return "토";
    }
}


/**
 * 엑셀 다운로드 공용 처리 함수
 * @param $excelData    엑셀 다운로드를 위한 옵션 배열
 */
function fnExcelDown($excelData){

    require_once ROOTPATH . 'util/PHPExcel/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    $fName = $excelData["fileName"] . date("ymd_His") . ".xlsx";

    $sheet->fromArray( $excelData["title"], NULL, 'A1' );
    //-- 타이틀 생성 끝

    //-- 내용 넣기
    $sheet->fromArray( $excelData["data"], NULL, 'A2' );

    //-- 스타일 잡기

    if(sizeof($excelData["title"])<=26)$endCell = chr(65 + sizeof($excelData["title"])-1);	//-- 마지막 셀
    else $endCell = "A" . chr(65 + sizeof($excelData["title"])-26-1);	//-- 마지막 셀


    $endRow = sizeof($excelData["data"])+1;


    //-- 타이틀 라인 설정
    $styleArray = array(
        'font' => array(
            'bold' => true,
        ),
        'alignment' => array(
            'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'		=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ),
        'borders' => array(
            'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            'outline' => array('style' => PHPExcel_Style_Border::BORDER_THICK)

        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array('argb' => '00EEEEEE',),
        ),
    );
    $objPHPExcel->getActiveSheet()->getStyle('A1:'.$endCell.'1')->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(24);

    //-- 내용 라인 설정
    $styleArray = array(
        'alignment' => array(
            'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'		=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
        ),
    );
    $objPHPExcel->getActiveSheet()->getStyle('A2:'.$endCell.$endRow)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('A2:A'.$endRow)->getNumberFormat()->setFormatCode('0000');

    //-- 줄 높이 지정(기본 설정이 왜 안되지?)
    // $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(24);
    foreach($excelData["data"] as $key => $r){
        $objPHPExcel->getActiveSheet()->getRowDimension(($key+2))->setRowHeight(24);
    }

    $nCols = sizeof($excelData["title"]);
    foreach (range(0, $nCols) as $col) {
        //$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
        $chr = chr(65+$col);
        if($col>=26)$chr = "A" . chr($col+65-26);
        if(isset($excelData["width"][$chr]))$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth($excelData["width"][$chr]);
        else $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
    }

    //-- 파일명 인코딩 변경
    $fName = iconv("UTF-8","EUC-KR",$fName);

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$fName.'"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit(); // 중요. 다른코드가 섞이지 않도록 반드시 강제 종료처리
}

function include_view($f){
    echo $f;
    $tmp = explode("/",$f);
    $SKIN_URL = "/".$tmp[1]. "/".$tmp[2];
    $f = APPPATH."Views".$f;
    if(file_exists($f)){
        include($f);
    }else if(isDev()){  // 개발자 IP에서만 오류 메세지
        echo "<div>File Not Found : " . $f . "</div>";
    }
}
if(!function_exists("str_nowrap")){
    function str_nowrap($str) {
        $str = str_replace(array("</br>", "<br>"), " ", $str);
        $str = strip_tags($str);
        return $str;
    }
}

// 유튜브 동영상 주소에서 동영상 ID만 추출하는 함수
function get_youtubeid($url) {
    $regExp = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
    preg_match($regExp, $url, $matches);
    $youtube_id = $matches[7];
    return $youtube_id;
}