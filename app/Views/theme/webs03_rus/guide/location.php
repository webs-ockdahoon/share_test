<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--guide page--guide-location');
$this->setVar('heroTitle', 'Как доехать до больницы');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-location.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="container section section-map">
    <div class="embed-responsive embed-responsive-21by9 bg-light">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.4684557266105!2d129.01537661554013!3d35.11998156815396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3568e988c9b9cf25%3A0x63b1b6593d1e6580!2z64-Z7JWE64yA7ZWZ6rWQ67OR7JuQ!5e0!3m2!1sko!2skr!4v1634698066797!5m2!1sko!2skr" width="100" height="100" style="border:0;" allowfullscreen="" loading="lazy" class="embed-responsive-item"></iframe>
    </div>
</div>

<section class="container section section-subway">
    <div class="section-header">
        <h3 class="section-title">1.Подземный метрополитен</h3>
    </div>
    <div class="section-body section-text text-muted">
        <table class="table-unstyled">
            <tbody>
            <tr>
                <td>
                    Сойти на станции Содешиндонг или Донгдешиндонг, пересесть на маршрутный автобус больницы (около 15мин.) или на такси, которое довезет вас за 2-3 минуты. <br>
                    <span class="text-danger">*</span> станция метро Донгдешиндонг: выход из метро № 2 / станция метро Содешиндонг: выход из метро № 4
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="container section section-circle-bus">
    <div class="section-header">
        <h3 class="section-title">2.Маршрутный автобус</h3>
    </div>
    <div class="section-body section-text text-muted">
        <table class="table table--v1 table--responsive">
            <tbody>
            <tr>
                <th scope="row">순환 노선</th>
                <td>
                    <ul class="list-bullet">
                        <li>Больница при университете Донг-А → станция Донгдешиндонг → станция Содешиндонг → колледж Пугенг → больница при университете Донг-А(около 15мин.)</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th scope="row">운행 시간</th>
                <td>
                    <ul class="list-bullet">
                        <li>первый автобус: 07:00 ч., последний автобус: 22:10 ч.<br>
                            <span class="text-danger">*</span> Однако, по субботам, воскресеньям, официальным праздничным дням, в период каникул автобус не курсирует.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th scope="row">정류장</th>
                <td>
                    <ul class="list-bullet">
                        <li>станция Донгдешиндонг: выход из метро № 2</li>
                        <li>станция Содешиндонг: выход из метро № 4</li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="container section section-bus">
    <div class="section-header">
        <h3 class="section-title">3.Городской автобус</h3>
    </div>
    <div class="section-body section-text text-muted">
        <table class="table table--v1 table--responsive">
            <tbody>
            <tr>
                <th scope="row">167, 190</th>
                <td>
                    <ul class="list-bullet">
                        <li>остановка возле больницы</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th scope="row">8, 15, 67, 161</th>
                <td>
                    <ul class="list-bullet">
                        <li>до больницы пешком около 5 мин.</li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="container section section-taxi">
    <div class="section-header">
        <h3 class="section-title">4.Такси</h3>
    </div>
    <div class="section-body section-text text-muted">
        <table class="table table--v1 table--responsive">
            <tbody>
            <tr>
                <th scope="row">목적지</th>
                <td>
                    <ul class="list-bullet">
                        <li>Медицинский центр при университете Донг-А / кампус Дешиндонг Университета Донг-А</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th scope="row">승강장</th>
                <td>
                    <ul class="list-bullet">
                        <li>станция Донгдешиндонг: выход из метро № 1</li>
                        <li>станция Содешиндонг: выход из метро № 4</li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="container section section-inter-city">
    <div class="section-header">
        <h3 class="section-title">5.타지역</h3>
    </div>
    <div class="section-body section-text text-muted">
        <table class="table table--v1 table--responsive table--responsive-column3">
            <thead>
            <tr>
                <th scope="col">출발지</th>
                <th scope="col">노선</th>
                <th scope="col">소요시간</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row">Со стороны аэропорта Кимхе</th>
                <td>
                    <p class="list-bullet is-non-list">
                        Кенчончоль(по направлению к станции Сасанг) → пересадка на городской автобус (8,15,161) → остановка спорткомплекс Кудок
                    </p>
                </td>
                <td>около 60мин</td>
            </tr>
            </tbody>

            <tbody>
            <tr>
                <th scope="rowgroup">Со стороны междугороднего автобусного терминала Сасанг</th>
                <td>
                    <p class="list-bullet is-non-list">
                        Сесть на городской автобус (8,15,161) → остановка спорткомплекс Кудок
                    </p>
                </td>
                <td>около 40мин</td>
            </tr>
            </tbody>

            <tbody>
            <tr>
                <th scope="rowgroup" rowspan="2">Если вы едите со стороны ж/д станции Пусан (Busan station)</th>
                <td>
                    <p class="list-bullet is-non-list">
                        Городской автобус №167 → остановка "больница при университете Донг-А" или остановка "колледж Кенгнам"
                    </p>
                </td>
                <td>около 20мин.</td>
            </tr>
            <tr>
                <td>
                    <p class="list-bullet is-non-list">
                        Городской автобус №67 - остановка "вход в больницу при университете Донг-А"
                    </p>
                </td>
                <td>около 25мин.</td>
            </tr>
            </tbody>

            <tbody>
            <tr>
                <th scope="row">
                    Со стороны терминала экспресс-автобусов Нопходонг
                </th>
                <td>
                    <p class="list-bullet is-non-list">Подземный метрополитен(по направлению к станции Синпен) → станция Донгдешиндонг или Содешиндонг) → пересесть на маршрутный автобус </p>
                </td>
                <td>коло 80мин.</td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="container section section-free-parking">
    <div class="section-header">
        <h3 class="section-title">6.Бесплатная парковка</h3>
    </div>
    <div class="section-body section-text text-muted">
        <ul class="list-bullet">
            <li class="mb-3">Бесплатная парковка в течении 4-х часов действует в   день амбулаторного приема, госпитализации/выписки, забронированного приема, обследования, приема в неотложной медицинской помощи и кабинете исскуственной почки.</li>
            <li class="mb-3">Для этого вам следует предоставить на 1этаже в информационном центре больничную карточку или квитанцию о   приеме и получить подтверждающую печать (действует с 1 декабря 2014г.)</li>
            <li class="mb-3">При прохождении общего обследования надо взять в диагностическом центре подтверждение на бесплатную парковку (действует с 1 декабря 2014г.)</li>
            <li class="mb-3">В похоронном бюро при использовании стандартного зала  для родственников предоставляется бесплатная парковка 1 машины, при использовании люкс-номера для родственников предоставляется бесплатная парковка на 2 машины.
                С 6 до 17 часов парковка в течение 1 часа бесплатно, талоны на парковку в порядке очередности предоставляются в количе тве 50 штук. </li>
            <li class="mb-3">• Для опекунов пациентов, находящихся в  реанимационном отделении и для лиц, исполняющих служебные обязанности, бесплатная парковка предоставляется в течении 3 часов.</li>
        </ul>
    </div>
</section>

<section class="container section section-parking-fee">
    <div class="section-header">
        <h3 class="section-title">7.Стоимость парковки</h3>
    </div>
    <div class="section-body section-text text-muted">
        <ul class="list-bullet">
            <li class="mb-3">Первые 30мин. - 1,000вон, последующие каждые 10мин. - 300вон</li>
            <li class="mb-3">Для инвалидов, зарегистрировавших машину 50% скидка</li>
            <li class="mb-3">Ночью максимум 5,000вон (с 18:00-7:00)</li>
        </ul>
    </div>
</section>

<section class="container section section-parking-fee">
    <div class="section-header">
        <h3 class="section-title">8.Дополнительная информация</h3>
    </div>
    <div class="section-body section-text text-muted">
        <ul class="list-bullet">
            <li class="mb-3">Для поддержания душевного равновесия пациентов просим  проявлять сдержанность при въезде в больницу.</li>
            <li class="mb-3">• Из-за больших затрат на стоянку автотранспорта при долговременной парковке просим людей по уходу за больными в случае совместного пребывания с больным пользоваться общественным транспортом.</li>
        </ul>
    </div>
</section>
<?php echo $this->endSection(); ?>
