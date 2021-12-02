<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-info');
    $this->setVar('heroTitle', $code_list['cde_title']);
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-info.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="container section mt-0">

    <div class="section-divider">
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="/kor/medical/departmentInfo?title=<?php echo $code_list['cde_title']; ?>" aria-selected="true">
                    진료과 소개
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="/kor/medical/departmentDoctors?title=<?php echo $code_list['cde_title']; ?>" aria-selected="false">
                    의료진 소개
                </a>
            </li>
        </ul>
    </div>
    <!--
    <div class="section-divider-sm content-bg bg-light" style="background-image: url('https://via.placeholder.com/1200x320');max-height: 320px;"></div>
    -->

    <div class="section-box section-text">
        <p class="mb-3">
            <?php echo nl2br($code_list['cde_content']); ?>
        </p>
    </div>

    <div class="section-box text-right">
        <a href="/kor/medical/departments" class="btn btn-lg btn-wide btn-outline-light text-gray--dark border">전체 진료과</a>
    </div>
    
</div>
<?php echo $this->endSection(); ?>
