<div class="content ">
    <div class="page-title">
        <h3>관리자 설정 로그</h3>
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
                                        <label class="form-label ">관리자명/아이디</label>
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
                                        <label class="form-label ">일시</label>
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
                        <small class="floatR"><button class="btn-success btn btn-mini" type="button" onclick="fnExcelDown()"><i class="fa fa-file-excel"></i> 엑셀 다운</button></small>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">
                            <table class="table table-bordered no-more-tables">
                                <thead>
                                <tr>
                                    <th>사용자명<br><small>(아이디)</small></th>
                                    <th>일시</th>
                                    <th>IP</th>
                                    <th>내용</th>
                                    <th>상세</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($total_count>0){
                                        foreach($list as $row){
                                            //if($row["loa_method"]=="post")$row["loa_method"] = "저장";
                                            //else if($row["loa_method"]=="get")$row["loa_method"] = "조회";
                                ?>
                                    <tr>

                                        <td>
                                            <?php echo $row["mem_name"]?><br>
                                            <small>(<?php echo $row["lom_mem_id"]?>)</small>
                                        </td>
                                        <td><?php echo $row["lom_created_at"]?></td>
                                        <td><?php echo $row["lom_created_ip"]?></td>
                                        
                                        <td><?php echo nl2br($row["lom_content"])?></td>
                                        
                                        <td>
                                            <!--
                                            <button class="btn" type="button" onclick="fnShowData($(this))">상세보기</button>
                                            -->
                                            준비중
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
            </div>
            <div class='col-xs-12 col-md-6 text-center'><?php echo $links?></div>
            <div class='col-xs-12 col-md-3 text-right'>
            </div>
        </div>

    </div>
    <!-- END PAGE -->
</div>

<div class="modal" tabindex="-1" role="dialog" id='dataViewModal'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
            </div>
        </div>
    </div>
</div>

<script>
    function fnShowData(obj){
        var modal_obj = $("#dataViewModal");

        var d = obj.parent().find("span").html();
        if(d) {

            var d2 = d.split("&amp;");
            data_str = "";
            for(k=0;k<d2.length;k++){
                if(data_str)data_str+="<br>";
                data_str+=d2[k];
            }

            modal_obj.find(".modal-body").html(data_str);
            modal_obj.modal("show");
        }else{
            alert("출력할 데이터가 없습니다.");
        }

    }
</script>