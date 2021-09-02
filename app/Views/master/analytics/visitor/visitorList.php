
<div class="content ">
    <div class="page-title">
        <h3>방문자 통계 </h3>
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

                            <form method="get">

                                <div class="form-group col-xs-12 pd0">
                                    <div class='input-group date w150' style='display:inline-table;vertical-align:middle;' id='inS1Wrarp'>
                                        <input type='text' class="form-control" id="s1" name="s1" style='background:#fff;' value="<?php echo $s1?>" readonly />
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                    ~
                                    <div class='input-group date w150' style='display:inline-table;vertical-align:middle;'  id='inS2Wrarp'>
                                        <input type='text' class="form-control" id="s2" name="s2" style='background:#fff;' value="<?php echo $s2?>" readonly />
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 pd0">
                                    <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date11?>','<?php echo $date12?>')">이번주</button>
                                    <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date21?>','<?php echo $date22?>')">지난주</button>
                                    <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date31?>','<?php echo $date32?>')">이번달</button>
                                    <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date41?>','<?php echo $date42?>')">지난달</button>
                                    <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date51?>','<?php echo $date52?>')">올해</button>
                                </div>
                        </div>

                        <div class="form-group text-center col-xs-12">
                            <button type="submit" class="btn btn-primary">검색</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn" onclick='fnSearchReset()'>검색 초기화</button>
                        </div>
                        </form>

                    </div>
                </div>
                <!--/ Search Area -->

                <!-- Content Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4> </h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="white-space:nowrap;">방문일시</th>
                                    <th style="white-space:nowrap;">PC/모바일</th>
                                    <th style="white-space:nowrap;">브라우져</th>
                                    <th style="white-space:nowrap;">플랫폼</th>
                                    <th style="white-space:nowrap;">해상도</th>
                                    <th>IP</th>
                                    <th>유입경로</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($total_count>0){
                                foreach($list as $row){
                                ?>
                                    <tr>
                                        <td><?php echo $row["log_datetime"]?></td>
                                        <td><?php echo $row["log_env"]?></td>
                                        <td><?php echo $row["log_browser"]?> <?php echo $row["log_browser_ver"]?></td>
                                        <td><?php echo $row["log_platform"]?></td>
                                        <td><?php echo $row["log_screenW"]?> X <?php echo $row["log_screenH"]?></td>
                                        <td><?php echo $row["log_ip"]?></td>
                                        <td style="word-break: break-all;white-space:normal;width:25%;"><?php echo $row["log_refer"]?></td>

                                    </tr>
                                <?php }
                                }else{?>
                                <tr>
                                    <td colspan="8" class="text-center">등록된 자료가 없습니다.</td>
                                </tr>
                                <?php }?>

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <!--/ Content Area -->

                <div class='row buttonWrap'>
                    <div class='col-xs-12 col-md-3'></div>
                    <div class='col-xs-12 col-md-6 text-center'><?php echo $links?></div>
                    <div class='col-xs-12 col-md-3 text-right'></div>
                </div>

            </div>
        </div>
        <!--/ row -->

    </div>
    <!-- END PAGE -->
</div>
