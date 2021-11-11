<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-history');
$this->setVar('heroTitle', '병원 연혁');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-history.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">


    <div class="container section mt-0 section-text text-muted">
        <div class="section-divider">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="main-building-tab" data-toggle="tab" href="#main-building" role="tab" aria-controls="main-building" aria-selected="true">
                        현재~2000
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="west-building-tab" data-toggle="tab" href="#west-building" role="tab" aria-controls="west-building" aria-selected="false">
                        1999~1990
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="east-building-tab" data-toggle="tab" href="#east-building" role="tab" aria-controls="east-building" aria-selected="false">
                        1989~1985
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="main-building" role="tabpanel" aria-labelledby="main-building-tab">
                <h3 class="sr-only">현재~2000</h3>

                    <div class="section-body section-text text-muted">
                        <img src="<?php echo $THEME_URL ?>/images/intro/intro-history.jpg" title="">
                    </div>
                </section>
            </div>

</article>
<?php echo $this->endSection(); ?>
