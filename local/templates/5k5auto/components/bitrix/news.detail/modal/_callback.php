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
<div id="modal-call" class="modal-call">
    <div class="container">
        <div class="modal-call__form">
            <h2 class="modal-call__title"><?= $arResult['PROPERTIES']['TITLE_CALLBACK']['~VALUE'] ?></h2>
            <form class="modal-call__select select-form" action="/request/feedback.php" method="POST">
                <div id="orderForm" class="select-form__input select-form__input_name">
                    <input type="text" id="name" name="name" placeholder="<?= $arResult['PROPERTIES']['PLH_1_CALLBACK']['~VALUE'] ?>">
                </div>
                <div class="select-form__input select-form__input_phone">
                    <input type="tel" id="phone" name="phone" placeholder="<?= $arResult['PROPERTIES']['PLH_2_CALLBACK']['~VALUE'] ?>">
                </div>
                <div style="display: none">
                    <input name="ajax" value="callback">
                    <input name="form" value="<?=  $arResult['PROPERTIES']['FORM_NAME_CALLBACK']['~VALUE'] ?>">
                    <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                    <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                    <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                    <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                    <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                </div>
                <button class="select-form__btn" type="submit"><?= $arResult['PROPERTIES']['TEXT_BTN_CALLBACK']['~VALUE'] ?></button>
            </form>
            <?php if (!empty($fileId) && !empty($arResult['PROPERTIES']['TEXT_CONSENT']['~VALUE']) && !empty($arResult['PROPERTIES']['TEXT_CONSENT']['~DESCRIPTION'])): ?>
            <p class="modal-call__text modal-call__text_policy">
                <?= $arResult['PROPERTIES']['TEXT_CONSENT']['~VALUE'] ?>
                <a href="<?= CFile::GetPath($fileId) ?>" target="_blank" rel="noopener noreferrer"><?= $arResult['PROPERTIES']['TEXT_CONSENT']['~DESCRIPTION'] ?></a>
            </p>
            <?php endif; ?>
        </div>
    </div>
</div>