<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;

$assets = Asset::getInstance();
$assets->addString(
    '<link rel="icon" href="' . SITE_TEMPLATE_PATH . '/assets/images/favicon.ico" type="image/x-icon"/>',
    AssetLocation::BEFORE_CSS
);
$assets->addString(
    ' <link rel="icon" sizes="120x120" type="image/png" href="' . SITE_TEMPLATE_PATH . '/assets/images/favicon-120x120.png">',
    AssetLocation::BEFORE_CSS
);
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/screen.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/fancybox.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/responsive.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/swiper-bundle.min.css');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/jquery-1.12.4.min.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/fancybox.umd.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/imask.min.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/swiper-bundle.min.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/common.js');
$headerData = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByPostfix('HEADER')->cashed('header')->getResult();
?>
    <!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
    <head>
        <meta charset="<?= LANG_CHARSET ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php $APPLICATION->ShowTitle() ?></title>

        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?= $HTTP_X_FORWARDED_PROTO . '://' . SITE_SERVER_NAME ?>"/>
        <meta property="og:title" content="<?php $APPLICATION->ShowTitle(); ?>"/>
        <meta property="og:description" content="<?php $APPLICATION->ShowProperty('description', ''); ?>"/>
        <meta property="og:image" content="<?= $HTTP_X_FORWARDED_PROTO . '://' . SITE_SERVER_NAME . SITE_TEMPLATE_PATH . '/assets/images/favicon-120x120.png' ?>"/>

        <?php $APPLICATION->ShowHead() ?>

        <?php if ($USER->IsAdmin()): ?>
            <?php $APPLICATION->ShowPanel(); ?>
        <?php endif; ?>

    </head>
