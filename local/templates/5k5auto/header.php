<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;
use classes\Helpers\Generic;

$assets = Asset::getInstance();

$assets->addString(
    ' <link rel="icon" sizes="120x120" type="image/png" href="' . SITE_TEMPLATE_PATH . '/assets/images/favicon/favicon-120x120.png">',
    AssetLocation::BEFORE_CSS
);

$assets->addCss(SITE_TEMPLATE_PATH . '/assets/css/style.css');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/script.js', true);
$headerData = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByPostfix('HEADER')->cashed('header')->getResult();
?>
    <!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
    <head>
        <meta charset="<?= LANG_CHARSET ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title><?php $APPLICATION->ShowTitle() ?></title>

        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?= $HTTP_X_FORWARDED_PROTO . '://' . SITE_SERVER_NAME ?>"/>
        <meta property="og:title" content="<?php $APPLICATION->ShowTitle(); ?>"/>
        <meta property="og:description" content="<?php $APPLICATION->ShowProperty('description', ''); ?>"/>
        <meta property="og:image"
              content="<?= $HTTP_X_FORWARDED_PROTO . '://' . SITE_SERVER_NAME . SITE_TEMPLATE_PATH . '/assets/images/favicon/favicon-120x120.png' ?>"/>

        <?php $APPLICATION->ShowHead() ?>

        <?php if ($USER->IsAdmin()): ?>
            <?php $APPLICATION->ShowPanel(); ?>
        <?php endif; ?>

    </head>
<body>
<?php if (!(defined('ERROR_404') && ERROR_404 == 'Y')): ?>
    <header class="header" id="top">
        <div class="container">
            <div class="header-info">
                <div class="header-info__left">
                    <div class="header-info__content">
                        <div class="header-info__logo">
                            <?php if (!empty($headerData['LOGO_HEADER']['VALUE'])): ?>
                                <a href="<?= $headerData['LOGO_HEADER']['DESCRIPTION'] ?>" target="_blank"
                                   rel="noopener noreferrer">
                                    <img src="<?= CFile::GetPath($headerData['LOGO_HEADER']['VALUE']) ?>" width="98"
                                         height="77" alt="<?= $headerData['LOGO_HEADER']['DESCRIPTION'] ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <p class="header-info__adress">
                            <?= $headerData['ADDRESS_HEADER']['~VALUE'] ?>
                        </p>
                    </div>
                    <div class="header-info__select">
                        <?php if (!empty($headerData['BTN_TEXT_HEADER']['~VALUE'])): ?>
                            <button class="header-info__consultation" data-src="#modal-call">
                                <?= $headerData['BTN_TEXT_HEADER']['~VALUE'] ?>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="header-info__right">
                    <ul class="header-info__contacts">
                        <?php if (!empty($headerData['PHONE_HEADER']['~VALUE'])): ?>
                            <li><a href="tel:<?= Generic::getCleanPhoneNumber($headerData['PHONE_HEADER']['~VALUE']) ?>"
                                   rel="noopener noreferrer"><?= $headerData['PHONE_HEADER']['~VALUE'] ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($headerData['EMAIL_HEADER']['~VALUE'])): ?>
                            <li><a href="mailto:<?= $headerData['EMAIL_HEADER']['~VALUE'] ?>" target="_blank"
                                   rel="noopener noreferrer"><?= $headerData['EMAIL_HEADER']['~VALUE'] ?></a></li>
                        <?php endif; ?>
                    </ul>
                    <?php if (!empty($headerData['BTN_TEXT_HEADER']['~VALUE'])): ?>
                        <button class="header-info__consultation header-info__consultation_pc" data-src="#modal-call">
                            <?= $headerData['BTN_TEXT_HEADER']['~VALUE'] ?>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="header-navigation hero-navigation">
                <div class="hero-navigation__step step-one active"><?= $headerData['MARK_SLIDE_1_HEADER']['~VALUE'] ?></div>
                <div class="hero-navigation__step step-two"><?= $headerData['MARK_SLIDE_2_HEADER']['~VALUE'] ?></div>
                <div class="hero-navigation__step step-three"><?= $headerData['MARK_SLIDE_3_HEADER']['~VALUE'] ?></div>
            </div>
        </div>
    </header>
<?php endif; ?>