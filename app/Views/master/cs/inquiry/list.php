
<div class="content ">
    <div class="page-title">
        <h3>진료 문의 관리 </h3>
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
                                        <label class="form-label ">이름</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id='s1' name='s1' value='<?php echo $s1?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label class="form-label ">연락처</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id='s2' name='s2' value='<?php echo $s2?>'>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label class="form-label ">사이트</label>
                                        <div class="controls">
                                            <select class="form-control" name="s3" id="s3">
                                                <option value="">전체</option>
                                                <option value="rus" <?php if($s3=='rus')echo "selected";?>>러시아</option>
                                                <option value="kor" <?php if($s3=='kor')echo "selected";?>>국문</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label class="form-label ">처리상태</label>
                                        <div class="controls">
                                            <select class="form-control" name="s4" id="s4">
                                                <option value="">전체</option>
                                                <option value="1" <?php if($s4=='1')echo "selected";?>>미처리</option>
                                                <option value="10" <?php if($s4=='10')echo "selected";?>>처리완료</option>
                                            </select>
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

                                    <th>사이트</th>
                                    <th>이름</th>
                                    <th>연락처</th>
                                    <th>이메일</th>
                                    <th>생년월일</th>
                                    <th>등록일</th>
                                    <th>처리상태</th>
                                    <th>수정</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($total_count>0){
                                    foreach($list as $row){

                                        if($row['inq_lang']=='rus')$row['inq_lang'] = "러시아";
                                        else if($row['inq_lang']=='kor')$row['inq_lang'] =  "국문";

                                        if($row['inq_state']==1)$row['inq_state'] = '<span class="label label-danger">미처리</span>';
                                        else if($row['inq_state']==10)$row['inq_state'] = '<span class="label label-primary">처리완료</span>';
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="checkbox check-default">
                                                    <input id='checkbox<?php echo $row[$primaryKey]?>' name='rowCheck'  type="checkbox" value='<?php echo $row[$primaryKey]?>'>
                                                    <label for='checkbox<?php echo $row[$primaryKey]?>'></label>
                                                </div>
                                            </td>
                                            <td><?php echo $row['inq_lang']?></td>
                                            <td><?php echo $row["inq_name"]?></td>
                                            <td><?php echo $row["inq_tel"]?></td>
                                            <td><?php echo $row["inq_email"]?></td>
                                            <td><?php echo $row["inq_birth"]?></td>
                                            <td><?php echo $row["inq_created_at"]?></td>
                                            <td><?php echo $row["inq_state"]?></td>
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
                                        <td colspan="10" class="text-center">등록된 자료가 없습니다.</td>
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
<!--                <a class="btn btn-primary" href="--><?php //echo $cont_url?><!--/edit--><?php //echo $qstr?><!--">추가하기</a>-->
            </div>
        </div>

    </div>
    <!-- END PAGE -->
</div>