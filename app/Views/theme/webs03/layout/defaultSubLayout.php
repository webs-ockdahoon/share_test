<?php echo $this->extend($THEME_URL.'/layout/defaultLayout'); ?>

<?php
    $bodyClassName = $bodyClassName ?? '';
    $this->setVar('bodyClassName', "default-sub-layout {$bodyClassName}");

    $heroTitle = $heroTitle ?? 'Dong-a University Hospital';
    $heroText = $heroText ?? NULL;
?>

<?php echo $this->section('beforeContent'); ?>

    <nav class="page-breadcrumb page-breadcrumb--responsive">
        <div class="container container-lg">
            <ol class="page-breadcrumb__list">
                <li>
                    <a href="/template" class="btn btn-icon page-breadcrumb__link-home" title="홈으로 이동하기">
                        <span class="material-icons-round">home</span>
                    </a>
                </li>

                <li>
                    <a href="/template/sub" class="page-breadcrumb__link">Depth 1</a>
                </li>

                <li class="dropdown">
                    <a href="/template/sub" role="button" id="subDepth2" class="page-breadcrumb__toggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Depth 2 <span class="icon icon-xs icon-toggle"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="subDepth2">
                        <a class="dropdown-item" href="#">Depth 2 - menu 1</a>
                        <a class="dropdown-item" href="#">Depth 2 - menu 2</a>
                        <a class="dropdown-item" href="#">Depth 2 - menu 3</a>
                    </div>
                </li>

                <li class="dropdown is-current">
                    <a href="/template/sub" role="button" id="subDepth3" class="page-breadcrumb__toggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Depth 3 <span class="icon icon-xs icon-toggle"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="subDepth3">
                        <a class="dropdown-item" href="#">Depth 3 - menu 1</a>
                        <a class="dropdown-item" href="#">Depth 3 - menu 2</a>
                        <a class="dropdown-item" href="#">Depth 3 - menu 3</a>
                    </div>
                </li>
            </ol>
        </div>
    </nav>

<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

    <div class="content-hero">
        <div class="container">
            <h2 class="content-hero__title"><?php echo $heroTitle; ?></h2>

            <?php if($heroText): ?>
                <div class="content-hero__text">
                    <?php echo $heroText; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php echo $this->renderSection('content'); ?>
<?php echo $this->endSection(); ?>
