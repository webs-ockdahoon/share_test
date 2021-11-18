<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-imc');
$this->setVar('heroTitle', '국제진료센터 소개');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-imc.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="container section mt-0 section-text text-muted">
    <div class="section-divider">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="imc-greeting-tab" data-toggle="tab" href="#imc-greeting" role="tab" aria-controls="imc-greeting" aria-selected="true">
                    센터소개
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="imc-organization-tab" data-toggle="tab" href="#imc-organization" role="tab" aria-controls="imc-organization" aria-selected="false">
                    조직도
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="imc-process-tab" data-toggle="tab" href="#imc-process" role="tab" aria-controls="imc-process" aria-selected="false">
                    업무절차
                </a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane active" id="imc-greeting" role="tabpanel" aria-labelledby="imc-greeting-tab">
            <h3 class="sr-only">센터소개</h3>

            <div class="content-bg"></div>

            <section class="container section section-imc-greeting">
                <div class="section-header">
                    <h3 class="section-title">
                        2009년 개원한 동아대학교 국제진료센터는 <br class="d-none d-lg-block">
                        지난 3년간 7000여명의 외국인환자를 유치했습니다.
                    </h3>
                </div>
                <div class="section-body section-text text-muted">
                    <p>
                        다국어 코디네이터가 언어적 지원뿐만 아니라 행정적 업무 및 의료관광을 위한 서비스 등을 제공해 환자들에게 두터운 신뢰를 주고 있습니다. 또한, 외국인 환자의 문화적,
                        종교적, 언어적 특성을 고려해 진료 및 케어에 힘쓰며, 다양한 편의시설 및 외국인 전용 식단으로 보다 쾌적한 환경에서 최상의 진료를 받을 수 있도록 지원하고 있습니다.
                    </p>

                    <p>
                        동아대학교병원은 외래진료, 입원, 응급진료의 전 과정에 있어 보다 편안한 의료 서비스를 위해 필요한 최선의 지원을 하여 외국인 환자들이 차질 없이 양질의 의료를
                        받을 수 있도록 지원하고 있습니다.
                    </p>
                </div>
            </section>
        </div>

        <div class="tab-pane" id="imc-organization" role="tabpanel" aria-labelledby="imc-organization-tab">
            <h3 class="sr-only">조직도</h3>

            <section class="section section-imc-organization">
                <div class="section-body section-text text-muted">
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive table--responsive-column3">
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">성명</th>
                                <th scope="col">부가항목</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th scope="row">국제진료센터 소장</th>
                                <th>왕립 | 정형외과</th>
                                <td>전문분야 : 슬관절,관절경,스포츠외상</td>
                            </tr>
                            </tbody>

                            <tbody>
                            <tr>
                                <th scope="row">국제진료센터 팀장</th>
                                <th>강상곤</th>
                                <td>-</td>
                            </tr>
                            </tbody>

                            <tbody>
                            <tr>
                                <th rowspan="8" scope="row">직원</th>
                                <th rowspan="4">이민재(관리자)</th>
                                <td>구사언어 : 한국어,러시아어,영어</td>
                            </tr>
                            <tr>
                                <td>TEL : 2306</td>
                            </tr>
                            <tr>
                                <td>FAX : 2154</td>
                            </tr>
                            <tr>
                                <td>E-mail : eminjae@mail.ru</td>
                            </tr>

                            <tbody>
                            <tr>
                                <th rowspan="4" scope="row">직원</th>
                                <th rowspan="4">염시언</th>
                                <td>구사언어 : 한국어,러시아어,영어</td>
                            </tr>
                            <tr>
                                <td>TEL : 2306</td>
                            </tr>
                            <tr>
                                <td>FAX : 2154</td>
                            </tr>
                            <tr>
                                <td>E-mail : lolofnfn@naver.com</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <div class="tab-pane" id="imc-process" role="tabpanel" aria-labelledby="imc-process-tab">
            <h3 class="sr-only">업무절차</h3>

            <section class="section section-imc-process">
                    <div class="section-header">
                        <h3 class="section-title">
                            환자 사전 문의
                        </h3>
                    </div>

                    <div class="section-body section-text text-muted">

                        <div class="section-box">
                            <ol class="list-unstyled process--new">
                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--board"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 01</small> 고객문의
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">환자에 대한 기본진료사항 전달 </p>
                                        <p class="list-bullet is-non-list">진단서(소견서) 및 의료사본 전달 </p>
                                        <p class="list-bullet is-non-list">환자 특이사항 혹은 진료 요구사항 확인 </p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--stethoscope"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 02</small> 진료상담
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">상기 자료를 토대로 진료 가능 여부 확인 </p>
                                        <p class="list-bullet is-non-list">본원 진료시 필요사항 확인 </p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--dollar"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 03</small> 진료 견적서 제공
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">검진 혹은 진료시 체류기간, 비용 전달 </p>
                                        <p class="list-bullet is-non-list">세부 프로세스 환자 혹은 에이전시 제공 </p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--syringe"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 04</small> 초청장 발송
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">입국비자 발급 관련 초청장 공증후 발송</p>
                                        <p class="list-bullet is-non-list">입국일 결정, 부서 협조 통보<br class="d-none d-lg-block">- 병동, 영상의학과, 특검실, 영양팀, 총무팀 등</p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </section>

                <section class="container section">
                    <div class="section-header">
                        <h3 class="section-title">
                            원내 방문 프로세스
                        </h3>
                    </div>

                    <div class="section-body section-text text-muted">

                        <div class="section-box">
                            <h4 class="section-subtitle text-dark mb-3">1. 입원</h4>
                            <ol class="list-unstyled process--new">
                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--board"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 01</small> 환자 방문
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">환자 영접(공항 or 숙박시설)</p>
                                        <p class="list-bullet is-non-list">입국자 명판 준비 및 차량배차</p>
                                        <p class="list-bullet is-non-list">국내에서 방문시 환자와 에이전시 함께 방문 가능</p>
                                        <p class="list-bullet is-non-list">환자 신분확인 및 병원 등록번호 생성</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--stethoscope"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 02</small> 입원수속
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">문진표 및 입원결정서 작성</p>
                                        <p class="list-bullet is-non-list">1인실 입원 OR 환자 선택병실(환자 동의서)</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--dollar"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 03</small> 신체계측 및 환자<br class="d-none d-lg-block">기본검사
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">병동 및 각 검사 부서</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--syringe"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 04</small>환자 해당 처방<br class="d-none d-lg-block"> 특수 검사
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">특수검사실 협조하여 진행</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--home"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 05</small> 1박 및 회복
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">1박 및 회복</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--home"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 06</small> 검진 기록의 면담<br class="d-none d-lg-block"> 및 퇴원
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">검진 기록의 면담 및 퇴원</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--home"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 07</small> 퇴원준비
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">각종 소견서, 검진자료, CD준비</p>
                                        <p class="list-bullet is-non-list">환자 향후 진료 사항 설명</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--home"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 08</small> 퇴원수속
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">진료비용수납</p>
                                        <p class="list-bullet is-non-list">퇴원처방조제</p>
                                        <p class="list-bullet is-non-list">검사 결과 및 소견서 전달</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--home"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 09</small> 관광 및 쇼핑
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">환자 원할시 관광 및 쇼핑 연계(국내 여행 코레일 및 여행사 동반 기획)</p>
                                    </div>
                                </li>

                                <li class="process-step">
                                    <h5 class="process-step__header">
                                        <span class="icon icon-d icon-d--home"></span>
                                        <small class="font-weight-bold text-uppercase text-primary">step 10</small> 출국
                                    </h5>
                                    <div class="process-step__body">
                                        <p class="list-bullet is-non-list">출국 장소 차량 이송 및 출국 수속</p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                </section>

                <section class="container section">

                    <div class="section-body section-text text-muted">
                    <div class="section-box">
                        <h4 class="section-subtitle text-dark mb-3">2. 외래</h4>
                        <ol class="list-unstyled process--new">
                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--board"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 01</small> 환자 방문
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">환자 영접(공항 or 숙박시설)</p>
                                    <p class="list-bullet is-non-list">입국자 명판 준비 및 차량배차</p>
                                    <p class="list-bullet is-non-list">국내에서 방문시 환자와 에이전시 함께 방문 가능</p>
                                    <p class="list-bullet is-non-list">환자 신분확인 및 병원 등록번호 생성</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--stethoscope"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 02</small> 외래 접수
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">개인정보 동의서 및 선택진료신청서 작성</p>
                                    <p class="list-bullet is-non-list">진료과 선택 및 접수</p>
                                    <p class="list-bullet is-non-list">환자가 가지고 온 의료정보 본원 의료정보시스템 등록</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--dollar"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 03</small> 환자 처방검사 및 시술
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">외래, 각 검사 부서 및 시술부서</p>
                                    <p class="list-bullet is-non-list">특수 검사</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--syringe"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 04</small>외래과 준비
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">각종 소견서, 검사자료, CD준비</p>
                                    <p class="list-bullet is-non-list">환자 향후 진료 사항 설명</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--home"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 05</small> 최종 수납
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">진료비용수납</p>
                                    <p class="list-bullet is-non-list">외래처방조제</p>
                                    <p class="list-bullet is-non-list">검사 결과 및 소견서 전달</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--home"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 06</small> 퇴원준비
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">검진 기록의 면담 및 퇴원</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--home"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 07</small> 관광 및 쇼핑
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">환자 원할시 관광 및 쇼핑 연계(국내 여행 코레일 및 여행사 동반 기획)</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-d icon-d--home"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 08</small> 출국
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">출국 장소 차량 이송 및 출국 수속</p>
                                </div>
                            </li>
                        </ol>
                    </div>
            </section>

            <section class="container section section-main-building">
                <div class="section-header">
                    <h3 class="section-title">퇴원 후 관리</h3>
                </div>
                <div class="section-body section-text text-muted">
                    <table class="table table--v1 table--responsive">
                        <tbody>
                        <tr>
                            <th scope="row">건강검진 결과</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>환자 이메일 혹은 우편으로 건강검진 결과 전달</li>
                                    <li>환자 문의사항 혹은 의문사항의 상담</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">사후관리</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>환자와의 지속적인 연락 및 정보 교류</li>
                                    <li>향후 3개월간 진료 환자의 상태 파악</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">지속적인 의료정보 제공</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>동아대학교병원 국제의료의 변화에 관한 정보 제공</li>
                                    <li>종합검진 등의 자료 제공</li>
                                    <li>한국의 의료 관광 문화 컨텐츠 제공</li>
                                    <li>지속적인 환자 질의응답</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="container section section-main-building">
                <div class="section-header">
                    <h3 class="section-title">상시 준비사항</h3>
                </div>
                <div class="section-body section-text text-muted">
                    <table class="table table--v1 table--responsive">
                        <tbody>
                        <tr>
                            <th scope="row">홈페이지 다국어 제작</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>영문, 중문, 노문, 일문 제작</li>
                                    <li>환자의 직접적 의뢰 가능하도록 제작</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">사후관리</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>환자와의 지속적인 연락 및 정보 교류</li>
                                    <li>향후 3개월간 진료 환자의 상태 파악</li>
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
