<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<div id="modal-thnx" class="modal-thnx">
    <div class="container">
        <h2 class="modal-thnx__title"><?= $arResult['PROPERTIES']['TITLE_OK']['~VALUE'] ?></h2>
        <?php if (!empty($arResult['PROPERTIES']['IMAGE_OK']['~VALUE'])): ?>
            <div class="modal-thnx__img">
                <img width="701" height="396" src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_OK']['~VALUE']) ?>"
                     alt="<?= $arResult['PROPERTIES']['IMAGE_OK']['DESCRIPTION'] ?>">
            </div>
        <?php endif; ?>
    </div>
</div>
