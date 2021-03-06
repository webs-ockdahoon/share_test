<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-info');
    $this->setVar('heroTitle', $dep_title_rus);
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-info.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="container section mt-0">

    <div class="section-divider">
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="/medical/departmentInfo/<?php echo $dep_idx; ?>" aria-selected="true">
                    Отделения
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="/medical/doctor/<?php echo $dep_idx; ?>" aria-selected="false">
                    врачебный
                </a>
            </li>
        </ul>
    </div>

    <!--
    <div class="section-divider-sm content-bg bg-light" style="background-image: url('https://via.placeholder.com/1200x320');max-height: 320px;"></div>
    -->

    <div class="section-box section-text">
        <p class="mb-3">
            <?php echo nl2br($dep_content_rus); ?>
        </p>
    </div>

    <div class="section-box text-right">
        <a href="/medical/department" class="btn btn-lg btn-wide btn-outline-light text-gray--dark border">Всего Отделения</a>
    </div>
    
</div>
<?php echo $this->endSection(); ?>
