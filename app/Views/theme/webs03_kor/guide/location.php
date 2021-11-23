<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--guide page--guide-location');
    $this->setVar('heroTitle', '주차 및 오시는 길');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-location.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section section-map">
        <div class="embed-responsive embed-responsive-21by9 bg-light">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.4684557266105!2d129.01537661554013!3d35.11998156815396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3568e988c9b9cf25%3A0x63b1b6593d1e6580!2z64-Z7JWE64yA7ZWZ6rWQ67OR7JuQ!5e0!3m2!1sko!2skr!4v1634698066797!5m2!1sko!2skr" width="100" height="100" style="border:0;" allowfullscreen="" loading="lazy" class="embed-responsive-item"></iframe>
        </div>
    </div>

    <section class="container section section-subway">
        <div class="section-header">
            <h3 class="section-title">1.지하철</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table-unstyled">
                <tbody>
                    <tr>
                        <td>
                            서대신동 또는 동대신동역에서 하차 후 병원셔틀버스(약 15분 소요) 또는 택시로 갈아타면 2~3분이면 갈 수 있다. <br>
                            <span class="text-danger">*</span> 동대신동역: 2번 출구 / 서대신동역: 4번 출구
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-circle-bus">
        <div class="section-header">
            <h3 class="section-title">2.셔틀버스</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table table--v1 table--responsive">
                <tbody>
                    <tr>
                        <th scope="row">순환 노선</th>
                        <td>
                            <ul class="list-bullet">
                                <li>동아대학교병원 → 동대신동역 → 서대신동역 → 부경고등학교 → 동아대학교병원 (약 15분 소요)</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">운행 시간</th>
                        <td>
                            <ul class="list-bullet">
                                <li>첫차: 07:00 / 막차: 22:10 <br>
                                    <span class="text-danger">*</span> 단, 토, 일, 공휴일은 운행하지 않습니다.</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">정류장</th>
                        <td>
                            <ul class="list-bullet">
                                <li>동대신동역 : 지하철 2번 출구</li>
                                <li>서대신동역 : 지하철 4번 출구</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-bus">
        <div class="section-header">
            <h3 class="section-title">3.시내버스</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table table--v1 table--responsive">
                <tbody>
                <tr>
                    <th scope="row">167, 190</th>
                    <td>
                        <ul class="list-bullet">
                            <li>병원 근처에서 정차</li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope="row">8, 15, 67, 161</th>
                    <td>
                        <ul class="list-bullet">
                            <li>병원까지 도보 약 5분</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-taxi">
        <div class="section-header">
            <h3 class="section-title">4.택시</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table table--v1 table--responsive">
                <tbody>
                    <tr>
                        <th scope="row">목적지</th>
                        <td>
                            <ul class="list-bullet">
                                <li>동아대학교병원 / 동아대학교 대신동캠퍼스</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">승강장</th>
                        <td>
                            <ul class="list-bullet">
                                <li>동대신역 : 지하철 1번출구</li>
                                <li>서대신역 : 지하철 4번출구</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-inter-city">
        <div class="section-header">
            <h3 class="section-title">5.타지역</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table table--v1 table--responsive table--responsive-column3">
                <thead>
                    <tr>
                        <th scope="col">출발지</th>
                        <th scope="col">노선</th>
                        <th scope="col">소요시간</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th scope="row">김해 공항에서</th>
                        <td>
                            <p class="list-bullet is-non-list">
                                경전철(사상역 방향) → 시내버스(8,15,161)로 환승 → 구덕종합운동장 하차
                            </p>
                        </td>
                        <td>약 60분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="rowgroup">사상 시외버스터미널에서</th>
                        <td>
                            <p class="list-bullet is-non-list">
                                시내버스(8,15,161) → 구덕종합운동장 정류장 하차
                            </p>
                        </td>
                        <td>약 40분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>

                <tbody>
                <tr>
                    <th scope="rowgroup" rowspan="2">부산역에서</th>
                    <td>
                        <p class="list-bullet is-non-list">
                            시내버스 167번 → "동아대학교병원" 정류장 또는 "경남고등학교" 정류장 하차
                        </p>
                    </td>
                    <td>약 20분 <br class="d-block d-sm-none">소요</td>
                </tr>
                <tr>
                    <td>
                        <p class="list-bullet is-non-list">
                            시내버스 67번 → "동아대학교 병원입구" 정류장 하차
                        </p>
                    </td>
                    <td>약 25분 <br class="d-block d-sm-none">소요</td>
                </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="row">
                            노포동 고속버스터미널에서
                        </th>
                        <td>
                            <p class="list-bullet is-non-list">지하철(신평역 방향) → 동대신동 또는 서대신동역 → 셔틀버스로 환승</p>
                        </td>
                        <td>약 80분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-free-parking">
        <div class="section-header">
            <h3 class="section-title">6.무료주차 확인</h3>
        </div>
        <div class="section-body section-text text-muted">
            <ul class="list-bullet">
                <li class="mb-3">외래진료, 입 · 퇴원당일, 예약진료, 검사, 응급실진료, 인공신장실은 당일 4시간 무료이며 진료카드 또는 영수증을 1층 안내센터로 제출하시어
                    확인 주차증에 무료도장 받으신 후 출차하시면 됩니다. (2014년 12월 1일 이후 적용)</li>
                <li class="mb-3">종합검진은 무료이며 검진센터에서 무료주차를 요청하시면 됩니다. (2014년 12월 1일 이후 적용)</li>
                <li class="mb-3">장례식장은 일반실 1실당 직계에 대하여 차량 1대 무료이며, 특실 1실당 직계에 대하여 차량 2대 무료입니다.<br>
                    오후 6시~ 익일 오전 5시까지는 1시간 무료 주차권을 선착순에 의해 50매 드립니다.</li>
                <li class="mb-3">중환자보호자, 공무수행, 업무방문은 당일 3시간 무료입니다.</li>
            </ul>
        </div>
    </section>

    <section class="container section section-parking-fee">
        <div class="section-header">
            <h3 class="section-title">7.주차요금</h3>
        </div>
        <div class="section-body section-text text-muted">
            <ul class="list-bullet">
                <li class="mb-3">최초 30분 1,000원, 초과 10분당 300원 가산</li>
                <li class="mb-3">장애인 등록차량 50% 감면</li>
                <li class="mb-3">심야 최대 5,000원 (18:00 ~ 익일 07:00)</li>
            </ul>
        </div>
    </section>

    <section class="container section section-parking-fee">
        <div class="section-header">
            <h3 class="section-title">8.협조사항</h3>
        </div>
        <div class="section-body section-text text-muted">
            <ul class="list-bullet">
                <li class="mb-3">본원을 출입하는 내원객차량은 환자의 정서유지를 위하여 원내 진입시 경적음을 자제하여 주시기 바랍니다. </li>
                <li class="mb-3">장기주차로 인한 부작용이 많으므로 입원환자 보호자의 경우 본원 내원시 대중교통을 이용하여 주시기 바랍니다.</li>
            </ul>
        </div>
    </section>
<?php echo $this->endSection(); ?>
