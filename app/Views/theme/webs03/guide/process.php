<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--guide page--guide-process');
    $this->setVar('heroTitle', '진료 절차');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-process.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">
                요양급여의뢰서 지참
            </h3>
        </div>
        <div class="section-body section-text text-muted">
            <ul class="list-bullet">
                <li class="mb-3">
                    동아대학교병원은 상급종합병원(3차병원)으로 지정되어 1차·2차 진료기관(병, 의원)에서 발급한 요양급여의뢰서나 진료이상 소견이 기재된 건강검진 결과서를
                    진료당일(발급일 동일)에 반드시 지참하셔야 보험 적용을 받을 수 있습니다.
                    <br>
                    <small class="text-tip">
                        ※ 단, 응급진료, 분만, 가정의학과, 치과, 재활의학과(등록장애인, 작업치료, 운동치료 등)는 요양급여의뢰서 없이 진료받으실 수 있습니다.
                    </small>
                </li>

                <li>
                    요양급여의뢰서는 발급일로부터 <strong>7일</strong>, 검진결과지는 발급일로부터 <strong>60일이내 유효</strong>합니다.
                    <br>
                    <small class="text-tip">
                        ※ 단, 의료급여 환자는 모든 과 진료시 2차 진료기관(병원급)에서 발급된 의료급여의뢰서를 지참하셔야 의료보험적용을 받으실 수 있습니다.
                    </small>
                </li>
            </ul>
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">
                외래진료시간
            </h3>
        </div>
        <div class="section-body section-text text-muted">
            <ul class="list-bullet is-non-list">
                <li>
                    진료접수시간 : 평일 08:00 ~ 16:30
                    <br>
                    <small class="text-tip">
                        ※ 접수시간은 각과사정에 따라 달라질 수 있으므로 해당과에 전화 (대표전화:<strong class="font-weight-normal text-danger">240-2000</strong>) 문의 후 내원 바랍니다.
                    </small>
                </li>
                <li>
                    토요일 - 치과 교정진료(2·3째주)가능
                </li>
                <li>
                    응급 및 분만환자는 응급의료센터에서 24시간 진료가능
                </li>
            </ul>
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">
                진료절차안내
            </h3>
        </div>

        <div class="section-body section-text text-muted">

            <div class="section-box">
                <h4 class="section-subtitle text-dark mb-3">1. 처음 오신분(초진)</h4>
                <ol class="list-unstyled process--new">
                    <li class="process-step">
                        <h5 class="process-step__header">
                            <span class="icon icon-d icon-d--board"></span>
                            <small class="font-weight-bold text-uppercase text-primary">step 01</small> 1층 고객지원센터
                        </h5>
                        <div class="process-step__body">
                            <p class="list-bullet is-non-list">
                                요양급여의뢰서, 신분증, 건강보험증 등을 가지고 고객지원센터에서 진료신청서를 작성합니다.
                            </p>
                        </div>
                    </li>

                    <li class="process-step">
                        <h5 class="process-step__header">
                            <span class="icon icon-d icon-d--stethoscope"></span>
                            <small class="font-weight-bold text-uppercase text-primary">step 02</small> 진료
                        </h5>
                        <div class="process-step__body">
                            <p class="list-bullet is-non-list">
                                해당 진료과로 가셔서 진료카드와 접수증을 제시하고 순번대로 진료를 받으십시오.
                            </p>
                        </div>
                    </li>

                    <li class="process-step">
                        <h5 class="process-step__header">
                            <span class="icon icon-d icon-d--dollar"></span>
                            <small class="font-weight-bold text-uppercase text-primary">step 03</small> 수납
                        </h5>
                        <div class="process-step__body">
                            <p class="list-bullet is-non-list">
                                진료를 받으신 후, 외래원무과 접수 · 수납 창구로 가셔서 진료카드를 제시하고 진료비 계산 및 다음 진료를 예약합니다.
                            </p>
                        </div>
                    </li>

                    <li class="process-step">
                        <h5 class="process-step__header">
                            <span class="icon icon-d icon-d--syringe"></span>
                            <small class="font-weight-bold text-uppercase text-primary">step 04</small> 검사/촬영/주사/투약
                        </h5>
                        <div class="process-step__body">
                            <p class="list-bullet is-non-list">
                                수납영수증에 표시된 해당부서로 가서 검사/촬영/주사실에 접수하면 됩니다. <span class="text-danger">처방전 발행은 외래원무과
                                수납창구에서 원내투약은 본관 1층 약제국에서 받으십시오.</span>
                            </p>
                        </div>
                    </li>

                    <li class="process-step">
                        <h5 class="process-step__header">
                            <span class="icon icon-d icon-d--home"></span>
                            <small class="font-weight-bold text-uppercase text-primary">step 05</small> 귀가
                        </h5>
                        <div class="process-step__body">
                            <p class="list-bullet is-non-list">
                                다음 진료가 필요한 경우 진료비 계산시 <span class="text-danger">미리 예약을 해두시거나 전화예약(051-240-2400 ~ 1)을 이용하시면
                            편리합니다.</span>
                            </p>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="section-box">
                <h4 class="section-subtitle text-dark mb-3">2. 다시 오신분(재진)</h4>
                <ol class="list-unstyled process--basic">
                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--card rounded-circle bg-gray"></span>
                        </div>

                        <div class="process-step__body">
                            외래원무과 접수·수납창구<br>(진료카드)
                        </div>
                    </li>

                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--pay rounded-circle bg-gray"></span>
                        </div>

                        <div class="process-step__body">
                            해당진료과 진료<br>(진료카드 제시)
                        </div>
                    </li>

                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--dollar rounded-circle bg-gray"></span>
                        </div>

                        <div class="process-step__body">
                            진료계산<br>(외래원무과 접수창구)
                        </div>
                    </li>

                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--inspect rounded-circle bg-gray"></span>
                        </div>

                        <div class="process-step__body">
                            검사, 촬영, 투약<br>(해당검사실, 약국)
                        </div>
                    </li>
                </ol>
            </div>

            <div class="section-box">
                <h4 class="section-subtitle text-dark mb-3">3. 진료비 하이패스 등록하신분</h4>
                <ol class="list-unstyled process--basic">
                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--pay rounded-circle bg-gray"></span>
                        </div>

                        <div class="process-step__body">
                            해당진료과 진료<br>(진료카드 제시)
                        </div>
                    </li>

                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--inspect"></span>
                        </div>

                        <div class="process-step__body">
                            검사, 촬영<br>(해당검사실)
                        </div>
                    </li>

                    <li class="process-step">
                        <div class="process-step__header">
                            <span class="icon icon-d icon-d--syringe bg-air rounded-circle"></span>
                        </div>

                        <div class="process-step__body">
                            투약, 처방전<br>(본관1층 외래약국)
                        </div>
                    </li>
                </ol>
                <p class="text-tip">※ 검사 후 진료시에도 수납 없이 절차 진행</p>
            </div>
        </div>
    </section>
<?php echo $this->endSection(); ?>
