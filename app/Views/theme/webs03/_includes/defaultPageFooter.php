<footer class="default-page-footer bg-dark text-white-50">
    <div class="container container-lg default-page-footer__container">

        <nav class="default-page-footer__nav js__page-footer__nav">
            <h2 class="sr-only">주 메뉴</h2>
            <?php echo $this->include($THEME_URL.'/_includes/primaryNavigation'); ?>
        </nav>

        <div class="default-page-footer__info">
            <h2 class="sr-only">정보</h2>
            <img src="<?php echo $THEME_URL ?>/images/logo-text-white.png" alt="" class="img-fluid default-page-footer__info-logo">
            <dl class="default-page-footer__info-table">
                <div class="default-page-footer__info-item">
                    <dt class="item-label">
                        <span class="material-icons-round icon">place</span>
                        <span class="sr-only">주소</span>
                    </dt>
                    <dd class="item-text">49201 부산광역시 서구 대신공원로 26</dd>
                </div>

                <div class="default-page-footer__info-item">
                    <dt class="item-label">
                        <span class="material-icons-round icon">mail</span>
                        <span class="sr-only">이메일</span>
                    </dt>
                    <dd class="item-text">
                        <a href="mailto:funky293@hanmail.net">funky293@hanmail.net</a>
                    </dd>
                </div>

                <div class="default-page-footer__info-item default-page-footer__info-item--tel">
                    <dt class="sr-only">전화번호</dt>
                    <dd class="item-text">+82 51-240-2306</dd>
                </div>
            </dl>
        </div>

        <div class="default-page-footer__utils">
            <div class="default-page-footer__utils-sns">
                <h2 class="sr-only">소셜 미디어 바로가기</h2>
                <a href="https://www.facebook.com/" class="icon icon-sns icon-sns--facebook is-white" target="_blank" rel="noopener noreferrer" title="페이스북 새창 열기"></a>
                <a href="https://www.instagram.com/" class="icon icon-sns icon-sns--instagram is-white" target="_blank" rel="noopener noreferrer" title="인스타그램 새창 열기"></a>
                <a href="https://www.youtube.com/" class="icon icon-sns icon-sns--youtube is-white" target="_blank" rel="noopener noreferrer" title="유튜브 새창 열기"></a>
            </div>

            <div class="default-page-footer__utils-terms">
                <ul class="bullet-list bullet-list--inline-after term-links">
                    <li class="text-white"><a href="">Privacy Policy</a></li>
                </ul>
                <p class="term-copyright">Copyright ⓒ DONG-A UNIVERSITY MEDICAL CENTER. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
