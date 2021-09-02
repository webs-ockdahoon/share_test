<!DOCTYPE html>
<html lang="ko">
    <head>
    <?php echo $header?>
    </head>

    <body class="page">
        <a class="sr-only sr-only-focusable" href="#content">본문 바로가기</a>

        <header class="page-header" data-toggle-fixed="page-header">
            <div class="page-header__global">
                <div class="container-fluid">
                    <div class="text-lg-right text-caption text-muted">
                        <a href="#">로그인</a>
                        <a href="#">회원가입</a>
                        <a href="#">주문배송</a>
                        <a href="#">고객센터</a>
                    </div>
                </div>
            </div>

            <nav class="navbar page-header__navbar border-bottom border-bottom-2 border-primary--dark">
                <div class="page-header__navbar-header">
                    <div class="container-fluid">
                        <a href="/" class="navbar-brand" >
                            <img src="<?php echo $THEME_URL?>/images/logo.png" alt="webs01">
                        </a>

                        <div class="navbar-searchform">
                            <?php echo $this->include($THEME_URL."/common/pageSearchform"); ?>
                        </div>

                        <div class="d-none d-lg-flex flex-lg-nowrap ml-lg-auto navbar-links text-caption">
                            <a href="#" class="btn">
                                <span class="material-icons-round md-32 d-block">person_outline</span>
                                마이팁
                            </a>
                            <a href="#" class="btn">
                                <span class="material-icons-round md-32 d-block">favorite_border</span>
                                나의 찜
                            </a>
                            <a href="#" class="btn">
                                <span class="material-icons-outlined md-32 d-block">shopping_cart</span>
                                장바구니
                            </a>
                        </div>

                        <button type="button" class="btn btn-search" data-toggle="modal" data-target="#pageSearchModal">
                            <span class="sr-only">검색하기</span>
                            <span class="material-icons-round md-32">search</span>
                        </button>

                        <button type="button" class="btn btn-drawer" data-toggle="modal" data-target="#pageNavDrawerModal">
                            <span class="sr-only">전체 메뉴보기</span>
                            <span class="material-icons-round md-32">menu</span>
                        </button>
                    </div>
                </div>

                <div class="page-header__navbar-content border-top">
                    <div class="container-fluid">

                        <div class="dropdown navbar-category">
                            <button type="button" class="btn btn-primary--dark rounded-0 d-flex align-items-center btn-category" id="allCategoryButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">전체 카테고리</span>
                                <span class="material-icons-round md-32 opacity-100">menu</span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="allCategoryButton">
                                <?php echo $this->include($THEME_URL."/common/allCategory"); ?>
                            </div>
                        </div>

                        <div class="mr-lg-auto page-header__navbar-nav">
                            <ul class="list-unstyled nav slick-slider--v1 js__swipe-nav">
                                <li class="nav-item dropdown nav-item--hover-dropdown">
                                    <a href="/product" class="nav-link dropdown-toggle" id="menu10" aria-haspopup="true">
                                        렌탈
                                    </a>
                                    <div class="dropdown-menu dropdown-menu--v1" aria-labelledby="menu10">
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1010">공기청정기</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1020">냉장고</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1030">커피머신</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1040">청소기</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1050">김치냉장고</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown nav-item--hover-dropdown">
                                    <a href="/product" class="nav-link dropdown-toggle" id="menu20" aria-haspopup="true">팁스토어</a>

                                    <div class="dropdown-menu dropdown-menu--v1" aria-labelledby="menu20">
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1010">공기청정기</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1020">냉장고</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1030">커피머신</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1040">청소기</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1050">김치냉장고</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown nav-item--hover-dropdown">
                                    <a href="/product" class="nav-link dropdown-toggle" id="menu30" aria-haspopup="true">마이골드</a>

                                    <div class="dropdown-menu dropdown-menu--v1" aria-labelledby="menu30">
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1010">24k</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1020">18k</a>
                                        <a class="dropdown-item" href="https://tip.bluecomet.kr/shop/list.php?ca_id=1030">14k</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">기획이벤트</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">고객센터</a>
                                </li>
                            </ul>
                        </div>

                        <div class="navbar-aside">
                            <a href="#">
                                02-123-4567
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main id="content" class="page-content">
            <?php foreach($views as $v){
                echo $v;
            }?>
        </main>

        <footer class="page-footer text-caption bg-light">
            <div class="py-3 border-bottom border-gray--light page-footer__links">
                <div class="container-fluid">
                    <div class="bullet-links justify-content-center justify-content-md-start text-muted">
                        <a href="#">TIP 소개</a>
                        <a href="#">이용약관</a>
                        <a href="#" class="font-weight-bold">개인정보취급방침</a>
                        <a href="#">제3자정보제공</a>
                        <a href="#">이벤트</a>
                    </div>
                </div>
            </div>

            <div class="py-4 py-xl-5 page-footer__content">
                <div class="container-fluid">
                    <div class="row flex-row-reverse">
                        <div class="col-12 col-xl-auto flex-xl-grow-1 mb-4 mb-xl-0 mr-lg-auto">
                            <section class="text-center text-md-left page-footer__cs-info">
                                <div class="mb-2">
                                    <h3 class="text-base font-weight-bold text-dark mb-0">고객센터</h3>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-12 col-md-auto">
                                        <a href="tel:02-1234-5678" class="d-inline-block mb-2 h4 font-weight-bold text-primary">
                                            02-123-4567
                                        </a>
                                        <ul class="list-unstyled mb-3 mb-md-0 text-body2">
                                            <li>운영시간: 평일 09:00~18:00 <small class="d-block d-md-inline mb-1 mb-md-0 text-caption">(공휴일 및 주말제외)</small></li>
                                            <li>점심시간: 12:30~13:30</li>
                                        </ul>
                                    </div>

                                    <div class="col-12 col-md-auto page-footer__cs-info__links">
                                        <a href="#" class="btn btn-white">
                                            <span class="material-icons-round">support_agent</span>
                                            <span class="d-block">1:1문의</span>
                                        </a>

                                        <a href="#" class="btn btn-white">
                                            <span class="material-icons-outlined">live_help</span>
                                            <span class="d-block">FAQ</span>
                                        </a>

                                        <a href="#" class="btn btn-kb-escrow">
                                            <span class="sr-only">KB 에스크로이체</span>
                                        </a>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="col-12 col-xl-auto flex-xl-grow-1">
                            <section class="page-footer__company-info">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                                    <h3 class="text-base font-weight-bold text-dark mr-n2 mb-0">TIP 사업자정보</h3>
                                    <button type="button" class="btn btn-sm d-inline-flex align-items-center btn-toggler" data-toggle="collapse" data-target="#companyInfo" aria-expanded="true" aria-controls="companyInfo">
                                        <span class="material-icons-round">expand_more</span>
                                    </button>
                                </div>
                                <address id="companyInfo" class="collapse show text-center text-md-left">
                                    <ul class="list-unstyled text-muted" style="line-height: 1.5;">
                                        <li>
                                            사업자 등록번호: 732-88-01424
                                            <a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=732-88-01424" class="mi--before mi--external-link mi--hover link--lined text-overline font-weight-bold text-dark" target="_blank" title="새창열림">
                                                사업자정보 확인
                                            </a>
                                        </li>
                                        <li>
                                            통신판매업신고번호: 제2021-서울서초-0869호
                                        </li>
                                        <li>
                                            서울특별시 서초구 강남대로 107길 21, 2층(잠원동)
                                        </li>
                                        <li>
                                            개인정보 보호책임자: 박재홍
                                        </li>
                                    </ul>
                                </address>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-md-left page-footer__copyright pb-3 text-muted">
                <div class="container-fluid">
                    <p>Copyright &copy; TIP.  All rights reserved.</p>
                </div>
            </div>
        </footer>

        <?php echo $this->include($THEME_URL."/common/pageSearchModal"); ?>
        <?php echo $this->include($THEME_URL."/common/pageNavDrawerModal"); ?>
    </body>
</html>