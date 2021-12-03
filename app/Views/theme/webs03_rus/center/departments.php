<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout');


    $this->setVar('bodyClassName', 'page--center page--center-specialized-enter');
    $this->setVar('heroTitle', 'Специалищированные центры и врачебный состав');


    /* 참고용
    // 페이지 디자인 위해 데이터 임시 배열로 저장
    $specialized = [
        'Гепатологический центр', 'Центр заболеваний щитовидной железы', 'Диагностический центр', 'Центр радиохирургии Новалис', 'Центр роботизированной хирургии',
        'Гастроэнтерологический центр', 'Центр спортивной медицины', 'Кардиоцереброваскулярный центр областей Пусан-Ульсан', 'Онкологический центр', 'Маммологический центр',
        'Неотложная медицинская помощь', 'Центр трансплантации органов', 'Специализированные центры', 'Центр заболеванийпозвоночника', 'Центр болезни Паркинсона',
    ];
    */
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-specializedCenter.css">
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
                            <a href="/center/specializedInfo?idx=<?php echo $department['dep_idx']; ?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">состав</a>
                            <a href="/center/specializedDoctors?idx=<?php echo $department['dep_idx']; ?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">врачебный</a>
                        </div>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
