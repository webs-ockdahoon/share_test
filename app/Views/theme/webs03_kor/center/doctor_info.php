<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--center page--center-center-doctor');
    $this->setVar('heroTitle', $department_info['dep_title_'.$lang]);
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
                            <div class="doctor-name__thumbnail-img bg-light rounded" style="background-image: url('/uploaded/file/<?php echo $doc_image?>');"></div>
                        </div>

                        <div class="doctor-name__content">
                            <h3 class="section-title mb-0">
                                <small class="d-block mb-3 font-weight-bold"><?php echo $department_info['dep_title_'.$lang]?></small>
                                <strong class="d-block h2 mb-0 font-weight-bold title-lined title-lined--top text-dark"><?php echo ${"doc_name_".$lang}; ?></strong>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <h4 class="section-subtitle text-primary">전문 진료분야</h4>
                    <ul class="list-bullet list-bullet--reset">
                        <li><?php echo ${"doc_content_".$lang}?></li>
                    </ul>
                </div>
            </div>
        </section>

        <?php
        if(${"doc_info_".$lang} && is_array(${"doc_info_".$lang})){
            foreach(${"doc_info_".$lang} as $group){

                ?>
                <section class="section-box  border-top border-dark">
                    <div class="section-card section-card-sm border-bottom">
                        <h4 class="section-title mb-0 text-dark"><?php echo $group['title']?></h4>
                    </div>

                    <div class="section-card">
                        <div class="row mb-n4">
                            <?php if(is_array($group['item']) && sizeof($group['item'])>0){
                                foreach($group['item'] as $item){
                                    $content = explode("\r\n",$item['content']);
                                    ?>
                                    <div class="col-12 col-md-6 mb-4">
                                        <h5 class="mb-3 section-subtitle text-dark"><?php echo $item['title']?></h5>
                                        <ul class="list-bullet list-bullet--reset">
                                            <?php if(is_array($content) && sizeof($content)>0){
                                                foreach($content as $cont){
                                                    echo "<li>".$cont."</li>\r\n";
                                                }
                                            }?>
                                        </ul>
                                    </div>
                                <?php } // end foreach
                            }   // end if
                            ?>

                        </div>
                    </div>

                </section>
                <?php
            }
        }?>

        <div class="section-box text-right">
            <a href="/kor/center/doctor/<?php echo $department_info["dep_idx"]?>" class="btn btn-lg btn-wide btn-outline-gray text-gray--dark border">진료과 의료진</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>
