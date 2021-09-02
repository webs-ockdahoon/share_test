<aside id="pageNavDrawerModal" class="modal fade modal-left page-nav-drawer-modal" tabindex="-1" aria-labelledby="pageNavDrawerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-block py-2">
                <div class="d-flex justify-content-between mb-1">
                    <h5 id="pageSearchModalLabel" class="modal-title">
                        <a href="/" class="modal-brand"><img src="<?php echo $THEME_URL; ?>/images/logo.png" alt=""></a>
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="닫기">
                        <span class="material-icons-round md-32">close</span>
                    </button>
                </div>
                <div>
                    <a href="#" class="go-to-link d-inline-flex text-subtitle font-weight-normal text-dark">
                        <span class="go-to-link__text"><strong>로그인</strong> 해 주세요</span>
                        <span class="material-icons-round go-to-link__icon">navigate_next</span>
                    </a>
                </div>
            </div>

            <div class="modal-body">
                <section class="card modal-card mb-2 border-bottom border-bottom-6 user-links">
                    <div class="card-body p-0">
                        <h3 class="sr-only">사용자 빠른 링크 모음</h3>
                        <div class="btn-group btn-group-justified d-flex text-caption text-muted">
                            <a href="#" class="btn border-right">
                                <span class="material-icons-round d-block">person_outline</span>
                                마이팁
                            </a>
                            <a href="#" class="btn border-right">
                                <span class="material-icons-outlined d-block">local_shipping</span>
                                주문배송
                            </a>
                            <a href="#" class="btn border-right">
                                <span class="material-icons-round d-block">favorite_border</span>
                                나의 찜
                            </a>

                            <a href="#" class="btn">
                                <span class="material-icons-outlined d-block">shopping_cart</span>
                                장바구니
                            </a>
                        </div>
                    </div>
                </section>

                <section class="card modal-card page-nav-drawer__category">
                    <div class="card-header">
                        <h3 class="card-title text-dark">카테고리</h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->include($THEME_URL."/common/allCategory"); ?>
                    </div>
                </section>

                <section class="card modal-card page-nav-drawer__cs-links">
                    <div class="card-header">
                        <h3 class="card-title text-dark">고객센터</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <a href="#" class="go-to-link d-flex">
                                <span class="go-to-link__text">렌탈상담</span>
                                <span class="material-icons-round go-to-link__icon">east</span>
                            </a>
                        </li>
                        <li class="list-group-item px-0">
                            <a href="#" class="go-to-link d-flex">
                                <span class="go-to-link__text">제휴카드</span>
                                <span class="material-icons-round go-to-link__icon">east</span>
                            </a>
                        </li>
                        <li class="list-group-item px-0">
                            <a href="#" class="go-to-link d-flex">
                                <span class="go-to-link__text">고객센터</span>
                                <span class="material-icons-round go-to-link__icon">east</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</aside>
