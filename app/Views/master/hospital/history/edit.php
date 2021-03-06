<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ko.min.js" integrity="sha512-3kMAxw/DoCOkS6yQGfQsRY1FWknTEzdiz8DOwWoqf+eGRN45AmjS2Lggql50nCe9Q6m5su5dDZylflBY2YjABQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.css" integrity="sha512-HWqapTcU+yOMgBe4kFnMcJGbvFPbgk39bm0ExFn0ks6/n97BBHzhDuzVkvMVVHTJSK5mtrXGX4oVwoQsNcsYvg==" crossorigin="anonymous" />
<style>
    .history_wrap{}
    .history_wrap .row{padding:10px;}
    .history_wrap .row:hover{background:#eee;}
</style>
<div class="content ">
    <div class="page-title">
        <h3>연혁 관리 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <!-- row -->
            <div class="row">

                <div class='col-lg-8 col-lg-offset-2'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- 문서로 받은 데이터 자동으로 넣기 객체 
                                    <textarea id="temp_data" class="form-control h300"></textarea>
                                    <button class="btn btn-default" type="button" onclick="temp_data_set()">Set</button>
                                    -->


                                    <div class="form-group">
                                        <label class="form-label">년도</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control cleave_number" name="hoh_year" id="hoh_year" placeholder="ex) 2011" value="<?php echo $hoh_year?>" max-length="4" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">사용여부</label>
                                        <div class="controls">
                                            <div class="radio radio-success">
                                                <input type="radio" name="hoh_state" id="hoh_state1" value="Y" <?php echo ($hoh_state!="N")?"checked":""?>> <label for="hoh_state1">사용</label>
                                            </div>

                                            <div class="radio radio-danger">
                                                <input type="radio" name="hoh_state" id="hoh_state2" value="N" <?php echo ($hoh_state=="N")?"checked":""?>> <label for="hoh_state2">사용안함</label>
                                            </div>
                                            <br>
                                            <small>※ '사용안함'설정시 사용년도와 상관없이 노출이 되지 않습니다.</small>

                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            ※ 시작일 미입력시 해당 줄은 '미입력(무시)' 됩니다.<br>
                                            ※ <i class="fa fa-level-down"></i> 버튼 클릭시 해당 줄에 새로운 줄이 추가됩니다.
                                        </div>

                                    </div>

                                    <div class="form-group history_wrap">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-3 text-center">
                                                날짜
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-center">
                                                국문 내용
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-center">
                                                러시아 내용
                                            </div>
                                            <div class="col-xs-12 col-md-1 text-center">
                                                줄추가
                                            </div>
                                        </div>


                                            <?php for($i=1; $i<=50; $i++){

                                                if(isset($hoh_history[$i-1]) && is_array($hoh_history[$i-1])) {
                                                    $his = $hoh_history[$i-1];
                                                }else{
                                                    $his = array('start' => '', 'end' => '', 'content_kor'=>'', 'content_rus'=>'');
                                                }

                                                ?>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-3">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control hoh_date" name="hoh_date_start[<?php echo $i?>]"  placeholder="ex) 11.01." value="<?php echo $his['start']?>">
                                                                <span class="input-group-addon"> ~ </span>
                                                                <input type="text" class="form-control hoh_date" name="hoh_date_end[<?php echo $i?>]" placeholder="ex) 11.05." value="<?php echo $his['end']?>" >
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <textarea name="hoh_content_kor[<?php echo $i; ?>]" class="w-100" placeholder="국문 내용" rows="2"><?php echo $his['content_kor']?></textarea>
                                                        </div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <textarea name="hoh_content_rus[<?php echo $i; ?>]" class="w-100" placeholder="러시아어 내용" rows="2"><?php echo $his['content_rus']?></textarea>
                                                        </div>
                                                        <div class="col-xs-12 col-md-1">
                                                            <button class="btn" type="button" onclick="row_down($(this))"><i class="fa fa-level-down-alt"></i></button>
                                                        </div>
                                                    </div>
                                            <?php } ?>
                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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

<Script>
    $(function(){

        $('.hoh_date').each(function(){
            new Cleave($(this), {
                date: true,
                delimiter: '.',
                datePattern: ['m', 'd'],
            });
        })

    });

    // 임시 데이터 셋팅 - 규칙적이어야함!
    function temp_data_set(){
        var v = $("#temp_data").val();
        var r = v.split("\n");

        var rows = $(".history_wrap .row");

        for(var k=0;k<r.length;k++){
            var txt = r[k];
            console.log(txt);

            var d1 = txt.substr(0,12).split(".");
            var d2 = txt.substr(14,8).split(".");
            var c = txt.substr(22);

            if(!$("#hoh_year").val()){
                $("#hoh_year").val(d1[0]);
            }

            // 여백 없애기
            d1[0] = d1[0].replaceAll(" ","");
            d1[1] = d1[1].replaceAll(" ","");
            d2[0] = d2[0].replaceAll(" ","");
            c = c.replaceAll(" ","");

            var target_row = k+1;
            rows.eq(target_row).find("input").eq(0).val(d1[1]+"."+d1[2]);
            console.log(d2.length + " / " + d2[0] + " / " + (d2[0].length));
            if(d2.length && d2[0]!="") {
                if(d2.length==1) {
                    rows.eq(target_row).find("input").eq(1).val(d1[1] + "." + d2[0]);
                }else{
                    d2[1] = d2[1].replaceAll(" ","");
                    rows.eq(target_row).find("input").eq(1).val(d2[0] + "." + d2[1]);
                }
            }else{
                rows.eq(target_row).find("input").eq(1).val("");
            }

            rows.eq(target_row).find("textarea").eq(0).val(c);



        }


    }

    // 한줄 내리고 위에 줄 추가하기 - 객체 변경시 좀 귀찮아 질수 있으니 내용만 내리는걸로
    function row_down(obj){

        var rows = $(".history_wrap .row");
        var new_row = obj.closest(".row");
        var idx = rows.index(new_row);

        // 밑으로 내릴 수 있는지 검사하기
        var v1 = rows.eq(rows.length-1).find("input").eq(0).val();
        var v2 = rows.eq(rows.length-1).find("input").eq(1).val();
        var v3 = rows.eq(rows.length-1).find("textarea").eq(0).val();
        var v4 = rows.eq(rows.length-1).find("textarea").eq(1).val();

        if(v1 || v2 || v3 || v4){
            alert("마지막줄에 내용이 존재합니다. 더이상 아래로 이동할 수 없습니다.");
            return;
        }

        // 아래에서 부터 역순으로 처리
        for(var k=rows.length-1;k>idx;k--){
            var target_up_row = rows.eq(k-1);
            var target_row = rows.eq(k);

            target_row.find("input").eq(0).val(target_up_row.find("input").eq(0).val());
            target_row.find("input").eq(1).val(target_up_row.find("input").eq(1).val());
            target_row.find("textarea").eq(0).val(target_up_row.find("textarea").eq(0).val());
            target_row.find("textarea").eq(1).val(target_up_row.find("textarea").eq(1).val());
        }

        new_row.find("input,textarea").val("");


        //alert(idx);


    }

</Script>