<?php echo $this->extend($THEME_URL.'/layout/defaultLayout'); ?>

<?php
// dummy text
$faqs = [
    [
        'title' => '청춘예찬',
        'content' => '
            되려니와, 우리는 되는 얼음과 가는 주며, 바이며, 듣는다. 그들은 청춘에서만 방지하는 얼마나 사는가 것이 피어나는 생의 것이다.보라, 것이다. 위하여 위하여 날카로우나 방지하는 역사를 얼마나 소담스러운 것은 운다. 수 그들은 노년에게서 있으랴? 천지는 황금시대의 뭇 것이 끝에 우리의 청춘의 따뜻한 동산에는 교향악이다. 이것을 가슴이 바로 위하여서.                    
        ',
    ],
    [
        'title' => '별 헤는 밤',
        'content' => '
            같이, 인류의 되려니와, 인간이 같지 같이, 예수는 있을 사막이다. 청춘을 구할 이 귀는 이상은 미묘한 아니더면, 부패뿐이다. 그러므로 없는 위하여서 청춘의 피가 구할 피어나기 있는 말이다. 같은 노래하며 품었기 그들의 밝은 힘있다. 같은 인생의 것은 것이다. 것은 들어 안고, 우리 이상 때문이다. 꽃이 그들의 있음으로써 간에 피가 천자만홍이 위하여 그러므로 있는가? 없으면 몸이 그들은 바이며, 무엇이 그들은 부패뿐이다. 놀이 끓는 풀이 가장 미인을 풍부하게 것은 어디 아니다. 보는 갑 품고 뿐이다. 무엇을 구하지 있는 힘차게 하였으며, 황금시대다.
        ',
    ],
    [
        'title' => '청춘예찬 두번째',
        'content' => '
            하는 고행을 피부가 가는 사는가 인간은 청춘이 인도하겠다는 그리하였는가? 위하여 꽃이 봄날의 일월과 풀이 보이는 구하지 끝까지 생의 사막이다. 위하여, 이상, 크고 아름다우냐? 두기 얼음과 맺어, 밝은 따뜻한 오직 피다. 없는 싹이 실로 위하여서, 가치를 약동하다. 같은 별과 밥을 무엇이 것이다.                
        ',
    ],
]
?>

<?php
$this->setVar('bodyClassName', 'page--main');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="/assets/plugins/swiper@4.5.3/dist/css/swiper.min.css">
<link rel="stylesheet" href="<?php echo $THEME_URL; ?>/css/pages/main.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<!-- 팝업 레이어 영역 -->
<?php
if(!empty($pop_list)){ ?>
    <div id="hd_pop" class="hd_pop--pc">
        <h2>팝업레이어</h2>
        <?php
        foreach($pop_list as $key => $val)
        {
            // 이미 체크 되었다면 Continue
            if (!empty($_COOKIE["hd_pops_{$val['pop_idx']}"]))
            {
                continue;
            }

            // 링크가 있을 경우에만 넣어주기
            $pop_link = empty($val['pop_link']) ? "" : "href=".$val['pop_link'];
            ?>

            <div id="hd_pops_<?php echo $val['pop_idx']; ?>" class="hd_pops" style="top:<?php echo $val['pop_pos_y'];?>px; left:<?php echo $val['pop_pos_x'];?>px">
                <div class="hd_pops_con">
                    <a <?php echo $pop_link; ?> target="<?php echo $val['pop_link_target']; ?>">
                        <img src="/uploaded/file/<?php echo $val["pop_image"];?>" alt="팝업이미지">
                    </a>
                </div>
                <div class="hd_pops_footer">
                    <button class="hd_pops_reject hd_pops_<?php echo $val['pop_idx']; ?> 24"><strong>24</strong>시간 동안 보지 않기</button>
                    <button class="hd_pops_close hd_pops_<?php echo $val['pop_idx']; ?>">닫기</button>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<main>
    <div class="section my-0 hero-section bg-light">
        <div class="swiper-container hero-swiper js__hero-swiper">
            <div class="swiper-wrapper">
                <?php foreach($slider_list as $bn):
                    $link = "";
                    $cursor = "";
                    if($bn['ban_link']){
                        $link = ' onclick="slider_link(\'' . $bn['ban_link'] . '\',\'' . $bn['ban_link_target'] . '\')"';
                        $cursor = "cursor:pointer;";
                    }
                    ?>
                    <div class="swiper-slide hero-card" style="background-image: url('/uploaded/file/<?php echo $bn['ban_image']?>');<?php echo $cursor?>" <?php echo $link?>>
                        <!--
                        <div class="container container--max-md">
                            <div class="card-body">
                                <p class="card-text text-dark">사랑과 인술로 늘 함께하는 동아대학교병원</p>
                            </div>
                        </div>
                        -->
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination swiper-pagination--v1 js__hero-swiper__pagination"></div>
        </div>
    </div>

    <article class="section section-gutter service-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">진료과목</strong></h2>
            </div>

            <div class="swiper-container service-swiper js__service-swiper">
                <div class="swiper-wrapper">

                    <?php foreach($main_dep_list as $dep_item){

                        $link = "medical";
                        if($dep_item['dep_group']=='specializedcenter')$link='center';

                        ?>
                    <div class="swiper-slide">
                        <div>
                            <a href="/kor/<?php echo $link?>/departmentInfo/<?php echo $dep_item['dep_idx']?>" class="card service-card">
                                <div class="card-sidebar">
                                    <img src="/uploaded/file/<?php echo $dep_item['dep_image']?>">
                                </div>

                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $dep_item['dep_title']?></h3>
                                    <span class="btn card-btn">바로가기</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php }?>

                </div>

                <div class="swiper-pagination swiper-pagination--v1 js__service-swiper__pagination"></div>
            </div>
        </div>
    </article>

    <article class="section section-gutter my-0 bg-air member-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">진료후기</strong></h2>
            </div>

            <div class="swiper-container member-swiper js__member-swiper">
                <div class="swiper-wrapper">
                    <?php foreach($rev_list as $rev):
                        if($rev['rev_main_name'])$rev['rev_name']=$rev['rev_main_name'];
                        if($rev['rev_main_content'])$rev['rev_content']=$rev['rev_main_content'];
                        ?>
                        <div class="swiper-slide">
                            <section class="card member-card">
                                <button type="button" class="btn member-btn" data-toggle="modal" data-target="#pageReviewModal" title="진료후기">
                                    <div class="card-header">
                                        <h3 class="card-title text-muted"><?php echo $rev['rev_name']?>님의 후기</h3>
                                        <p class="card-subtitle text-primary"><?php echo $rev['dep_title']?> 방문</p>
                                    </div>

                                    <div class="card-body">
                                        <p class="card-text text-muted">
                                            <?php echo $rev['rev_content']?>
                                        </p>
                                    </div>
                                </button>
                            </section>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination swiper-pagination--v1 js__member-swiper__pagination"></div>
            </div>

        </div>
    </article>

    <div class="modal fade" id="pageReviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">진료후기</h4>
                    <button type="button" class="btn btn-icon modal-close" data-dismiss="modal" aria-label="Close">
                        <span class="material-icons-round">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="member-card">
                        <h3 class="member-modal-title text-muted">name</h3>
                        <p class="member-modal-sub-title text-primary">departent</p>
                        <p class="member-modal-text text-muted">
                            content
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <article class="section section-gutter my-0 counselling-section">
        <div class="container">
            <div class="card cta-card">
                <div class="card-body">
                    <h2 class="card-title">상담신청</h2>
                    <p class="card-text">
                        언제나 친절하게상담하여 드립니다. 궁금하신 사항이 있으시면 상담신청을 통해 질문해주세요. 최선을 다해 답변해드리겠습니다.
                    </p>
                </div>
                <div class="card-action">
                    <a href="/mrequest/inquiry" class="btn btn-primary card-btn">바로가기</a>
                </div>
            </div>
        </div>
    </article>

    <article class="section section-column2 news-section">
        <div class="container">
            <div class="section-content">
                <div class="section-header">
                    <h2 class="section-title">병원 <strong class="text-primary">소식</strong></h2>
                </div>

                <ul class="list-unstyled mb-0 news-cards">
                    <?php

                    if(isset($bod_list['newskor']['article'])){
                        foreach($bod_list['newskor']['article'] as $bod):
                            $d = strtotime($bod['bod_created_at']);
                            ?>
                            <li class="card news-card">
                                <div class="card-sidebar">
                                    <time class="card-date">
                                        <span class="date-day"><?php echo date("d",$d);?></span>
                                        <span class="date-month"><?php echo date("M",$d);?></span>
                                    </time>
                                </div>

                                <div class="card-body">
                                    <h3 class="card-title text-truncate text-dark">
                                        <a href="/board/newskor/read/<?php echo $bod['bod_idx']?>"><?php echo $bod['bod_title']?></a>
                                    </h3>

                                    <p class="card-text text-muted text-truncate">
                                        <?php echo $bod['bod_content']?>
                                    </p>
                                </div>
                            </li>
                        <?php endforeach;
                    }?>
                </ul>
            </div>

            <div class="section-sidebar">
                <div class="embed-responsive embed-responsive-16by9 media-frame">
                    <iframe width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $config_site['main_movie1_id']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </article>

    <article class="section section-gutter my-0 network-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">건강 <strong class="text-primary">네트워크</strong></h2>
            </div>

            <ul class="list-unstyled mb-0 row row-xs network-list">
                <?php foreach(range(1, 12) as $ni): ?>
                    <li class="col-3 col-lg-2">
                        <a href="/" class="link-hover--img-zoom">
                            <img src="<?php echo $THEME_URL; ?>/images/main/network-img<?php echo $ni < 10 ? "0{$ni}" : $ni; ?>.jpg" alt="" class="img-fluid">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </article>

    <article class="section section-gutter partner-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">협력업체</strong></h2>
            </div>

            <div class="swiper-container partner-swiper js__partner-swiper">
                <div class="swiper-wrapper">
                    <?php foreach($par_list as $par): ?>
                        <div class="swiper-slide">
                            <div class="swiper-box">
                                <a href="<?php echo $par['par_link']?>" class="card partner-card" target="_blank">
                                    <div class="card-body">
                                        <img src="/uploaded/file/<?php echo $par['par_image']?>" alt="" loading="lazy" decoding="async" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination swiper-pagination--v1 js__partner-swiper__pagination"></div>
            </div>

        </div>
    </article>
</main>

<?php echo $this->endSection(); ?>

<?php echo $this->section('appendBody'); ?>
<script src="/assets/plugins/swiper@4.5.3/dist/js/swiper.min.js"></script>
<script>
    new Swiper(".js__hero-swiper", {
        pagination: {
            el: ".js__hero-swiper__pagination",
            clickable: true,
        },
    });

    new Swiper('.js__service-swiper', {
        slidesPerView: 5,
        spaceBetween: 24,
        pagination: {
            el: ".js__service-swiper__pagination",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            767: {
                slidesPerView: 2,
            },
        },
    })

    new Swiper('.js__member-swiper', {
        slidesPerView: 3,
        spaceBetween: 24,
        pagination: {
            el: ".js__member-swiper__pagination",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 2,
            },
            767: {
                slidesPerView: 1,
            },
        },
    })

    new Swiper('.js__partner-swiper', {
        slidesPerView: 4,
        spaceBetween: 24,
        autoplay: true,
        loop: true,

        pagination: {
            el: ".js__partner-swiper__pagination",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            767: {
                slidesPerView: 2,
            },
        },
    });

    function review_detail(obj){
        var v1 = obj.find(".card-title").html();
        var v2 = obj.find(".card-subtitle").html();
        var v3 = obj.find(".card-text").html();

        v3 = v3.replaceAll("\n","<br>");

        $("#pageReviewModal .member-modal-title").html(v1);
        $("#pageReviewModal .member-modal-sub-title").html(v2);
        $("#pageReviewModal .member-modal-text").html(v3);
        $("#pageReviewModal").modal("show");
    }

    // 팝업
    $(function() {
        $(".hd_pops_reject").click(function() {
            var id = $(this).attr('class').split(' ');
            var ck_name = id[1];
            var exp_time = parseInt(id[2]);
            $("#"+id[1]).css("display", "none");
            setCookie(ck_name, "N",1);
        });
        $('.hd_pops_close').click(function() {
            var idb = $(this).attr('class').split(' ');
            $('#'+idb[1]).css('display','none');
        });
        $("#hd").css("z-index", 99999);
    });

    // 24시간동안 보지 않기 쿠키
    function setCookie(name, value, expiredays) {
        var date = new Date();
        date.setDate(date.getDate() + expiredays);
        document.cookie = escape(name) + "=" + escape(value) + "; path=/; expires=" + date.toUTCString();

    }

</script>
<?php echo $this->endSection(); ?>

