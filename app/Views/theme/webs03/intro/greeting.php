<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--intro page--intro-greeting');
    $this->setVar('heroTitle', '인사말');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-greeting.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="content-bg"></div>

    <article class="container section">

        <div class="section-header">
            <h3 class="section-title">
                “사랑과 인술로 늘 함께하는동아대학교병원”의 각오를 다지며 <br class="d-none d-lg-block">
                한마음 한뜻으로 감동의 의료서비스를 펼쳐나가겠습니다.
            </h3>
        </div>

        <div class="section-body text-muted">
            <p>
                현재 36개 진료과, 30여개의 전문센터, 100여개의 특수클리닉, 1000여 병상수를 갖추고 시사저널에서 선정한 「전국 10대 우수병원」, 산업자원통상부가 인정한
                「의료서비스품질우수병원」으로서 부산지역의 대표적 대학병원으로 자리매김하였습니다.
            </p>

            <p>
                우수한 의료진, 최첨단 고해상도의 MRI(지멘스 MAGNETOM VIDA), CT(지멘스 Definition Edge), PET-CT 등 정확한 진단장비와 다빈치 로봇수술, 차세대심장혈관영상
                치료기, 방사선치료기 Elekta Infinity HD 및 최첨단 노발리스 등 효과적인 치료 장비 그리고 Full PACS(영상정보저장전달시스템)과 HIS(통합병원정보시스템) 등 편리한
                의료시스템을 갖추고 있습니다.
            </p>

            <p>
                부산권역심뇌혈관질환센터, 부산 유일 권역응급의료센터, 부산광역치매센터, 신생아집중치료지역센터, 부·울·경 제대혈은행, 부산지역장애인보건의료센터 등 10여개의
                보건의료 정책지원사업에 지정되어 지역주민의 질병치유와 건강하고 행복한 삶을 영위하는데 최선을 다하고 있습니다.
            </p>

            <p>
                2016년부터 본격 진행해오고 있는 병원 리모델링을 2021년 완성 예정임에 따라 특실병동을 비롯하여 보다 쾌적하고 품격있는 병원 인프라를 통해 대한민국 최고의 병원 중
                하나가 될 것입니다.
            </p>

            <p>
                4차 산업혁명시대를 맞아 영남지역 유일 보건복지부 첨단재생의료실시기관 지정과 ㈜뷰노· ㈜딥노이드 등과의 업무협약을 통해 스마트병원 구축에도 최선을 다하고
                있습니다.
            </p>

            <p>
                동아대학교병원은 “첨단 지능형 시스템 기반의 중증치료 전문 대학병원”으로 도약하기 위해 우수한 의료인력 확보와 첨단 의료장비 도입 그리고 쾌적한 고품격 진료 공간
                조성에 최선을 다하고 있습니다.
            </p>
        </div>

    </article>
<?php echo $this->endSection(); ?>