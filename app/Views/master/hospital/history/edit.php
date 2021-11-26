<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ko.min.js" integrity="sha512-3kMAxw/DoCOkS6yQGfQsRY1FWknTEzdiz8DOwWoqf+eGRN45AmjS2Lggql50nCe9Q6m5su5dDZylflBY2YjABQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.css" integrity="sha512-HWqapTcU+yOMgBe4kFnMcJGbvFPbgk39bm0ExFn0ks6/n97BBHzhDuzVkvMVVHTJSK5mtrXGX4oVwoQsNcsYvg==" crossorigin="anonymous" />

<div class="content ">
    <div class="page-title">
        <h3>회사연혁 관리 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <!-- row -->
            <div class="row">

                <div class='col-lg-6 col-lg-offset-3'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <label class="form-label">대상년도</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="hoh_position" id="hoh_position">
                                                    <option value="">미선택</option>
                                                    <?php
                                                    foreach($year_between as $key=>$year){
                                                        echo $bew = $year['cih_date_start']."~".$year['cih_date_end'];
                                                        $s = "";
                                                        if($bew==$hoh_position)$s = "selected";
                                                        echo '<option value="'.$bew.'" '.$s.'>'.$bew.'</option>';
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">년도</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="hoh_year"  placeholder="ex) 2011" value="<?php echo $hoh_year?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">월.일</label>
                                        <div class="controls">
                                            <?php for($i=1; $i<21; $i++){?>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="hoh_date_start_<?php echo $i; ?>"  placeholder="ex) 11.01." value="<?php echo ${"hoh_date_start_".$i}; ?>">
                                                    <span class="input-group-addon"> ~ </span>
                                                    <input type="text" class="form-control" name="hoh_date_end_<?php echo $i; ?>" placeholder="ex) 11.05." value="<?php echo ${"hoh_date_end_".$i};?>" >
                                                </div>
                                                <textarea name="hoh_content_<?php echo $i; ?>" class="w-100" placeholder="내용" rows="2"><?php echo ${"hoh_content_".$i};?></textarea>
                                                <br><br>
                                            <?php } ?>
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
    $(document).ready(function(){
        $("#hoh_date_start,#hoh_date_end").datetimepicker({
            format: 'yyyy-MM-DD HH:mm',
        });
    });

</Script>