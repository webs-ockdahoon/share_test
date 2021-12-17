
<div class="qm-wrap">
    <div class="qm-box">
        <div class="qm-title">Quick Menu</div>
        <ul class="qm-list">
            <li>
                <a href="#" target="_self">
                    <img src="<?php echo $THEME_URL; ?>/images/main/qm-icon01.png" alt="вести больницы" width="15" height="15" class="img-fluid"><span>вести больницы</span>
                </a>
            </li>
            <li>
                <a href="#" target="_self">
                    <img src="<?php echo $THEME_URL; ?>/images/main/qm-icon02.png" alt="регистрация на консультацию" width="15" height="15" class="img-fluid"><span>регистрация на консультацию</span>
                </a>
            </li>
            <li>
                <a href="#" target="_self">
                    <img src="<?php echo $THEME_URL; ?>/images/main/qm-icon03.png" alt="последовательность лечения" width="15" height="15" class="img-fluid"><span>последовательность лечения</span>
                </a>
            </li>
        </ul>
    </div>
    <button type="button" class="btn-close">    </button>
</div>

<?php
/* 페이지 하단 공통으로 아래 스트립트가 삽입되어 있어 아래 부분 코멘트 처리
 * 중복 삽입시 스크립트도 중복 동작함
<!--<script src="/assets/plugins/jquery/jquery-3.6.0.min.js"></script>-->
<!--<script src="/assets/plugins/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>-->
<!--<script src="--><?php //echo $THEME_URL; ?><!--/script/common.js"></script>-->
 */
 ?>

<?php /* 페이지 렌더링 속도 개선을 위해 스크립트는 $this->section('appendBody')로 정의하여 삽입 */ ?>
<?php $this->section('appendBody'); ?>
<script>
    $(document).ready(function(){
        $('.btn-close').on('click', function(e) {
            $(this).toggleClass('on');
            $('.qm-wrap').toggleClass('hide');
        });
    });
</script>
<?php $this->endSection(); ?>