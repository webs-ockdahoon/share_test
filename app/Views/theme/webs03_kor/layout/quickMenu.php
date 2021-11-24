
<div class="qm-wrap">
    <div class="qm-box">
        <div class="qm-title">Quick Menu</div>
        <ul class="qm-list">
            <li>
                <a href="#" target="_self">
                    <img src="<?php echo $THEME_URL; ?>/images/main/qm-icon01.png" alt="병원소식" width="15" height="15" class="img-fluid"><span>병원소식</span>
                </a>
            </li>
            <li>
                <a href="#" target="_self">
                    <img src="<?php echo $THEME_URL; ?>/images/main/qm-icon02.png" alt="상담신청" width="15" height="15" class="img-fluid"><span>상담신청</span>
                </a>
            </li>
            <li>
                <a href="#" target="_self">
                    <img src="<?php echo $THEME_URL; ?>/images/main/qm-icon03.png" alt="진료절차" width="15" height="15" class="img-fluid"><span>진료절차</span>
                </a>
            </li>
        </ul>
    </div>
    <button type="button" class="btn-close">    </button>
</div>

<script src="/assets/plugins/jquery/jquery-3.6.0.min.js"></script>
<script src="/assets/plugins/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $THEME_URL; ?>/script/common.js"></script>

<script>
    $(document).ready(function(){
        $('.btn-close').on('click', function(e) {
            $(this).toggleClass('on');
            $('.qm-wrap').toggleClass('hide');
        });
    });
</script>