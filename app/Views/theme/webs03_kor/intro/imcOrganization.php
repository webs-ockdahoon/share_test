<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-imc-organization');
$this->setVar('heroTitle', '조직도');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-imc-organization.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">

    <img src="<?php echo $THEME_URL ?>/images/intro/imc-organization-img.jpg" title="">

</article>
<?php echo $this->endSection(); ?>
