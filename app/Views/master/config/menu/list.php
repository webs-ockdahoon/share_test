<div class="content ">
    <div class="page-title">
        <h3>기본메뉴 관리</h3>
    </div>
    <div id="container">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">


                <!-- Content Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4><small>※ 사이트공통의 경우 3개 사이트 모두 동일하게 사용됩니다.</small></h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <table class="table table-bordered no-more-tables">
                                <thead>
                                <tr>
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
                                <tbody>
                                <?php if (sizeof($menu_list)>0){
                                        foreach($menu_list as $row){

                                            $level_space = "";
                                            for($k=2;$k<=$row["mnu_level"];$k++){
                                                $level_space.="&nbsp;&nbsp;&nbsp;&nbsp;";
                                            }
                                            if($level_space)$level_space.="┗&nbsp;&nbsp;";
                                ?>
                                    <tr>
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
                                        </td>
                                        <td class='listBtn'>
                                            <button class='btn btn-small btn-danger list_del_btn' data-idx="<?php echo $row[$primaryKey]?>"><i class='fa fa-trash'></i></button>
                                        </td>
                                    </tr>
                                <?php }
                                }else{?>
                                <tr>
                                    <td colspan="9" class="text-center">등록된 자료가 없습니다.</td>
                                </tr>
                                <?php }?>

                                </tbody>
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