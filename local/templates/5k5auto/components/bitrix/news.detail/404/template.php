<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$this->addExternalCss(SITE_TEMPLATE_PATH . '/assets/css/404.css');
?>
<div class="absent">
    <div class="container">
        <div class="absent__content">
            <h1 class="absent__title"><?= $arResult['PROPERTIES']['TITLE_404']['~VALUE'] ?></h1>
            <p class="absent__text"><?= $arResult['PROPERTIES']['DESC_404']['~VALUE'] ?></p>
        </div>
        <a class="absent__btn" href="/" target="_blank" rel="noopener noreferrer"><?= $arResult['PROPERTIES']['TEXT_LINK_404']['~VALUE'] ?></a>
    </div>
</div>