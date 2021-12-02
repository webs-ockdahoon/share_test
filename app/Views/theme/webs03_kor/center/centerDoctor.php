<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--center page--center-center-doctor');
    $this->setVar('heroTitle', '의료진 소개');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-center-doctor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section section-text text-muted">
        <section class="section-box section-card border-top is-2 border-dark doctor-brief">
            <div class="row mb-n4">
                <div class="col-12 col-md-6 mb-4">
                    <div class="doctor-name">
                        <div class="doctor-name__thumbnail">
                            <!-- // image size: 96px x 128px (3:4) -->
                            <div class="doctor-name__thumbnail-img bg-light rounded" style="background-image: url('/uploaded/file/<?php echo $people_list["mes_image"]?>');"></div>
                        </div>

                        <div class="doctor-name__content">
                            <h3 class="section-title mb-0">
                                <small class="d-block mb-3 font-weight-bold"><?php echo $people_list["mes_medical_type"]?></small>
                                <strong class="d-block h2 mb-0 font-weight-bold title-lined title-lined--top text-dark"><?php echo $people_list["mes_name"]; ?></strong>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <h4 class="section-subtitle text-primary">전문 진료분야</h4>
                    <ul class="list-bullet list-bullet--reset">
                        <li><?php echo $people_list["mes_content"]?></li>
                    </ul>
                </div>
            </div>
        </section>

        <?php for($i=1; $i<4; $i++){
            if(!empty($people_list['mes_subject_'.$i])){
                ?>
                <section class="section-box  border-top border-dark">
                    <?php if(!empty($people_list['mes_subject_'.$i])){?>
                        <div class="section-card section-card-sm border-bottom">
                            <h4 class="section-title mb-0 text-dark"><?php echo $people_list['mes_subject_'.$i]; ?></h4>
                        </div>
                    <?php } ?>

                    <div class="section-card">
                        <div class="row mb-n4">
                            <?php
                            for($j=1; $j<3; $j++){
                                if(!empty($people_list['mes_subject_type_'.$i.'_'.$j])){?>
                                    <div class="col-12 col-md-6 mb-4">
                                        <h5 class="mb-3 section-subtitle text-dark"><?php echo $people_list['mes_subject_type_'.$i.'_'.$j]; ?></h5>
                                        <ul class="list-bullet list-bullet--reset">
                                            <?php echo nl2br($people_list['mes_subject_content_'.$i.'_'.$j]); ?>
                                        </ul>
                                    </div>
                                <?php }
                            }?>
                        </div>
                    </div>
                </section>
                <?php
            }
        } ?>

        <div class="section-box text-right">
            <a href="/kor/center/specializedDoctors" class="btn btn-lg btn-wide btn-outline-gray text-gray--dark border">진료과 의료진</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>
