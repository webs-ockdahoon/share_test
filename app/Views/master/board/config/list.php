<div class="content ">
    <div class="page-title">
        <h3>게시판관리</h3>
    </div>
    <div id="container">


        <!-- row -->
        <div class="row">
            <div class="col-md-12">

                <!-- Search Area -->
                <div class="grid simple list-search">

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <form>

                            <div class="col-sm-6 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label class="form-label ">게시판명</label>
                                    <div class="controls">
                                        <input type="text" class="form-control " id='s1' name='s1' value='<?php echo $s1?>'>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label class="form-label ">게시판코드</label>
                                    <div class="controls">
                                        <input type="text" class="form-control " id='s2' name='s2' value='<?php echo $s2?>'>
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

                                    <th>게시판명</th>
                                    <th>게시판코드</th>
                                    <th>접근권한</th>
                                    <th>읽기권한</th>
                                    <th>쓰기권한</th>
                                    <th>답변권한</th>
                                    <th>수정</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($total_count>0){
                                        foreach($list as $row){

                                            $row["boc_auth_list"] = $authConf[$row["boc_auth_list"]];
                                            $row["boc_auth_read"] = $authConf[$row["boc_auth_read"]];
                                            $row["boc_auth_write"] = $authConf[$row["boc_auth_write"]];
                                            $row["boc_auth_reply"] = $authConf[$row["boc_auth_reply"]];
                                ?>

                                    <tr>
                                        <td>
                                            <div class="checkbox check-default">
                                                <input id='checkbox<?php echo $row[$primaryKey]?>' name='rowCheck'  type="checkbox" value='<?php echo $row[$primaryKey]?>'>
                                                <label for='checkbox<?php echo $row[$primaryKey]?>'></label>
                                            </div>
                                        </td>
                                        <td><?php echo $row["boc_title"]?></td>
                                        <td><?php echo $row["boc_code"]?></td>
                                        <td><?php echo $row["boc_auth_list"]?></td>
                                        <td><?php echo $row["boc_auth_read"]?></td>
                                        <td><?php echo $row["boc_auth_write"]?></td>
                                        <td><?php echo $row["boc_auth_reply"]?></td>
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