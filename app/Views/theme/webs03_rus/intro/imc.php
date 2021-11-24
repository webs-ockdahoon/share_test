<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-imc');
$this->setVar('heroTitle', 'Международный медицинский центр');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-imc.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="container section mt-0 section-text text-muted">
    <div class="section-divider">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="imc-greeting-tab" data-toggle="tab" href="#imc-greeting" role="tab" aria-controls="imc-greeting" aria-selected="true">
                    센터소개
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="imc-organization-tab" data-toggle="tab" href="#imc-organization" role="tab" aria-controls="imc-organization" aria-selected="false">
                    조직도
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="imc-process-tab" data-toggle="tab" href="#imc-process" role="tab" aria-controls="imc-process" aria-selected="false">
                    업무절차
                </a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane active" id="imc-greeting" role="tabpanel" aria-labelledby="imc-greeting-tab">
            <h3 class="sr-only">센터소개</h3>

            <div class="content-bg"></div>

            <section class="container section section-imc-greeting">
                <div class="section-header">
                    <h3 class="section-title">
                        Международный медицинский центр больницы при университете Донг-А открылся в 2009 году и за последние три года привлек более 7000 иностранных пациентов.
                    </h3>
                </div>
                <div class="section-body section-text text-muted">
                    <p>
                        Многоязычный координатор со специализированным обучением оказывает языковую помощь и сопровождение нашим пациентам.
                        Предоставляет административные услуги и услуги для медицинского туризма, чтобы дает пациентам большое доверие. Кроме того,
                        мы уделяем особое внимание по уходу пациентам и учитываем культурные, религиозные и языковые особенности каждого иностранного пациента.
                        У нас есть приемная для иностранцев, многоязычное ТВ в больничных палатах и меню для иностранцев, учитывая вкус пациента.
                    </p>

                    <p>
                        Больница при университете Донг-А обеспечивает наилучшую поддержку, необходимую для более комфортного получения медицинских услуг на протяжении
                        всего периода амбулаторного лечения, госпитализации и неотложной помощи, чтобы иностранные пациенты могли беспрепятственно получать качественную
                        медицинскую помощь.
                    </p>
                </div>
            </section>
        </div>

        <div class="tab-pane" id="imc-organization" role="tabpanel" aria-labelledby="imc-organization-tab">
            <h3 class="sr-only">조직도</h3>

            <section class="section section-imc-organization">
                <div class="section-body section-text text-muted">
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive table--responsive-column3">
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">성명</th>
                                <th scope="col">부가항목</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th scope="row">Директор международного центра</th>
                                <th>Ванг Лип | Ортопедия</th>
                                <td>Специалист в области : коленные суставы эндоскопия суставов спортивные травмы</td>
                            </tr>
                            </tbody>

                            <tbody>
                            <tr>
                                <th scope="row">Руководитель международного центра</th>
                                <th>Ганг Санг Гон</th>
                                <td>-</td>
                            </tr>
                            </tbody>

                            <tbody>
                            <tr>
                                <th rowspan="8" scope="row">Состав центра</th>
                                <th rowspan="4">Ли Миндже (менеджер)</th>
                                <td>Язык : корейский, русский, английский</td>
                            </tr>
                            <tr>
                                <td>Номер телефона : 2306</td>
                            </tr>
                            <tr>
                                <td>Номер факса : 2154</td>
                            </tr>
                            <tr>
                                <td>E-mail : eminjae@mail.ru</td>
                            </tr>

                            <tbody>
                            <tr>
                                <th rowspan="4" scope="row">Состав центра</th>
                                <th rowspan="4">Ём Сион</th>
                                <td>Язык : корейский, русский, английский</td>
                            </tr>
                            <tr>
                                <td>Номер телефона : 2306</td>
                            </tr>
                            <tr>
                                <td>Номер факса : 2154</td>
                            </tr>
                            <tr>
                                <td>E-mail : lolofnfn@naver.com</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <div class="tab-pane" id="imc-process" role="tabpanel" aria-labelledby="imc-process-tab">
            <h3 class="sr-only">업무절차</h3>

            <section class="section section-imc-process">
                <div class="section-header">
                    <h3 class="section-title">
                        Предварительные мед. запросы пациентов
                    </h3>
                </div>

                <div class="section-body section-text text-muted">

                    <div class="section-box">
                        <ol class="list-unstyled process--new">
                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--board"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 01</small> Мед. запрос клиента
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Основные медицинские пункты о пациенте</p>
                                    <p class="list-bullet is-non-list">Мед. справка (копия эпикриза)</p>
                                    <p class="list-bullet is-non-list">Проверка индивидуальных особенностей пациента и медицинских требований</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--counseling"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 02</small> Медицинская консультация
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">На основе вышеуказанного материала подтверждение о возможности лечения</p>
                                    <p class="list-bullet is-non-list">Проверка необходимых требований во время лечения в больнице</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--estimate"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 03</small> Предоставление сметы расходов медицинских услуг
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Сроки пребывания при прохождении общей диагностики или лечения</p>
                                    <p class="list-bullet is-non-list">Предоставление пациенту или агенству подробной информации о процессе лечения (диагностики)</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--letter"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 04</small> Отправка приглашения
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Подготовка подтверждения о предварительной записи на прием для получения въездной визы</p>
                                    <p class="list-bullet is-non-list">Решение о дате прибытия, уведомление сотрудничающих отделов:
                                        <br class="d-none d-lg-block">- палатное отделение, отделение радиологической диагностики, отделение специализированной диагностики,
                                        маркетинговый отдел и др. </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="container section">
                <div class="section-header">
                    <h3 class="section-title">
                        Внутренние процессы во время посещения пациента
                    </h3>
                </div>

                <div class="section-body section-text text-muted">

                    <div class="section-box">
                        <h4 class="section-subtitle text-dark mb-3">1. Стационар</h4>
                        <ol class="list-unstyled process--new">
                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--visit"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 01</small> Посещение пациента
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Встреча пациента (аэропорт  или гостиница)</p>
                                    <p class="list-bullet is-non-list">Подготовка таблички с именем гостя и предоставление автомобиля</p>
                                    <p class="list-bullet is-non-list">Во время визита в страну возможность нахождения с агентом</p>
                                    <p class="list-bullet is-non-list">Проверка удостоверения личности пациента и предоставление регистрационного номера в больнице</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--procedure"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 02</small> Процедуры при госпитализации
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Заполнение анкеты и направления на госпитализацию</p>
                                    <p class="list-bullet is-non-list">Госпитализация пациента в  выбранную им палату (соглашение пациента)</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--inspection"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 03</small> Антропометрические измерения и базовые обследования
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">В палатном отделении и отделениях диагностики</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--special-inspection"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 04</small>Специальные обследования
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Проводятся в отделениях специализированной диагностики</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--ready-leave"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 05</small> Подготовка к выписке
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Подготовка мед.выписки, материалов общего обследования, дисков со снимками</p>
                                    <p class="list-bullet is-non-list">Последующее разъяснение пациенту о деталях лечения</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--records"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 06</small> Разъяснение результатов диагностики и выписка
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Разъяснение результатов диагностики и выписка</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--discharge"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 07</small> Процедуры при выписке
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Оплата медицинских расходов</p>
                                    <p class="list-bullet is-non-list">Подготовка рецепта</p>
                                    <p class="list-bullet is-non-list">Передача результатов обследования и медицинской выписки</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--shopping"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 08</small> Туризм и шоппинг
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">По желанию пациента туризм и шоппинг</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--departure"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 09</small> Возвращение домой
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Автомобиль до места отбытия и процедуры для оформления выезда</p>
                                </div>
                            </li>
                        </ol>
                    </div>
            </section>

            <section class="container section">

                <div class="section-body section-text text-muted">
                    <div class="section-box">
                        <h4 class="section-subtitle text-dark mb-3">2. Амбулатория</h4>
                        <ol class="list-unstyled process--new">
                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-visit"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 01</small> Запись на амбулаторный прием
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Заполнение соглашения о личной информации и заявки на выборочное лечение</p>
                                    <p class="list-bullet is-non-list">Выбор медицинского отделения и запись на прием</p>
                                    <p class="list-bullet is-non-list">Регистрация медицинской информации, которую пациент принес с собой из другой больницы</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-procedure"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 02</small> Амбулаторный прием
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Предварительный опрос и обследование</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-inspection"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 03</small> Процедуры и обследования, назначенные после приема
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Отделение диагностики и процедурные отделения</p>
                                    <p class="list-bullet is-non-list">Специальное обследование</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-ready"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 04</small>Подготовка амбулаторного отделения
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Подготовка мед.выписки, материалов общего обследования, дисков со снимками</p>
                                    <p class="list-bullet is-non-list">Последующее разъяснение пациенту о деталях лечения</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-storage"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 05</small> Оплата
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Оплата медицинских расходов</p>
                                    <p class="list-bullet is-non-list">Подготовка рецепта</p>
                                    <p class="list-bullet is-non-list">Передача результатов обследования и медицинской выписки</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-shopping"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 06</small> Туризм и шоппинг
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">По желанию пациента туризм и шоппинг</p>
                                </div>
                            </li>

                            <li class="process-step">
                                <h5 class="process-step__header">
                                    <span class="icon icon-i icon-i--out-departure"></span>
                                    <small class="font-weight-bold text-uppercase text-primary">step 07</small> Возвращение домой
                                </h5>
                                <div class="process-step__body">
                                    <p class="list-bullet is-non-list">Автомобиль до места отбытия и процедуры для оформления выезда</p>
                                </div>
                            </li>
                        </ol>
                    </div>
            </section>

            <section class="container section section-main-building">
                <div class="section-header">
                    <h3 class="section-title">Контроль после выписки</h3>
                </div>
                <div class="section-body section-text text-muted">
                    <table class="table table--v1 table--responsive">
                        <tbody>
                        <tr>
                            <th scope="row">Результаты общего обследования</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>Передача результатов общего обследования на эл.почту пациента или экспресс-почтой</li>
                                    <li>Консультирование пациента при возникновении вопросов</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Наблюдение пациента</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>Регулярная связь с пациентом и обмен информацией</li>
                                    <li>Контроль состояния пациента в течении 3мес. после лечения</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Регулярное предоставление медицинской информации</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>Предоставление информации, связанной с изменениями в международном отделе</li>
                                    <li>Предоставление материалов общей диагностики</li>
                                    <li>Предоставление информации о содержании корейской туристической медицинской культуры</li>
                                    <li>Регулярные ответы на вопросы пациентов </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="container section section-main-building">
                <div class="section-header">
                    <h3 class="section-title">Повседневные пункты</h3>
                </div>
                <div class="section-body section-text text-muted">
                    <table class="table table--v1 table--responsive">
                        <tbody>
                        <tr>
                            <th scope="row">Создание домашней страницы на разных языках</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>Создание дом. страницы на английском, китайском, русском, японском языках</li>
                                    <li>Создание возможности самостоятельного пользования пациента</li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Последующий контроль пациента</th>
                            <td>
                                <ul class="list-bullet">
                                    <li>Регулярная поддержка связи с пациентом и обмен информацией</li>
                                    <li>Контроль за состоянием пациента в течении 3мес. после лечения</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>

    <?php echo $this->endSection(); ?>
