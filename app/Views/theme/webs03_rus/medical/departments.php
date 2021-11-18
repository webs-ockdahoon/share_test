<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-departments');
    $this->setVar('heroTitle', 'Отделения и врачебный состав');
?>

<?php
    // 페이지 디자인 위해 데이터 임시 배열로 저장
    $departments = [
        'Отделение семейной медицины', 'Инфекционное отделение', 'Эндокринология', 'Ревматология', 'Анестезиология',
        'Радиационная онкология', 'Патологическое отделение', 'Урология', 'Гинекология', 'Пластическая хирургия',
        'Педиатрия', 'Гастроэнтерология', 'Кардиология', 'Неврология', 'Нейрохирургия',
        'Нефрология', 'Офтальмология', 'Аллергология', 'Отделение радиационной диагностики', 'Хирургия',
        'Отделение неотложной помощи', 'Отоларионгология', 'Реабилитология', 'Психиатрическое отделение', 'Ортопедия',
        'Отделение профессиональных заболеваний', 'Диагностическое отделение', 'Стоматология', 'Дерматология', 'Отделение ядерной медицины',
        'Гематоонкология', 'Пульмонология', 'Торакальная хирургия',
    ]
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-departments.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">
<!--        <div class="section-divider">-->
<!--            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">-->
<!--                <li class="nav-item" role="presentation">-->
<!--                    <a class="nav-link active" href="/medical/departments" aria-selected="true">-->
<!--                        진료과-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="nav-item" role="presentation">-->
<!--                    <a class="nav-link" href="/medical/departments" aria-selected="false">-->
<!--                        전문센터-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->

        <ul class="list-unstyled medical-list">
            <?php foreach($departments as $department_index => $department): ?>
                <li>
                    <section class="medical-card medical-card--focusable text-center" tabindex="0">
                        <div class="card-content">
                            <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/medical/department-icon<?php echo str_pad($department_index+1, 3, '0', STR_PAD_LEFT); ?>.png);"></div>
                            <h3 class="card-title font-weight-normal"><?php echo $department; ?></h3>
                        </div>

                        <div class="card-content card-hover-content bg-secondary">
                            <span class="d-block card-title text-white text-truncate"><?php echo $department; ?> <span class="sr-only">Меню</span></span>
                            <a href="/medical/departmentInfo" class="btn btn-block btn-outline-gray card-btn" tabindex="0">состав</a>
                            <a href="/medical/departmentDoctors" class="btn btn-block btn-outline-gray card-btn" tabindex="0">врачебный</a>
                        </div>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
