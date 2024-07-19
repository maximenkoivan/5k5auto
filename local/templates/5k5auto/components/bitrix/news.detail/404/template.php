<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<div class="lines-bg lines-bg-reverse"></div>

<div class="container container-404">
    <div class="heading-404 kc-bold"><?= $arResult['PROPERTIES']['TITLE_404']['~VALUE'] ?></div>
    <div class="heading-text kc-bold-it"><?= $arResult['PROPERTIES']['DESC_404']['~VALUE'] ?></div>

    <a href="/" class="button-element button-404 gradient-button"
       role="button"><?= $arResult['PROPERTIES']['TEXT_LINK_404']['~VALUE'] ?></a>
</div>

<div class="sign-element">
    <?php if ($arResult['PROPERTIES']['IMAGE_1_404']['~VALUE']): ?>
        <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_1_404']['~VALUE']) ?>" class="" alt="">
    <?php endif; ?>
</div>

<picture class="image-404">
    <?php if ($arResult['PROPERTIES']['IMAGE_2_404']['~VALUE']): ?>
        <source srcset='<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_2_404']['~VALUE']) ?>'
                media='(min-width: 991px)'
                type='image/png'>
    <?php endif; ?>
    <?php if ($arResult['PROPERTIES']['IMAGE_3_404']['~VALUE']): ?>
        <source srcset='<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_3_404']['~VALUE']) ?>'
                media='(min-width: 0px)'
                type='image/png'>
    <?php endif; ?>
    <?php if ($arResult['PROPERTIES']['IMAGE_3_404']['~VALUE']): ?>
        <img src='<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_3_404']['~VALUE']) ?>' alt=''>
    <?php endif; ?>
</picture>
