<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-doctors');
    $this->setVar('heroTitle', $department_info['dep_title_'.$lang]);
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-doctors.css">
<?php echo $this->endSection(); ?>

<?php
/*  참고용
    // dummy data
    $doctors = [
            [
                'name' => '강명구',
                'department' => '이비인후과',
                'specialized_field' => '이과, 진주종, 중이염, 난청, 안면마비',
                'image_src' => $THEME_URL.'/images/medical/doctor01.jpg',
            ],
            [
                'name' => '박헌수',
                'department' => '이비인후과',
                'specialized_field' => '갑상선암, 두경부암, 음성장애, 인후두 역류성질환, 안면외상, 경부림프절클리닉',
                'image_src' => $THEME_URL.'/images/medical/doctor02.jpg',
            ],
            [
                'name' => '배우용',
                'department' => '이비인후과',
                'specialized_field' => '축농증, 코성형술, 알레르기, 코골이, 수면무호흡, 후각장애, 비종양, 비강암, 미각장애',
                'image_src' => $THEME_URL.'/images/medical/doctor03.jpg',
            ],
            [
                'name' => '정성욱',
                'department' => '이비인후과',
                'specialized_field' => '인공와우이식, 이식형 보청기, 난청, 중이염, 진주종, 어지럼증, 두개저종양',
                'image_src' => $THEME_URL.'/images/medical/doctor04.jpg',
            ],
    ];
*/
?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">

        <div class="section-divider">
            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/kor/medical/departmentInfo/<?php echo $dep_idx; ?>" aria-selected="true">
                        진료과 소개
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="/kor/medical/doctor/<?php echo $dep_idx; ?>" aria-selected="false">
                        의료진 소개
                    </a>
                </li>
            </ul>
        </div>

        <div class="section-box section-text">
            <h3 class="sr-only">의료진 소개</h3>
            <ul class="list-unstyled row row-sm mb-n4">
                <?php foreach ($doctor_list as $doctor){ ?>
                    <li class="col-12 col-lg-6 mb-4">
                        <section class="card doctor-card">
                            <div class="card-thumbnail-body">
                                <div class="card-thumbnail">
                                    <!-- // image size: 96px x 128px (3:4) -->
                                    <span class="card-thumbnail__img bg-light rounded" style="background-image: url('/uploaded/file/<?php echo $doctor["doc_image"]?>');"></span>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $doctor['doc_name_'.$lang]; ?></h4>
                                    <dl class="data-table data-table--responsive-lg mb-0">
                                        <div class="data-table__row">
                                            <dt class="data-table__row-label text-primary">진료과</dt>
                                            <dd class="data-table__row-text"><?php echo $department_info['dep_title_'.$lang]?></dd>
                                        </div>
                                        <div class="data-table__row">
                                            <dt class="data-table__row-label text-primary">전문 진료분야</dt>
                                            <dd class="data-table__row-text">
                                                <div class="text-truncate--multiple"><?php echo $doctor['doc_content_'.$lang]; ?></div>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <a href="/kor/medical/doctorInfo/<?php echo $doctor['doc_idx']; ?>" class="card-action">의료진 정보</a>
                        </section>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="section-box text-right">
            <a href="/kor/medical/departments" class="btn btn-lg btn-wide btn-outline-gray text-gray--dark  border">전체 진료과</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>
