<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php echo $header?>
        <?php echo $this->renderSection('appendHead'); ?>
    </head>

    <?php
        // Fake data
        $pageNavs = [
                [
                    'label' => '병원소개',
                    'link' => '/',
                    'is-active' => FALSE,
                    'is-external-link' => FALSE,
                    'sub' => [
                            [
                                'label' => '병원소개',
                                'link' => '/',
                                'is-active' => FALSE,
                                'is-external-link' => FALSE,
                            ],
                            [
                                'label' => '감독의 인사말',
                                'link' => '/',
                                'is-active' => FALSE,
                                'is-external-link' => FALSE,
                            ],
                            [
                                'label' => '기본 지연 목표',
                                'link' => '/',
                                'is-active' => FALSE,
                                'is-external-link' => FALSE,
                            ],
                            [
                                'label' => '병원 이력',
                                'link' => '/',
                                'is-active' => FALSE,
                                'is-external-link' => FALSE,
                            ],
                            [
                                'label' => '비전과 사명',
                                'link' => '/',
                                'is-active' => FALSE,
                                'is-external-link' => FALSE,
                            ],
                            [
                                'label' => '의료 시설 데이터',
                                'link' => '/',
                                'is-active' => FALSE,
                                'is-external-link' => FALSE,
                            ],
                    ],
                ],
                [
                    'label' => '부서',
                    'link' => '/',
                    'is-active' => FALSE,
                    'is-external-link' => FALSE,
                ],
                [
                    'label' => '전문센터',
                    'link' => '/',
                    'is-active' => FALSE,
                    'is-external-link' => FALSE,
                ],
                [
                    'label' => '병원정보',
                    'link' => '/',
                    'is-active' => FALSE,
                    'is-external-link' => FALSE,
                    'sub' => [
                        [
                            'label' => '국제의료센터',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                            'sub' => [
                                [
                                    'label' => '센터장 인사말',
                                    'link' => '/',
                                    'is-active' => FALSE,
                                    'is-external-link' => FALSE,
                                ],
                                [
                                    'label' => '센터에서 일하는 직원',
                                    'link' => '/',
                                    'is-active' => FALSE,
                                    'is-external-link' => FALSE,
                                ],
                                [
                                    'label' => '비즈니스 프로세스',
                                    'link' => '/',
                                    'is-active' => FALSE,
                                    'is-external-link' => FALSE,
                                ],
                            ],
                        ],
                        [
                            'label' => '위치',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                            'sub' => [
                                [
                                    'label' => '본관',
                                    'link' => '/',
                                    'is-active' => FALSE,
                                    'is-external-link' => FALSE,
                                ],
                                [
                                    'label' => '새 건물',
                                    'link' => '/',
                                    'is-active' => FALSE,
                                    'is-external-link' => FALSE,
                                ],
                                [
                                    'label' => '중앙 건물',
                                    'link' => '/',
                                    'is-active' => FALSE,
                                    'is-external-link' => FALSE,
                                ],
                            ],
                        ],
                        [
                            'label' => '컨시어지 서비스',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '정보 주차에 대해',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '소비자 서비스 기업',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '운전 경로',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '연락처',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                    ],
                ],
                [
                    'label' => '게시판',
                    'link' => '/',
                    'is-active' => FALSE,
                    'is-external-link' => FALSE,
                    'sub' => [
                        [
                            'label' => '환자 문의',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '지원서',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '환자 평가',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '갤러리',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                        [
                            'label' => '병원 소식',
                            'link' => '/',
                            'is-active' => FALSE,
                            'is-external-link' => FALSE,
                        ],
                    ],
                ],
        ];
        
        // [TEST] 단계별로 모든 하위 메뉴 만드는 재귀 함수
        function getSubNavHtml($sub_items, $depth = 0) {
            $sub_nav_html = "<ul class='nav-sub nav-sub{$depth}'>%sub_items%</ul>";

            $sub_items_html = array_reduce($sub_items, function($carry, $item) use ($depth) {
                $active_class = $item['is-active'] ? 'is-active' : '';
                $link_target =  $item['is-external-link'] ? '_blank' : '_self';

                $item_sub_html = isset($item['sub']) && !empty($item['sub']) ? getSubNavHtml($item['sub'], $depth + 1) : '';

                $item_str = "<li class='nav-item'><a href='{$item['link']}' class='nav-link {$active_class}' target='{$link_target}'>{$item['label']}</a>{$item_sub_html}</li>";

                return $carry.$item_str;
            }, '');

            return str_replace("%sub_items%", $sub_items_html, $sub_nav_html);
        }
    ?>

    <body class="default-layout page">
        <a class="sr-only sr-only-focusable" href="#content">본문 바로가기</a>

        <header class="default-page-header">
            <div class="container header-container">
                <h1 class="header-brand">
                    <a href="/" class="brand-logo">
                        <img src="<?php echo $THEME_URL; ?>/images/logo.png" alt="동아대학교병원" width="162" height="36" class="img-fluid">
                    </a>
                </h1>

                <button type="button" class="btn header-nav-toggler" data-target="#siteNav" title="메뉴열기">
                    <span class="material-icons-round">menu</span>
                </button>

                <h2 class="sr-only">병원 정보</h2>
                <dl class="header-info">
                    <div class="header-info__item">
                        <dt class="header-info__label">
                            <span class="material-icons-round">schedule</span>
                            <span class="sr-only">상담시간</span>
                        </dt>
                        <dd class="header-info__text">
                            월 – 금: 00AM - 00PM<br>
                            토 – 일: 00AM - 00PM
                        </dd>
                    </div>

                    <div class="header-info__item">
                        <dt class="header-info__label">
                            <span class="material-icons-round">place</span>
                            <span class="sr-only">주소</span>
                        </dt>
                        <dd class="header-info__text">
                            부산광역시 서구 대신공원로 26
                        </dd>
                    </div>

                    <div class="header-info__item page-header-info__item--tel">
                        <dt class="header-info__label">
                            <span class="material-icons-round">call</span>
                            <span class="sr-only">연락처</span>
                        </dt>
                        <dd class="header-info__text">
                            <span class="d-none d-md-block">Call Us:<br></span>(+82) 51-240-2306
                        </dd>
                    </div>
                </dl>

                <nav id="siteNav" class="header-navbar">
                    <button type="button" class="btn btn-icon header-search-toggler" data-target="#siteSearch" title="검색창 열기">
                        <span class="material-icons-round">search</span>
                    </button>

                    <?php if (!empty($pageNavs)): ?>
                        <h2 class="sr-only">주 메뉴</h2>
                        <ul class="nav header-nav">
                            <?php foreach($pageNavs as $item): ?>
                                <li class="nav-item">
                                    <a href="<?php echo $item['link']; ?>" target="<?php echo $item['is-external-link'] ? '_blank' : '_self'; ?>" class="nav-link <?php echo $item['is-active'] ? 'is-active' : ''; ?>">
                                        <?php echo $item['label']; ?>
                                    </a>

                                    <?php
                                        if (isset($item['sub']) && !empty($item['sub'])):
                                            echo getSubNavHtml($item['sub']);
                                        endif;
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <!--
                    <form role="search" id="siteSearch" class="page-header__search">
                        <h2 class="sr-only">검색하기</h2>
                        <input type="text" placeholder="검색어를 입력하세요.">
                        <button type="submit">검색하기</button>
                    </form>
                    -->
                </nav>
            </div>
        </header>

        <div class="default-page-header__placeholder"></div>

        <div id="content" class="page-content bg-light p-5" style="min-height: 120vh;">
            <?php echo $this->renderSection('content'); ?>
        </div>
        
        <footer class="page-footer">
            page footer
        </footer>

        <?php echo $this->renderSection('appendBody'); ?>
    </body>
</html>

