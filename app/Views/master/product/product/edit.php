<div class="content ">
    <div class="page-title">
        <h3>상품관리 </h3>
    </div>
    <div id="container">

        <!--  Form Box -->
        <?php echo $validate_error_msg?>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">

            <!-- row -->
            <div class="row">
                <div class='col-md-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>기본정보</h4>
                        </div>

                        <div class="grid-body editForm">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="form-label">분류1</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select class="form-control" name='prd_cat_idx1_1'
                                                        id='prd_cat_idx1_1'></select>
                                                <span class="input-group-addon"><i
                                                            class='fa fa-chevron-right'></i></span>
                                                <select class="form-control" name='prd_cat_idx1_2'
                                                        id='prd_cat_idx1_2'></select>
                                                <span class="input-group-addon"><i
                                                            class='fa fa-chevron-right'></i></span>
                                                <select class="form-control" name='prd_cat_idx1_3'
                                                        id='prd_cat_idx1_3'></select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">분류2</label>
                                        <div class="controls">

                                            <div class="input-group">
                                                <select class="form-control" name='prd_cat_idx2_1'
                                                        id='prd_cat_idx2_1'></select>
                                                <span class="input-group-addon"><i
                                                            class='fa fa-chevron-right'></i></span>
                                                <select class="form-control" name='prd_cat_idx2_2'
                                                        id='prd_cat_idx2_2'></select>
                                                <span class="input-group-addon"><i
                                                            class='fa fa-chevron-right'></i></span>
                                                <select class="form-control" name='prd_cat_idx2_3'
                                                        id='prd_cat_idx2_3'></select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">상품명</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="prd_title" name="prd_title"
                                                   placeholder="상품명" value="<?php echo $prd_title?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">간략설명</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="prd_subtitle"
                                                   name="prd_subtitle" placeholder="간략설명" value="<?php echo $prd_subtitle?>">
                                            ※ 썸네일 리스트 하단에 표기됩니다.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">상품코드</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="prd_code" name="prd_code"
                                                   placeholder="상품코드" value="<?php echo $prd_code?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">일반 소비자가</label>
                                        <div class="controls row">
                                            <div class='col-xs-12 '>
                                                <div class='input-group col-md-4'>
                                                    <input type="text" class="form-control cleave_number_format"
                                                           id="prd_common_price" name="prd_common_price"
                                                           placeholder="일반 소비자가" value="<?php echo $prd_common_price?>">
                                                    <span class='input-group-addon'>원</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">실판매가</label>
                                        <div class="controls row">
                                            <div class='col-xs-12'>
                                                <div class='input-group col-md-4'>
                                                    <input type="text" class="form-control cleave_number_format"
                                                           id="prd_price" name="prd_price" placeholder="실판매가"
                                                           value="<?php echo $prd_price?>" required>
                                                    <span class='input-group-addon'>원</span>
                                                </div>

                                                ※ 일반 소비자가 입력시 <strike>일반 소비자가</strike> -> 실판매가 형식으로 표시됩니다.

                                            </div>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="form-group mb0">
                                        <label class="form-label">재고수량</label>
                                        <div class="controls row">
                                            <div class='col-xs-12 col-md-4'>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control cleave_number_format" id="inPstock" name="inPstock" placeholder="재고수량" value="">
                                                    <span class='input-group-addon'>개 <input type='checkbox'  name='inPunlimit' id='inPunlimit' value='1' >무한</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="controls">
                                            ※ 옵션사용시 재고수량은 자동으로 옵션들의 총 재고수량으로 대체됩니다.<br>
                                            ※ '무한'체크시 옵션들도 모두 '무한'으로 처리됩니다.<br>
                                            ※ 할부 판매시 월 결제 비용을 입력해 주세요.
                                        </div>
                                    </div>
                                    -->

                                    <div class="form-group">
                                        <label class="form-label">판매상태</label>
                                        <div class="controls radio fieldText">
                                            <input type='radio' name='prd_state' id='prd_state1' value='10'
                                                   <?php if($prd_state=="10" or $prd_state=="")echo 'checked';?>> <label
                                                    for='prd_state1'> 판매중</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type='radio' name='prd_state' id='prd_state2' value='1'
                                                <?php if($prd_state=="1")echo 'checked';?>> <label for='prd_state2'> 품절</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type='radio' name='prd_state' id='prd_state' value='-1'
                                                <?php if($prd_state=="-1")echo 'checked';?>> <label for='prd_state3'>
                                                품절(숨김)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>썸네일 등록 <small>(권장사이즈:600 X 600)</small></h4>
                        </div>

                        <div class="grid-body editForm">

                            <?php
                            foreach($prd_thumb as $key=>$thumb){?>
                            <div class="form-group">
                                <label class="form-label">썸네일</label>
                                <div class="controls">
                                    <div class='input-group'>
                                        <input type="file" class="form-control" id="prd_thumb<?php echo $key?>" name="prd_thumb<?php echo $key?>"
                                               placeholder="썸네일" value="">

                                        <?php if($thumb["thumb"]){?>
                                        <div class='input-group-btn'>
                                            <button type='button' class='btn btn-primary' onclick="fnThumbView('<?php echo $thumb["thumb"]?>')"><i class='fa fa-search'></i>
                                                보기
                                            </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class='input-group-addon'>
                                            <label><input type='checkbox' name='prd_thumb<?php echo $key?>_del' value='1'> 삭제</label>
                                        </div>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class='col-md-6'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>추가정보</h4>
                        </div>
                        <div class="grid-body editForm">
                            <?php foreach($prd_additional as $key=>$add){?>
                            <div class='input-group'>
                                <div class='input-group-addon  hidden-xs'>정보</div>
                                <input type='text' class='form-control' name='prd_additionalTtl<?php echo $key?>'
                                       id='prd_additionalTtl<?php echo $key?>' placeholder='정보명' value='<?php echo $add["title"]?>'>
                                <div class='input-group-addon'>/</div>
                                <input type='text' class='form-control' name='prd_additionalVal<?php echo $key?>'
                                       id='prd_additionalVal<?php echo $key?>' placeholder='정보값' value='<?php echo $add["value"]?>'>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ row -->
            <!-- row -->
            <div class="row">
                <div class='col-xs-12'>
                    <div class="grid simple ">
                        <div class="grid-title no-border">
                            <h4>상세정보</h4>
                        </div>
                        <div class="grid-body editForm">
                            <?php echo $prd_content_editor?>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ row -->
            <!-- row -->
            <div class="row">
                <div class='col-xs-12 text-center'>
                    <button type='submit' class='btn btn-primary btn-large mr20'>저 장</button>
                    <a type='button' class='btn btn-danger btn-large' href="<?php echo $cont_url . $qstr?>">취소</a>
                </div>
            </div>
            <!--/ row -->
        </form>
        <!--/  Form Box -->

        <!-- END PAGE -->
    </div>
</div>

<script>
    $(document).ready(function(){
        //-- 카테고리 불러오기
        fnCategorySelectInit("prd_cat_idx1","<?php echo $prd_cat_idx1?>");
        fnCategorySelectInit("prd_cat_idx2","<?php echo $prd_cat_idx2?>");
    });

    function fnTest(){
        fnCategorySelectInit("prd_cat_idx1","<?php echo $prd_cat_idx1?>");
    }
</script>