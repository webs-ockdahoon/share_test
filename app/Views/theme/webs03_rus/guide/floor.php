<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--guide-floor');
$this->setVar('heroTitle', 'Расположение');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-floor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="container section mt-0 section-text text-muted">
    <div class="section-divider">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="main-building-tab" data-toggle="tab" href="#main-building" role="tab" aria-controls="main-building" aria-selected="true">
                    본관
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="west-building-tab" data-toggle="tab" href="#west-building" role="tab" aria-controls="west-building" aria-selected="false">
                    서관(구,센터동)
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="east-building-tab" data-toggle="tab" href="#east-building" role="tab" aria-controls="east-building" aria-selected="false">
                    동관(구,신관)
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="center-building-tab" data-toggle="tab" href="#center-building" role="tab" aria-controls="center-building" aria-selected="false">
                    중앙관
                </a>
            </li>
        </ul>
    </div>

        <div class="tab-content">
            <div class="tab-pane active" id="main-building" role="tabpanel" aria-labelledby="main-building-tab">
                <h3 class="sr-only">본관</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-main-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">본관</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">12층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>VIP отделение / 123 палатное отделение(отделение ТСК)</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">10 ~ 11층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Палата / 102 палатное отделение</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Палата/ отделение интенсивной терапии</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7 ~ 8층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Палата</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Палата</li>
                                        <li>Родильный зал / Отделение для новорожденных  / Клиника бесплодия/ Кабинет исскуственной почки/ кабинет трансплантации гемопоэтических стволовых клеток</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Палата</li>
                                        <li>Лабораторная медицина/ Аудитория/международный конференц-зал</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Операционная / Послеоперационное отделение/ Отделение интенсивной терапии нервной системы / патологии / банк человеческого материала</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Центр желудочно-кишечного тракта и толстой кишки (Гастроэнтерология, Хирургия) / Центр эндоскопии /
                                             Урология / Кабинет УЗИ / Касса  / Центр печени, желчного пузыря, поджелудочной железы (Центр печени) /
                                            Сосудистая хирургия печени, желчного пузыря, поджелудочной железы и трансплантации /
                                            Центр трансплантации органов / Респираторный центр (инфекционное отделение, пульмонология, кабинет бронхоскопии,
                                            Каб. диагностики функции легких ) / кабинет респираторного консультирования / Центр роботизированной хирургии /
                                            инъекционный кабинет / Маммологический центр / Онкологический центр (гематология и онкология) / Семейная медицина /
                                            Неврология / Лаборатория и учебный зал Центра когнитивных расстройств и деменции / Отоларингология / Дерматология /
                                            Клиника красоты / Каб. аудиометрии / Каб. диагностики головокружений / Каб. бронхоскопии / Касса / Процедурный кабинет</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Радиология (Центр интервенций) / Комната для проверки плотности костной ткани / Комната забора крови /
                                            Амбулаторная аптека / Консультационный кабинет врача по поддержанию жизни / Акушерство и гинекология / Аллергология /
                                            Детский центр (педиатрия) / Комната для кормления / Детский кардиологический кабинет / Комната тестирования на аллергию /
                                            Амбулаторное отделение / Касса/  Госпитализация-выписка / Центр медицинского сотрудничества / Центр поддержки клиентов / Бизнес-центр /
                                            Индустриальный банк IBK / Банкомат (IBK, Busan Bank) / кофейня (Segafredo) / CU круглосуточный магазин </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Отделение лучевой терапии / Реабилитационное отделение / Парковка основного здания / Похоронное бюро</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Отделение питания / Отделение оснащения оборудованием</li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="west-building" role="tabpanel" aria-labelledby="west-building-tab">
                <h3 class="sr-only">서관(구,센터동)</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-west-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">서관(구,센터동)</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">10층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Центр деменции / Сад на крыше</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">8 ~ 9층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>85-95 палатное отделение</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5 ~ 7층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>55-75 палатное отделение</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Отделение интенсивной терапии кардиологии / Отделение интенсивной терапии
                                            сердечно-цереброваскулярных заболеваний/ Отделение интенсивной терапии инсульта / Каб. ангиографии / Центр профилактики здоровья</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Центр сердечно-сосудистых заболеваний (кардиология, торакальная хирургия) / Каб. УЗИ сердца (УЗИ сонных артерий) /
                                            Каб. ЭКГ и обследований сосудов / Центр цереброваскулярных заболеваний (Центр инсульта) / Каб. УЗИ сосудов головного мозга /
                                            Каб. УЗИ сонных артерий / Реабилитационный центр сердечно-сосудистой системы /Касса</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Центр неотложной помощи / Каб. УЗИ / Касса отделения неотложной помощи</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Отделение ядерной медицины / ПЭТ-центр / Зал заседаний / Учебный зал</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Парковочная станция центрального здания</li>
                                    </ul>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="east-building" role="tabpanel" aria-labelledby="east-building-tab">
                <h3 class="sr-only">동관(구,신관)</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-east-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">동관(구,신관)</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">8 ~ 11층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Профессорская лаборатория</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Отдел планирования и координации/ Отдел бюджетного планирования / Отдел маркетинга и PR /Департамент аудита/
                                            Департамент общих дел / Департамент человеческих ресурсов / Департамент бухгалтерского учета/ Медсестринский отдел </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>60 палатное отделение</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Диагностический центр</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Стоматология / Центр болезни Паркинсона</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Эндокринология / Нефрология / Офтальмология / Пластическая хирургия / Диабетический центр / Касса</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Отделение ревматологии / Офтальмология (инъекционный, лазерный) / Нейрохирургия / Ортопедическая хирургия /
                                            Психиатрия / Центр позвоночника / Клиника лечения боли / Касса</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">지하 1층</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Эксплуатационный отдел</li>
                                    </ul>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="center-building" role="tabpanel" aria-labelledby="center-building-tab">
                <h3 class="sr-only">중앙관</h3>

                <div class="section-divider-sm content-bg bg-light" style="background-image: url('<?php echo $THEME_URL; ?>/images/guide/floor-center-building.jpg'); max-height: 320px; "></div>

                <section class="container section section-main-building">
                    <div class="section-header">
                        <h3 class="section-title">중앙관</h3>
                    </div>
                    <div class="section-body section-text text-muted">
                        <table class="table table--v1 table--responsive">
                            <tbody>
                            <tr>
                                <th scope="row">중앙관</th>
                                <td>
                                    <ul class="list-bullet">
                                        <li>Комплексный центр укрепления здоровья / Международный медицинский центр /
                                            Пусанский региональный медицинский центр для инвалидов / Центральная парковка/ Общий диагностический центр /
                                            ресторан и Удобные Услуги</li>
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
