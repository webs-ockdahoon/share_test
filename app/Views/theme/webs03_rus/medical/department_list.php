<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-departments');
    $this->setVar('heroTitle', 'Отделения и врачебный состав');
?>

<?php
    /*  참고용
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
    */
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-departments.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">

        <ul class="list-unstyled medical-list">
            <?php foreach($department_list as $department): ?>
                <li>
                    <section class="medical-card medical-card--focusable text-center" tabindex="0">
                        <div class="card-content">
                            <div class="card-icon" style="background-image: url(/uploaded/file/<?php echo $department['dep_image']; ?>);"></div>
                            <h3 class="card-title font-weight-normal"><?php echo $department['dep_title_'.$lang]; ?></h3>
                        </div>

                        <div class="card-content card-hover-content bg-secondary">
                            <span class="d-block card-title text-white text-truncate"><?php echo $department['dep_title_'.$lang]; ?> <span class="sr-only">Меню</span></span>
                            <a href="/medical/departmentInfo/<?php echo $department['dep_idx']?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">состав</a>
                            <a href="/medical/doctor/<?php echo $department['dep_idx']?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">врачебный</a>
                        </div>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
