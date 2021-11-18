<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--guide page--guide-location');
    $this->setVar('heroTitle', 'Как доехать до больницы');
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
            <h3 class="section-title">지하철</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table-unstyled">
                <tbody>
                    <tr>
                        <th>
                            <span class="badge badge-orange">1호선</span>
                        </th>
                        <td>
                            서대신동역, 동대신역 하차<br>
                            <span class="text-danger">*</span> 순환버스(서구5, 15분 간격으로 운행)를 이용하시거나 택시를 이용하시면 2~3분 이내에 도착할 수 있습니다.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-bus">
        <div class="section-header">
            <h3 class="section-title">버스</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table-unstyled">
                <tbody>
                    <tr>
                        <th scope="row">
                            <span class="badge badge-success">일반</span>
                        </th>
                        <td>
                            8, 15, 67, 161, 167, 190
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <span class="badge badge-success">마을</span>
                        </th>
                        <td>
                            중구1<br>
                            <span class="text-danger">*</span> 동대신역 지하철 3번 출구(국민은행 앞)탑승 - 동아대병원 하차
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-circle-bus">
        <div class="section-header">
            <h3 class="section-title">순환버스</h3>
        </div>
        <div class="section-body section-text text-muted">
            <table class="table table--v1 table--responsive">
                <tbody>
                    <tr>
                        <th scope="row">순환 노선</th>
                        <td>
                            <ul class="list-bullet">
                                <li>동아대학교(병원) → 동대신역 → 서대신동 시장 → 서대신역 → 부경고등학교 → 병원</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">운행 시간</th>
                        <td>
                            <ul class="list-bullet">
                                <li>매일 15분 간격으로 운행, 동아대학교(병원) 출발</li>
                                <li>첫차 : 7시 / 막차 : 22시</li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">정류장</th>
                        <td>
                            <ul class="list-bullet">
                                <li>동대신역 지하철 2번 출구</li>
                                <li>서대신동 시장</li>
                                <li>서대신역 지하철 4번 출구</li>
                                <li>부경고등학교 정문 앞 버스정류소 옆</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="container section section-taxi">
        <div class="section-header">
            <h3 class="section-title">택시</h3>
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
            <h3 class="section-title">타지역</h3>
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
                        <th scope="row">김해공항 출발시</th>
                        <td>
                            <p class="list-bullet is-non-list">
                                경전철(사상역방면) → 하차(사상역) → 시내버스(8번,15번,161번)환승 → 하차
                                (구덕운동장)
                            </p>
                        </td>
                        <td>약 60분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="rowgroup" rowspan="2">부산역 출발시</th>
                        <td>
                            <p class="list-bullet is-non-list">
                                시내버스(167번) 탑승 → 하차(동아대학교병원 or 경남고등학교)
                            </p>
                        </td>
                        <td>약 20분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                    <tr>
                        <td>
                            <p class="list-bullet is-non-list">
                                시내버스(67번) 탑승 → 하차(동아대학교병원입구)
                            </p>
                        </td>
                        <td>약 25분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="row">
                            부산서부시외버스터미널 (사상) 출발시
                        </th>
                        <td>
                            <p class="list-bullet is-non-list">시내버스(8번,15번,161번)탑승 → 하차(구덕운동장)</p>
                        </td>
                        <td>약 40분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="row" rowspan="2">
                            부산종합시외버스터미널(노포) 출발시
                        </th>
                        <td>
                            <p class="list-bullet is-non-list">지하철(신평역 방면) → 하차(동대신역 or 서대신역) → 순환버스(서구5) 환승</p>
                        </td>
                        <td>약 80분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                    <tr>
                        <td>
                            <p class="list-bullet is-non-list">지하철(신평역 방면) → 하차(동대신역) → 마을버스(중구1) 환승</p>
                        </td>
                        <td>약 80분 <br class="d-block d-sm-none">소요</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
<?php echo $this->endSection(); ?>
