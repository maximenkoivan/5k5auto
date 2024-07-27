<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @var $request
 * @global CMain $APPLICATION
 */
?>
<div id="modal-promotion" class="modal-promotion" data-time-open="<?= abs(intval($arResult['PROPERTIES']['TIME_SHOW_PROMOTION']['VALUE'])) ?>">
    <div class="container">
        <div class="modal-promotion__img">
            <?php if (!empty($arResult['PROPERTIES']['IMAGE_PROMOTION']['VALUE'])): ?>
                <img width="496" height="509"
                     src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_PROMOTION']['VALUE']) ?>"
                     alt="<?= $arResult['PROPERTIES']['IMAGE_PROMOTION']['DESCRIPTION'] ?>">
            <?php endif; ?>
        </div>
        <div class="modal-promotion__content">
            <h2 class="modal-promotion__title"><?= $arResult['PROPERTIES']['TITLE_PROMOTION']['~VALUE'] ?></h2>
            <p class="modal-promotion__text">
                <?= $arResult['PROPERTIES']['TEXT_PROMOTION']['~VALUE']['TEXT'] ?>
            </p>
            <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_PROMOTION']['VALUE'])): ?>
                <button class="modal-promotion__btn"
                        data-src="#modal-call"><?= $arResult['PROPERTIES']['TEXT_BTN_PROMOTION']['VALUE'] ?></button>
            <?php endif; ?>
        </div>
    </div>
</div>
