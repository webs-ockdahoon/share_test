<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-history');
$this->setVar('heroTitle', '병원 연혁');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-history.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<?php
//print_r($history_list);
//echo "<br><br>".count($history_list);
//exit;
?>

    <article class="container section">

        <div class="container section mt-0 section-text text-muted">
            <div class="section-divider">
                <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                    <?php
                    foreach($group as $grp_key=>$grp){
                        $start = $grp;
                        $active = $selected = "";
                        if($grp_key==0){
                            $end = "현재";
                            $active = "active";
                            $selected = "selected";
                        }else{
                            $end = $group[$grp_key-1]-1;
                        }

                        ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo $active; ?>" id="history0<?php echo $grp; ?>-tab" data-toggle="tab" href="#history0<?php echo $grp; ?>" role="tab" aria-controls="history0<?php echo $grp; ?>" aria-selected="<?php echo $selected; ?>">
                                <?php echo $end?>~<?php echo $start?>
                            </a>
                        </li>
                        <?php
                    } ?>
            </div>

            <div class="tab-content">
                <?php
                foreach($group as $grp_key=>$grp){
                    $active = $selected = "";
                    if($grp_key==0){
                        $active = "active"; // 현재 탭
                    }else{
                        $active = "";
                    }
                    ?>
                    <div class="tab-pane <?php echo $active; ?>" id="history0<?php echo $grp; ?>" role="tabpanel" aria-labelledby="history0<?php echo $grp; ?>-tab">
                        <h3 class="sr-only">history0<?php echo $grp; ?></h3>
                        <div class="section-body section-text text-muted">
                            <?php foreach($history[$grp] as $his){

                                ?>
                                <div class="history-wrap">
                                    <div class="history-year"><?php echo $his['year']?></div>
                                    <div class="history-flex-box">
                                        <?php foreach($his['history'] as $his_detail){ ?>

                                            <div class="history-box">
                                                <p class="history-date">
                                                    <?php echo $his_detail['start'].".";
                                                    if($his_detail['end'])echo " ~ " . $his_detail['end'].".";
                                                    ?>
                                                </p>
                                                <div class="history-text">
                                                    <ul class="list-bullet">
                                                        <li class="mb-3"><?php echo nl2br($his_detail['content_'.$lang])?></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        <?php }?>
                                    </div>

                                </div>
                                <?php
                            }?>
                        </div>
                    </div>
                    <?php
                }   // end foreach
                ?>
            </div>

            <?php /*
            <div class="tab-content">
                <div class="tab-pane active" id="history01" role="tabpanel" aria-labelledby="history01-tab">
                    <h3 class="sr-only">현재~2000</h3>
                    <div class="section-body section-text text-muted">

                            <div class="history-wrap">
                                <div class="history-year">2021</div>

                                <div class="history-flex-box">
                                    <div class="history-box">
                                        <p class="history-date">07. 15.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">과학기술정보통신부, "인공지능 학습용 데이터 구축사업" 주관 수행기관 선정</li>
                                            </ul>
                                       </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">06.17.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">부산광역시 체육회와 업무협약 (MOU) 체결</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">04.13.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">보건복지부, 2021년도 응급실 기반 자살시도자 사후간리사업 수행기관 선정</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">04.01.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">서울대학교병원과 의료용 중입자가속기 활용 상호 업무 협약</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">02.16.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">보건복지부, 첨단재생의료실시기관 부산권역(영남권) 유일 지정</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">01.11.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">코로나 19 중증환자 전담치료실 개설코로나 19 중증환자 전담치료실 개설</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="history-wrap">
                                <div class="history-year">2020</div>

                                <div class="history-flex-box">
                                    <div class="history-box">
                                        <p class="history-date">12.29.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">보건복지부, 4주기 상급종합병원 지정</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">12. 18.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">동아대학교병원, 보건복지부 재활환자 재택의료 시범사업 선정</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">12. 16.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">뇌혈관센터, WSO(세계뇌졸중학회) Angels award 다이아몬드상 수상</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">12. 14.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">부산권역심뇌혈관질환센터, 보건복지부 주관 "급성기 환자 퇴원지원 및 지역사회 연계활동 시범사업" 선정</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">11. 19.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">부산지역장애인보건의료센터 개소</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="history-box">
                                        <p class="history-date">11. 17.</p>
                                        <div class="history-text">
                                            <ul class="list-bullet">
                                                <li class="mb-3">POCare(Point of Care)공동협력 조인식 개최
                                                    – 오제네시스, ㈜큐어세라퓨틱스</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="tab-pane" id="history02" role="tabpanel" aria-labelledby="history02-tab">
                    <h3 class="sr-only">1999~1990</h3>
                    <div class="section-body section-text text-muted">

                        <div class="history-wrap">
                            <div class="history-year">1999</div>

                            <div class="history-flex-box">
                                <div class="history-box">
                                    <p class="history-date">04. 13.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">동아의료원 팀제 개편</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">03. 05.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">한대우박사 제3대 의료원장 취임</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="history-wrap">
                            <div class="history-year">1998</div>

                            <div class="history-flex-box">
                                <div class="history-box">
                                    <p class="history-date">11. 01.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">암센터(무균병동) 개설</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="history-wrap">
                            <div class="history-year">1997</div>

                            <div class="history-flex-box">
                                <div class="history-box">
                                    <p class="history-date">09. 10.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">윤진한 교수 제7대 병원장 취임</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">06. 05.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">흉부외과 심장수술 1,000례 기념 심포지움 개최</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">04. 07.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">건강관리실을 건강증진센터로 전환</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">03. 25.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">중국 상해의과대학 안․이비인후과의원과 자매결연</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="history03" role="tabpanel" aria-labelledby="history03-tab">
                <h3 class="sr-only">1989~1985</h3>
                    <div class="section-body section-text text-muted">

                        <div class="history-wrap">
                            <div class="history-year">1989</div>

                            <div class="history-flex-box">
                                <div class="history-box">
                                    <p class="history-date">12. 15.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">이정윤 교수 제3대 병원장 취임</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">02. 01.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">이원기 교수 제2대 병원장 취임</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="history-wrap">
                            <div class="history-year">1988</div>

                            <div class="history-flex-box">
                                <div class="history-box">
                                    <p class="history-date">12. 01.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">이원기 교수 제1대 병원장 취임</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">11. 23.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">국방부로부터 군 수련기관 지정승인</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">11. 18.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">대한병원협회로부터 89년도 수련병원 지정승인</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">01. 14.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">병원건립추진본부 발족</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="history-wrap">
                            <div class="history-year">1987</div>

                            <div class="history-flex-box">
                                <div class="history-box">
                                    <p class="history-date">12. 31.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">한성수 교수 초대 의무부총장 취임</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">02. 05.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">병원건축기공</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="history-box">
                                    <p class="history-date">01. 23.</p>
                                    <div class="history-text">
                                        <ul class="list-bullet">
                                            <li class="mb-3">부산시로부터 병원 건축허가(750병상)</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            */ ?>
        </div>
    </article>
<?php echo $this->endSection(); ?>