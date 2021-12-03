<style>
    .info_detail_warp{}
    .info_detail_warp .panel{border:1px solid #aaa;}
    .info_detail_warp .panel-default{margin-bottom:20px;}
    .info_detail_warp .panel-heading,.info_detail_warp .panel-body{margin:0px;background:#eee;}
</style>

<div class="content ">
    <div class="page-title">
        <h3>의료진 관리 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <!-- row -->

            <div class="row">

                <div class='col-lg-6 col-lg-offset-3'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">진료과</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="doc_dep_idx" id="doc_dep_idx">
                                                    <option value="">미선택</option>
                                                    <?php foreach($department_list as $department){
                                                        ?>
                                                        <option value="<?php echo $department["dep_idx"]?>" <?php if($doc_dep_idx==$department['dep_idx'])echo "selected";?>><?php echo $department["dep_title_kor"]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">인물 이미지</label>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="doc_image" name="doc_image" placeholder="인물 이미지" value="" >
                                            <small style="color:red;">※ 권장 사이즈 : 102x136</small>

                                            <?php if(!empty($doc_image)){?>
                                                <br><br>
                                                <img src="/uploaded/file/<?php echo $doc_image; ?>">
                                                <label><input type='checkbox' name='doc_image_del' value='1'> 삭제</label>
                                            <?php }?>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                // 내용이 좀 복잡해지겠다. 반복문으로 처리하자
                $lang_arr = array(
                  "kor"=>"국문",
                  "rus"=>"러시아어",
                );
                foreach($lang_arr as $lang=>$lang_name){?>

                <div class='col-lg-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4><?php echo $lang_name?> 기본 정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">이름</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="doc_name_<?php echo $lang?>"  placeholder="이름" value="<?php echo ${"doc_name_".$lang}?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">전문 진료분야</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="doc_content_<?php echo $lang?>"  placeholder="전문 진료분야" value="<?php echo ${"doc_content_".$lang}?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="doc_display_<?php echo $lang?>" id="doc_display_<?php echo $lang?>1" value="Y" <?php echo (${"doc_display_".$lang}!="N")?"checked":""?>> <label for="doc_display_<?php echo $lang?>1">사용</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="doc_display_<?php echo $lang?>" id="doc_display_<?php echo $lang?>2" value="N" <?php echo (${"doc_display_".$lang}=="N")?"checked":""?>> <label for="doc_display_<?php echo $lang?>2">사용안함</label>
                                            </div>
                                            <br>
                                            <small>※ '사용안함'설정시 사용년도와 상관없이 노출이 되지 않습니다.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3><?php echo $lang_name?> 추가정보 관리

                        <button class="btn btn-default" type="button" onclick="add_group_block('<?php echo $lang?>')">+ 그룹 추가</button>
                    </h3>

                    <div id="info_<?php echo $lang?>">

                        <?php /*
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                그룹제목<br>
                                <div class="input-group">
                                    <input type="text" class="form form-control" placeholder="대제목 - 예) 학력 및 경력">
                                    <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button" onclick="del_group_block($(this))">- 그룹 삭제</button>
                                    </span>
                                </div>
                            </div>
                            <div class="grid-body editForm info_detail_warp">

                                <button class="btn btn-default" type="button" onclick="add_detail_block()">+ 상세항목 추가</button>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="input-group">
                                            <input type="text" class="form form-control" placeholder="상세 제목 - 예) 학력">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button" onclick="del_detail_block($(this))">- 항목 삭제</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <textarea class="form-control h100" placeholder="상세 내용 - 예) OOO대학 졸업 (여러줄 입력 가능)"></textarea>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="input-group">
                                            <input type="text" class="form form-control" placeholder="상세 제목 - 예) 학력">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button">- 항목 삭제</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <textarea class="form-control h100" placeholder="상세 내용 - 예) OOO대학 졸업 (여러줄 입력 가능)"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        */?>

                    </div>

                    <span class="hidden" id="doc_info_<?php echo $lang?>"><?php echo ${'doc_info_'.$lang}?></span>

                </div>



                <?php }?>





            </div>







            <!--/ row -->
            <!-- row -->
            <div class="row">

                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                    <a type='button' class='btn btn-danger btn-large' href="<?php echo $cont_url.$qstr?>">취소</a>
                </div>
                <!--/ row -->
            </div>

        </form>
        <!--/  Form Box -->

    </div>
    <!-- END PAGE -->
</div>

<script>
    /*****************************************************
     * 추가 정보 관리
     *****************************************************/
    // 그룹 추가
    function add_group_block(lang,title_str){
        var group_code="";
        while(1) {
            group_code = randomString(10);
            if(!$("#" + group_code).length)break;
        }
        if(!title_str)title_str="";

        var str='';
        str+='<div class="grid simple" id="'+group_code+'">';
        str+='    <div class="grid-title no-border">';
        str+='        그룹제목<br>';
        str+='        <div class="input-group">';
        str+='            <input type="text" class="form form-control" value="'+title_str+'" name="info_'+lang+'['+group_code+'][title]" placeholder="대제목 - 예) 학력 및 경력">';
        str+='            <span class="input-group-btn"><button class="btn btn-danger" type="button" onclick="del_group_block($(this))">- 그룹 삭제</button></span>';
        str+='        </div>';
        str+='    </div>';
        str+='    <div class="grid-body editForm info_detail_warp">';
        str+='         <button class="btn btn-default" type="button" onclick="add_detail_block(\''+lang+'\',\''+group_code+'\')">+ 상세항목 추가</button>';
        str+='    </div>';
        str+='</div>';

        $("#info_"+lang).append(str);
        return group_code;
    }

    // 그룹 삭제
    function del_group_block(obj){
        if(!confirm("해당 그룹을 삭제하시겠습니까?"))return;
        obj.closest(".grid.simple").remove();
    }

    // 상세 항목 추가
    function add_detail_block(lang,group_code,title_str,content_str){

        var detail_code="";
        while(1) {
            detail_code = randomString(10);
            if(!$("#" + detail_code).length)break;
        }

        if(!title_str)title_str="";
        if(!content_str)content_str="";

        var str = "";
        str+= '<div class="panel panel-default" id="'+detail_code+'">';
        str+= '    <div class="panel-heading">';
        str+= '        <div class="input-group">';
        str+= '            <input type="text" class="form form-control" name="info_'+lang+'['+group_code+'][item]['+detail_code+'][title]" id="title_' + detail_code + '" value="'+title_str+'" placeholder="상세 제목 - 예) 학력"  required>';
        str+= '            <span class="input-group-btn"><button class="btn btn-danger" type="button" onclick="del_detail_block($(this))">- 항목 삭제</button></span>';
        str+= '        </div>';
        str+= '    </div>';
        str+= '    <div class="panel-body">';
        str+= '        <textarea class="form-control h100" name="info_'+lang+'['+group_code+'][item]['+detail_code+'][content]" id="content_' + detail_code + '"  placeholder="상세 내용 - 예) OOO대학 졸업 (여러줄 입력 가능)" required>'+content_str+'</textarea>';
        str+= '    </div>';
        str+= '</div>';

        $("#"+group_code+" .info_detail_warp").append(str);
    };

    // 상세 항목 삭제
    function del_detail_block(obj){
        if(!confirm("해당 상세항목을 삭제하시겠습니까?"))return;
        obj.closest(".panel-default").remove();
    }

    // db 데이터
    $(function(){
        set_db_data();
    });

    function set_db_data(){
        for(var k=1;k<=2;k++){  // lang for
            var lang_str = "kor";
            if(k==2)lang_str = "rus";

            var data_str = $("#doc_info_"+lang_str).html();
            if(!data_str)continue;

            var group = $.parseJSON(data_str);
            for(var h=0;h<group.length;h++){    // group for
                var group_obj = group[h];
                var group_code = add_group_block(lang_str,group_obj['title']);
                for(var u=0;u<group_obj['item'].length;u++){    // item for
                    add_detail_block(lang_str,group_code,group_obj['item'][u]['title'],group_obj['item'][u]['content']);
                }
            }
        }
    }
</script>




