<style>
    .dep_item{text-align:center;width:230px;float:left;padding:0px 15px;height:180.5px;}
    .dep_item .image img{margin:0px auto;}
    .dep_item .title{margin:10px 0px;font-weight:bold;}
    .sortable-placeholder{width:230px;height:160.5px;border:2px solid #ddd;backround:#eee;float:left;margin-bottom:20px;}
</style>

<div class="content ">
    <div class="page-title">
        <h3>메인노출관리 </h3>
    </div>
    <div id="container">

        <!-- row -->
        <form method="post">
            <input type="hidden" name="isSave" value="1">
            <div class="row">
                <div class="col-md-12">

                    <!-- Search Area -->
                    <div class="grid simple ">


                        <div class="grid-body ">
                            <div class="row-fluid">

                                <div class="col-sm-6 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label class="form-label ">진료과 선택/추가</label>
                                        <div class="controls">
                                            <select class="form-control" id='dep_lang' name='dep_lang'>
                                                <option value="kor">국문</option>
                                                <option value="rus" <?php if($dep_lang=='rus')echo 'selected';?>>러시아</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                    <div class="col-sm-6 col-md-3 col-lg-2">
                                        <div class="form-group">
                                            <label class="form-label ">진료과 선택/추가</label>
                                            <div class="controls">
                                                <select class="form-control" id='dep_1' name='dep_1'>
                                                    <option value="">선택해 주세요</option>
                                                    <?php foreach($department_list as $dep){
                                                        if($dep['dep_group']=='specializedcenter')continue;
                                                        ?>
                                                        <option value="<?php echo $dep["dep_idx"]?>::<?php echo $dep["dep_title_kor"]?>::<?php echo $dep["dep_image"]?>"><?php echo $dep["dep_title_kor"]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3 col-lg-2">
                                        <div class="form-group">
                                            <label class="form-label ">전문센터 선택/추가</label>
                                            <div class="controls">

                                                <select class="form-control" id='dep_2' name='dep_2'>
                                                    <option value="">선택해 주세요</option>
                                                    <?php foreach($department_list as $dep){
                                                        if($dep['dep_group']=='treatment')continue;
                                                        ?>
                                                        <option value="<?php echo $dep["dep_idx"]?>::<?php echo $dep["dep_title_kor"]?>::<?php echo $dep["dep_image"]?>"><?php echo $dep["dep_title_kor"]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <!--/ Search Area -->

                    <div class='row buttonWrap mb20'>
                        <div class='col-xs-12 col-md-3'>

                        </div>
                        <div class='col-xs-12 col-md-6 text-center'>
                            <button class="btn btn-primary" type="submit" >설정 저장</button>
                        </div>
                        <div class='col-xs-12 col-md-3 text-right'></div>
                    </div>

                    <!-- Content Area -->
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1" id="dep_item_wrap">

                        </div>
                    </div>
                    <!--/ Content Area -->

                </div>
            </div>
            <!--/ row -->


        </form>

    </div>
    <!-- END PAGE -->
</div>

<script src='/assets/plugins/jquery-sortable/jquery-sortable.js'></script>
<script>
    $("#dep_1,#dep_2").change(function(){
       var v = $(this).val().split("::");
       var dep_idx = v[0];
       var dep_ttl = v[1];
       var dep_img = v[2];
       add_item(dep_idx,dep_ttl,dep_img);
       $(this).val("");
    });

    function add_item(idx,ttl,img){

        if($("#dep_main_sort_"+idx).length){
            alert("이미 등록된 부서입니다.");
            return;
        }

        if($(".dep_item").length>=50){
            alert("50개 이상 등록이 불가합니다.");
            return;
        }

        var str = '';
        str+='<div class="dep_item">';
        str+='    <div class="grid simple">';
        str+='        <div class="grid-body editForm">';
        str+='            <div class="image"><img src="/uploaded/file/'+img+'" class="img-responsive"></div>';
        str+='            <div class="title">'+ttl+'</div>';
        str+='            <div class="btn_wrap"><button class="btn btn-danger btn-small" onclick="del_item($(this))">삭제</button></div>';
        str+='              <input type="hidden" name="dep_main_display[]" id="dep_main_sort_' + idx + '" value="' + idx + '">';
        str+='        </div>';
        str+='    </div>';
        str+='</div>';

        $("#dep_item_wrap").append(str);
        $("#dep_item_wrap").sortable({});
    }

    function del_item(obj){
        obj.closest(".dep_item").remove();
    }

    $(function(){
        <?php foreach($main_list as $mn){?>
        add_item('<?php echo $mn['dep_idx']?>','<?php echo $mn['dep_title_kor']?>','<?php echo $mn['dep_image']?>');
        <?php }?>

        try {
            $("#dep_item_wrap").destroy().sortable({});
        }catch(e){}

        $("#dep_lang").change(function(){
           document.location=cont_url+"?dep_lang="+$(this).val();
        });
    });




</script>