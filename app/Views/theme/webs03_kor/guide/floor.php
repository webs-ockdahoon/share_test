<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--guide-floor');
$this->setVar('heroTitle', '층별 안내');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-floor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="container section mt-0 section-text text-muted">
    <div class="section-divider">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="main-building-tab" data-toggle="tab" href="#main-building" role="tab" aria-controls="main-building" aria-selected="true">
                    본관
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="west-building-tab" data-toggle="tab" href="#west-building" role="tab" aria-controls="west-building" aria-selected="false">
                    서관(구,센터동)
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="east-building-tab" data-toggle="tab" href="#east-building" role="tab" aria-controls="east-building" aria-selected="false">
                    동관(구,신관)
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="center-building-tab" data-toggle="tab" href="#center-building" role="tab" aria-controls="center-building" aria-selected="false">
                    중앙관
                </a>
            </li>
        </ul>
    </div>

        <div class="tab-content">
            <div class="tab-pane active" id="main-building" role="tabpanel" aria-labelledby="main-building-tab">
                <h3 class="sr-only">본관</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-main-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">본관</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">12층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>특실병동</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">10 ~ 11층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>병동 / 102병동 <span class="text-danger">(간호·간병통합서비스 병동)</span></li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>병동 / 중환자실</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7 ~ 8층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>병동</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>병동</li>
                                        <li>분만실 / 신생아실 / 난임클리닉 / 인공신장실 / 조혈모세포이식실 </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>병동</li>
                                        <li>진단검사의학과 대강당 / 국제회의실</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>수술실 / 회복실 / 신경계중환자실 / 병리과 / 인체유래물은행</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>위장·대장센터(소화기내과, 외과) / 내시경센터 / 비뇨의학과 / 초음파실 / 외래수납/간·담·췌센터(구. 간센터) /
                                            간·담·췌 및 이식혈관외과 / 장기이식센터/호흡기센터(감염내과, 호흡기내과, 기관지내시경실, 폐기능검사실) /
                                            호흡기상담실 / 로봇수술센터/ 중앙주사실 / 유방센터 / 암센터(혈액종양내과) / 가정의학과 / 신경과 / 인지장애·치매센터
                                            검사실 및 교육실/ 이비인후과 / 피부과 / 미용클리닉 / 피부·두피·다한증 관리센터 / 청력검사실 / 비강통기도검사실 /
                                            전정기능검사실</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>영상의학과(인터벤션센터) / 골밀도 검사실 / 채혈실 / 외래약국 / 연명의료상담실/ 산부인과 / 알레르기내과 /
                                            어린이센터(소아청소년과) / 수유실 / 소아심장검사실 / 알레르기검사실 / 심폐체외순환실/ 외래수납 / 외래원무과 /
                                            입원원무과 / 입·퇴원수속실 / 진료협력센터/  고객지원센터 / 비즈니스센터 / <span class="text-danger">무인민원발급기</span> / IBK기업은행 /
                                            현금지급기(기업은행, 부산은행) / 커피지연(세가프레도) / CU편의점</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>방사선종양학과 / 심뇌재활센터 재활치료실 / 본관 지하주차장 / 장례식장</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>영양과 / 의공과 / 기계실 / 마공실 / 전기실 </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="west-building" role="tabpanel" aria-labelledby="west-building-tab">
                <h3 class="sr-only">서관(구,센터동)</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-west-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">서관(구,센터동)</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">10층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>부산광역시 광역치매센터 / 옥상정원</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">8 ~ 9층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>85 - 95병동 <span class="text-danger">(간호·간병통합서비스 병동)</span></li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5 ~ 7층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>55 - 75병동</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>뇌졸중집중치료실 / 심혈관계중환자실 / 심뇌혈관집중치료실 / 심혈관조영실 / 예방관리센터</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>심혈관센터-순환기내과, 흉부(심뇌혈관)외과 / 심장초음파검사실, 심전도 및 혈관검사실,뇌혈관센터-뇌졸중센터,
                                            뇌혈관센터-뇌졸중센터,흉부(폐식도)외과 / 심뇌재활센터-재활의학과/ 심전도 및 혈관검사실 / 경동맥초음파실 / 뇌혈류초음파실 / 외래수납</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>권역응급의료센터 / 응급촬영실 / 응급원무과</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>핵의학과 / PET 센터 / 세미나실 / 교육실</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>서관(구,센터동) 지하주차장</li>
                                    </ul>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="east-building" role="tabpanel" aria-labelledby="east-building-tab">
                <h3 class="sr-only">동관(구,신관)</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-east-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">동관(구,신관)</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">8 ~ 11층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>교수연구실</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>기획조정실장실 / 기획예산과 / 홍보마케팅과 / 감사과 / <span class="text-danger">총무과 / 인사과 / 경리과</span> / 간호부장실 / 간호부</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>60병동</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>임상시험센터</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>치과·구강악안면외과 / 파킨슨병센터</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>내분비내과 / 신장내과 / 안과 / 성형외과 / 당뇨병센터 / 외래수납</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>관절류마티스내과 / 안과(주사실, 레이저실) / 신경외과 / 정형외과 / 정신건강의학과 / 척추센터 / 통증클리닉 / 외래수납</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>시설관리과(기계실, 방재센터, 전기실, E/V기계실)</li>
                                    </ul>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="center-building" role="tabpanel" aria-labelledby="center-building-tab">
                <h3 class="sr-only">중앙관</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-center-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">중앙관</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">중앙관</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>종합건강증진센터 / 국제진료센터 / 부산지역장애인보건의료센터 / 중앙관 주차장</li>
                                        <li>일반검진센터/ 식당 및 편의시설</li>
                                    </ul>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>

<?php echo $this->endSection(); ?>
