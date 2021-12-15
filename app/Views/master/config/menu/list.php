<script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js" integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialise the table
        $("#menu_table tbody").tableDnD({
            dragHandle: ".fa-arrows-alt-v",
        });
    });

    function menu_move(obj,flag){
        var n_tbody = obj.closest("tbody");
        var all_tbody = $("#menu_table tbody");
        var n_idx = all_tbody.index(n_tbody);

        var t_idx = n_idx;
        if(flag=="up")t_idx--;
        else if(flag=="down")t_idx++;

        if(t_idx<0 || all_tbody.length-1<t_idx)return;

        if(flag=="up")all_tbody.eq(t_idx).before(n_tbody);
        else if(flag=="down")all_tbody.eq(t_idx).after(n_tbody);
    }

    function menu_sort_save(){

        var mnu_info = [];
        for(k=0;k<$("[name='mnu_idx[]']").length;k++){

            var info = [];
            info.push($("[name='mnu_idx[]']").eq(k).val());
            info.push($("[name='mnu_level[]']").eq(k).val());

            mnu_info.push(info);
        }

        $.ajax({
            url:"/master/config/menu/sortsave",
            data:{'mnu_info':mnu_info},
            dataType:'JSON',
            method:'POST',
            success:function(data){

                if(data["result"]=="OK"){
                    Messenger.options = {extraClasses: 'messenger-fixed messenger-on-top',theme: 'flat'}
                    Messenger().post({message:"저장되었습니다.",hideAfter: 3,showCloseButton: true});
                }else{
                    alert("오류가 발생하였습니다.");
                }

            }
        });

    }

</script>
<style>
    #menu_table tbody .fa-arrows-alt-v{cursor:move;display:block;padding:5px 0px;}
    .tDnD_whileDrag td {
        background-color: #eee;
        -webkit-box-shadow: 6px 3px 5px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;
    }
</style>

<div class="content ">
    <div class="page-title">
        <h3>메뉴 관리</h3>
    </div>
    <div id="container">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">


                <!-- Content Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>
                            ※ 1차 메뉴 자리이동은 <i class="fa fa-chevron-up"></i><i class="fa fa-chevron-down"></i> 버튼을 클릭해 주세요.<br>
                            ※ 2차 메뉴 자리이동은 <i class="fa fa-arrows-alt-v"></i> 아이콘을 드래그&드랍으로 이동해주세요. (해당 메뉴그룹 안에서만 이동 가능)<br>
                            ※ 순서변경 후 반드시 '순서저장'버튼을 눌러야 적용됩니다.

                        </h4>

                        <button class="btn btn-primary btn-large floatR" type="button" onclick="menu_sort_save()">순서저장</button>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <table class="table table-bordered no-more-tables" id="menu_table">
                                <thead>
                                <tr>
                                    <th class="w100">순서정렬</th>
                                    <th>메뉴명(국문)</th>
                                    <th>사용여부(국문)</th>
                                    <th>메뉴명(러시아)</th>
                                    <th>사용여부(러시아)</th>
                                    <th>URL</th>


                                    <th>비고</th>
                                    <th>하위추가</th>
                                    <th>수정</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>

                                <?php if (sizeof($menu_list)>0){
                                        foreach($menu_list as $key=>$row){

                                            $level_space = "";
                                            for($k=2;$k<=$row["mnu_level"];$k++){
                                                $level_space.="&nbsp;&nbsp;&nbsp;&nbsp;";
                                            }
                                            if($level_space)$level_space.="┗&nbsp;&nbsp;";

                                            $drag_class = "";
                                            $drag_handle = '<i class="fa fa-arrows-alt-v"></i>';
                                            if(!$level_space){
                                                if($key>0)echo "</tbody>";
                                                echo "<tbody>";
                                                $drag_handle = '<button class="btn btn-mini" type="button" onclick="menu_move($(this),\'up\')"><i class="fa fa-chevron-up"></i></button><button class="btn btn-mini" type="button" onclick="menu_move($(this),\'down\')"><i class="fa fa-chevron-down"></i></button>';
                                                $drag_class = "class='nodrag nodrop'";
                                            }
                                ?>
                                    <tr <?php echo $drag_class?>>
                                        <td><?php echo $drag_handle?></td>
                                        <td class="text-left"><?php echo $level_space.$row["mnu_title_kor"]?></td>
                                        <td><button class="btn toggle_display_btn btn-mini" type="button" id="display_kor_<?php echo $row["mnu_idx"]?>"><?php echo $row["mnu_display_kor"]?></button></td>

                                        <td class="text-left"><?php echo $level_space.$row["mnu_title_rus"]?></td>
                                        <td><button class="btn toggle_display_btn btn-mini" type="button" id="display_rus_<?php echo $row["mnu_idx"]?>"><?php echo $row["mnu_display_rus"]?></button></td>

                                        <td><?php echo $row["mnu_url"]?></td>

                                        <td><?php echo $row["mnu_comment"]?></td>
                                        <td class='listBtn'>
                                            <?php if($row["mnu_level"]==1){?>
                                            <a class='btn btn-small btn-success' href='<?php echo $cont_url?>/edit/<?php echo $row[$primaryKey]?>?add_child=1'><i class='fa fa-plus'></i></a>
                                            <?php }?>
                                        </td>
                                        <td class='listBtn'>
                                            <a class='btn btn-small btn-primary' href='<?php echo $cont_url?>/edit/<?php echo $row[$primaryKey].$qstr?>'><i class='fa fa-pen'></i></a>
                                            <input type="hidden" name="mnu_idx[]" value="<?php echo $row['mnu_idx']?>"> <!-- 순서저장에 사용할 메뉴 고유번호 -->
                                            <input type="hidden" name="mnu_level[]" value="<?php echo $row["mnu_level"]?>"> <!-- 순서저장에 사용할 메뉴 레벨 -->
                                        </td>
                                        <td class='listBtn'>
                                            <button class='btn btn-small btn-danger list_del_btn' data-idx="<?php echo $row[$primaryKey]?>"><i class='fa fa-trash'></i></button>
                                        </td>
                                    </tr>
                                <?php }
                                }else{?>
                                <tbody>
                                <tr>
                                    <td colspan="9" class="text-center">등록된 자료가 없습니다.</td>
                                </tr>
                                </tbody>
                                <?php }?>

                            </table>

                        </div>
                    </div>
                </div>
                <!--/ Content Area -->
            </div>
        </div>
        <!--/ row -->

        <div class='row buttonWrap'>
            <div class='col-xs-12 col-md-3'>
                <!--
                <button class="btn btn-primary" type="button" onclick="list_check_all(1)">모두선택</button>
                <button class="btn btn-default" type="button" onclick="list_check_all(0)">선택해제</button>
                <button class="btn btn-danger" type="button" onclick="list_check_del()">선택삭제</button>
                -->
            </div>
            <div class='col-xs-12 col-md-6 text-center'></div>
            <div class='col-xs-12 col-md-3 text-right'>
                <a class="btn btn-primary" href="<?php echo $cont_url?>/edit<?php echo $qstr?>">1차 메뉴 추가</a>
            </div>
        </div>

    </div>
    <!-- END PAGE -->
</div>