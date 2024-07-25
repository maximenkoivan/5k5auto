<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$fileId = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult()[0] ?: '';
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
                <button class="select-form__btn" type="submit"><?= $arResult['PROPERTIES']['TEXT_BTN_CALLBACK']['~VALUE'] ?></button>
            </form>
            <?php if (!empty($fileId) && !empty($arResult['PROPERTIES']['TEXT_CONSENT']['~VALUE']) && !empty($arResult['PROPERTIES']['TEXT_CONSENT']['~DESCRIPTION'])): ?>
            <p class="modal-call__text modal-call__text_policy">
                <?= $arResult['PROPERTIES']['TEXT_CONSENT']['~VALUE'] ?>
                <a href="<?= CFile::GetPath($fileId) ?>" target="_blank" rel="noopener noreferrer"><?= $arResult['PROPERTIES']['TEXT_CONSENT']['~DESCRIPTION'] ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</div>