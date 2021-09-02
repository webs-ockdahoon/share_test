<div class="content ">
    <div class="page-title">
        <h3>로그인 로그</h3>
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
                                        <label class="form-label ">아이디</label>
                                        <div class="controls">
                                            <input type="text" class="form-control " id='s1' name='s1' value='<?php echo $s1?>'>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label class="form-label ">아이피</label>
                                        <div class="controls">
                                            <input type="text" class="form-control " id='s2' name='s2' value='<?php echo $s2?>'>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label ">로그인 일시</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" readonly id='s3' name='s3' value='<?php echo $s3?>'>
                                                <span class="input-group-addon">~</span>
                                                <input type="text" class="form-control datepicker" readonly id='s4' name='s4' value='<?php echo $s4?>'>
                                            </div>
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
                                    <th>아이디</th>
                                    <th>성공여부</th>
                                    <th>로그인 일시</th>
                                    <th>로그인 IP</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($total_count>0){
                                        foreach($list as $row){

                                            if($row["lol_login_result"]==1){
                                                $row["lol_login_result"] = "<span class='label label-success'>성공</span>";
                                            }else {
                                                $row["lol_login_result"] = "<span class='label label-danger'>실패</span>";
                                            }

                                ?>
                                    <tr>

                                        <td><?php echo $row["lol_mem_id"]?></td>
                                        <td><?php echo $row["lol_login_result"]?></td>
                                        <td><?php echo $row["lol_created_at"]?></td>
                                        <td><?php echo $row["lol_created_ip"]?></td>
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
            </div>
            <div class='col-xs-12 col-md-6 text-center'><?php echo $links?></div>
            <div class='col-xs-12 col-md-3 text-right'>
            </div>
        </div>

    </div>
    <!-- END PAGE -->
</div>