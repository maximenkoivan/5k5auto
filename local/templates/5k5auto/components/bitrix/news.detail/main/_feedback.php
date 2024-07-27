<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$fileId = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult()[0] ?: '';
$formSettings = \classes\Models\FiveKFiveAuto\Feedback\FormSettings::getInstance()->getElementByCode('settings')->getResult();
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
?>
<section class="application">
    <div class="container">
        <h2 class="application__title"><?= $arResult['PROPERTIES']['TITLE_FEEDBACK']['~VALUE'] ?></h2>
        <div class="application-order">
            <div class="application-order__form">
                <h3 class="application-order__title"><?= $arResult['PROPERTIES']['SUBTITLE_FEEDBACK']['~VALUE'] ?></h3>
                <p class="application-order__text">
                    <?= $arResult['PROPERTIES']['TEXT_FEEDBACK']['~VALUE'] ?>
                </p>
                <form class="application-order__select select-form" action="/request/feedback.php" method="POST"
                      data-success-header="<?= $formSettings['TITLE_OK']['~VALUE'] ?>"
                      data-success-message="<?= $formSettings['TEXT_OK']['~VALUE'] ?>">
                    <div id="orderForm" class="select-form__input select-form__input_name">
                        <input type="text" id="name" name="name"
                               placeholder="<?= $formSettings['PLH_1_CALLBACK']['~VALUE'] ?>">
                    </div>
                    <div class="select-form__input select-form__input_phone">
                        <input type="tel" id="phone" name="phone"
                               placeholder="<?= $formSettings['PLH_1_CALLBACK']['~VALUE'] ?>">
                    </div>
                    <div style="display: none">
                        <input name="ajax" value="callback">
                        <input name="form" value="<?= $formSettings['FORM_NAME_CALLBACK']['~VALUE'] ?>">
                        <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                        <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                        <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                        <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                        <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                    </div>
                    <button class="select-form__btn"
                            type="submit"><?= $formSettings['TEXT_BTN_CALLBACK']['~VALUE'] ?></button>
                </form>
                <?php if (!empty($fileId) && !empty($formSettings['TEXT_CONSENT']['~VALUE']) && !empty($formSettings['TEXT_CONSENT']['~DESCRIPTION'])): ?>
                    <p class="application-order__text application-order__text_policy">
                        <?= $formSettings['TEXT_CONSENT']['~VALUE'] ?>
                        <a href="<?= CFile::GetPath($fileId) ?>" target="_blank"
                           rel="noopener noreferrer"><?= $formSettings['TEXT_CONSENT']['~DESCRIPTION'] ?></a>
                    </p>
                <?php endif; ?>
            </div>
            <div class="application-order__img">
                <?php if (!empty($arResult['PROPERTIES']['IMAGE_FEEDBACK']['VALUE'])): ?>
                    <img width="480" height="740"
                         src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_FEEDBACK']['VALUE']) ?>"
                         alt="<?= $arResult['PROPERTIES']['IMAGE_FEEDBACK']['DESCRIPTION'] ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
