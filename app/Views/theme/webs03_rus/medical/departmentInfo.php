<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-info');
    $this->setVar('heroTitle', 'Отоларионгология');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-info.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="container section mt-0">

    <div class="section-divider">
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="/medical/departmentInfo" aria-selected="true">
                    Отделения
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="/medical/departmentDoctors" aria-selected="false">
                    врачебный
                </a>
            </li>
        </ul>
    </div>

    <div class="section-divider-sm content-bg bg-light" style="background-image: url('https://via.placeholder.com/1200x320');max-height: 320px;"></div>

    <div class="section-box section-text">
        <p class="mb-3">
            Отделение осуществляет операции сосцевидного отростка при холеастоме и тимпанопластику, эндоскопию пазух носа, пластику носа и носовой перегородки,  операции при опухоли головы и шеи, челюстно-лицевых травмах. Также в отделении проводят обследования вестибулярной функции, слуховых отклонений с применением эндоскопии, аллергические обследования и другие.
        </p>

        <p class="mb-3">
            Для пациентов со сниженным слухом осуществляется специализированное детальное обследование и тестирование слуховых аппаратов, выполняются операции по пересадке кохлеарного имплантанта для пациентов с анакузией, с целью  восстановления слуха проводят языковые исследования и лечение.
        </p>
    </div>

    <div class="section-box text-right">
        <a href="/medical/departments" class="btn btn-lg btn-wide btn-outline-light text-gray--dark border">Всего Отделения</a>
    </div>
    
</div>
<?php echo $this->endSection(); ?>
