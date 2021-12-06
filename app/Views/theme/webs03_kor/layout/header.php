<title><?php echo $config_site["header_title"]?> <?php if($header_title)echo " - " . $header_title . $header_title_ext?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="format-detection" content="telephone=no">

<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?php echo $config_company["name"]?>">
<meta property="og:url" content="/">
<meta property="og:title" content="<?php echo $config_site["header_title"]?>">
<meta property="og:description" content="<?php echo $config_site["header_description"]?>">
<meta property="og:image" content="<?php echo $config_site["header_image"]?>">

<?php echo $config_site["header_additional"]?>

<link rel="stylesheet" href="/assets/fonts/material-icons.css">
<link rel="stylesheet" href="<?php echo $THEME_URL; ?>/css/base.css">
<link rel="preload"  as="style" href="<?php echo $THEME_URL; ?>/css/common.css">
<link rel="stylesheet" href="<?php echo $THEME_URL; ?>/css/common.css">
<link rel="preload" as="style" href="<?php echo $THEME_URL?>/css/theme.css">
<link rel="stylesheet" href="<?php echo $THEME_URL?>/css/theme.css">
<link rel="stylesheet" media="print" href="<?php echo $THEME_URL?>/css/print.css" >
<script>var cont_url="<?php echo $cont_url;?>";</script>