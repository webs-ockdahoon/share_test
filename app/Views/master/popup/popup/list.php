
<div class="content ">
    <div class="page-title">
        <h3>팝업 관리 </h3>
    </div>
    <div id="container">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">

                <!-- Search Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>검색</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <form>

                            <div class="col-sm-6 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label class="form-label ">팝업제목</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" id='s1' name='s1' value='<?php echo $s1?>'>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center col-xs-12">
                                <button type="submit" class="btn btn-primary">검색</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a type="button" class="btn" href='<?php echo $cont_url?>'>검색 초기화</a>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!--/ Search Area -->

                <!-- Content Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4><?php echo $info?></h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <table class="table table-bordered no-more-tables">
                                <thead>
                                <tr>
                                    <th style="width:1%"><div class="checkbox check-default"><input id="checkall" type="checkbox" value="1" class="checkall"><label for="checkall"></label></div></th>
                                    <th>팝업 이미지</th>
                                    <th>팝업제목</th>
                                    <th>게시일</th>
                                    <th>종료일</th>
                                    <th>노출</th>
                                    <th>수정</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($total_count>0){
                                foreach($list as $row){
                                    if($row["pop_display"]=="all")$row["pop_display"] = "전체";
                                    else if($row["pop_display"]=="kor")$row["pop_display"] = "국문";
                                    else if($row["pop_display"]=="rus")$row["pop_display"] = "러시아";
                                    else $row["pop_display"] = "숨김";

                                ?>
                                    <tr>
                                        <td>
                                            <div class="checkbox check-default">
                                                <input id='checkbox<?php echo $row[$primaryKey]?>' name='rowCheck'  type="checkbox" value='<?php echo $row[$primaryKey]?>'>
                                                <label for='checkbox<?php echo $row[$primaryKey]?>'></label>
                                            </div>
                                        </td>

                                        <td><img src="/uploaded/file/<?php echo $row["pop_image"]?>" class="h80" onerror="this.src='/uploaded/file/noimage.jpg'"></td>

                                        <td><?php echo $row["pop_title"]?></td>
                                        <td><?php echo $row["pop_date_start"]?></td>
                                        <td><?php echo $row["pop_date_end"]?></td>
                                        <td><?php echo $row["pop_display"]?></td>

                                        <td class='listBtn'>
                                            <a class='btn btn-small btn-primary' href='<?php echo $cont_url?>/edit/<?php echo $row[$primaryKey] . $qstr?>'><i class='fa fa-pen'></i></a>
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
                <button class="btn btn-primary" type="button" onclick="list_check_all(1)">모두선택</button>
                <button class="btn btn-default" type="button" onclick="list_check_all(0)">선택해제</button>
                <button class="btn btn-danger" type="button" onclick="list_check_del()">선택삭제</button>
            </div>
            <div class='col-xs-12 col-md-6 text-center'><?php echo $links?></div>
            <div class='col-xs-12 col-md-3 text-right'>
                <a class="btn btn-primary" href="<?php echo $cont_url?>/edit<?php echo $qstr?>">추가하기</a>
            </div>
        </div>

    </div>
    <!-- END PAGE -->
</div>