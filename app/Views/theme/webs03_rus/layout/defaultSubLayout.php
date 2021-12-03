<?php echo $this->extend($THEME_URL.'/layout/defaultLayout'); ?>

<?php
    $bodyClassName = $bodyClassName ?? '';
    $this->setVar('bodyClassName', "default-sub-layout {$bodyClassName}");

    $heroTitle = $heroTitle ?? 'Dong-a University Hospital';
    $heroText = $heroText ?? NULL;

    // 현재 위치한 1차 메뉴명 구하기
    $now_menu_title = "";
    $now_menu_sub_title = "";
    if(isset($menu_info[$menu_active[0]]["mnu_title"])){
        $now_menu_title = $menu_info[$menu_active[0]]["mnu_title"];
        $now_menu_sub_title = $menu_info[$menu_active[0]]["mnu_sub_title"];
    }

?>

<?php echo $this->section('beforeContent'); ?>

    <nav class="page-breadcrumb page-breadcrumb--responsive">
        <div class="container container-lg">
            <ol class="page-breadcrumb__list">
                <li class="is-home">
                    <a href="/" class="btn btn-icon page-breadcrumb__link-home" title="홈으로 이동하기">
                        <span class="material-icons-round">home</span>
                    </a>
                </li>

                <li>

                    <a href="javascript:;" role="button" id="subDepth2" class="page-breadcrumb__toggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo str_nowrap($now_menu_title)?> <span class="icon icon-xs icon-toggle"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="subDepth2">
                        <?php foreach ($menu_info as $mn1) {
                        $mn_link = trim($mn1["mnu_url"]);
                        if (!$mn_link && sizeof($mn1["sub"]) > 0) {
                            $arr_key = array_key_first($mn1["sub"]);
                            $mn_link = trim($mn1["sub"][$arr_key]['mnu_url']);
                        }
                        if (!$mn_link) $mn_link = '#';
                        ?>
                        <a class="dropdown-item" href="<?php echo $mn_link?>"><?php echo str_nowrap($mn1['mnu_title'])?></a>
                        <?php }?>
                    </div>
                </li>

                <?php if(isset($menu_info[$menu_active[0]]["sub"])){

                $now_menu_title = "";
                if(isset($menu_info[$menu_active[0]]["sub"][$menu_active[1]]["mnu_title"]))$now_menu_title = $menu_info[$menu_active[0]]["sub"][$menu_active[1]]["mnu_title"];
                ?>
                <li class="dropdown is-current">
                    <a href="javascript:;" role="button" id="subDepth2" class="page-breadcrumb__toggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo str_nowrap($now_menu_title)?> <span class="icon icon-xs icon-toggle"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="subDepth2">

                        <?php foreach($menu_info[$menu_active[0]]["sub"] as $mn2){
                        $mn_link = trim($mn2["mnu_url"]);
                        if (!$mn_link) $mn_link = '#';
                        ?>
                            <a class="dropdown-item" href="<?php echo $mn_link?>"><?php echo str_nowrap($mn2['mnu_title'])?></a>
                        <?php }?>

                    </div>
                </li>
                <?php }?>

                <?php /* 3차 메뉴 일단 사용안함
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
                */?>
            </ol>
        </div>
    </nav>

<?php echo $this->endSection(); ?>

<?php echo $this->section('prependContent'); ?>
    <div class="content-hero">
    <div class="container">
        <h2 class="content-hero__title"><?php echo $heroTitle; ?></h2>

        <?php if($heroText): ?>
            <div class="content-hero__text text-muted">
                <?php echo $heroText; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

    <?php echo $this->renderSection('prependContent'); ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <?php echo $this->renderSection('content'); ?>
<?php echo $this->endSection(); ?>
