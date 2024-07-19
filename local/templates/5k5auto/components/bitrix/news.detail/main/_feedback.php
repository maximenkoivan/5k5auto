<?php

use classes\Models\FiveKFiveAuto\Common\CommonData;
use classes\Models\FiveKFiveAuto\Feedback\FormSettings;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$formSettings = FormSettings::getInstance();
$feedbackSettings = $formSettings->getPropertiesByPostfix('FEEDBACK')->getResult();
$formCommonSettings = $formSettings->getPropertiesByPostfix('COMMON')->getResult();
$privacyPolicyLink = CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult();
$link = CFile::GetPath($privacyPolicyLink[0]);
$consentText = str_replace('#TEXT_BUTTON#', '"' . $feedbackSettings['TEXT_BTN_FEEDBACK']['VALUE'] . '"', $formCommonSettings['CONSENT_TEXT_COMMON']['VALUE']);
$consentText = str_replace('#PRIVACY_POLICY#', "<a href='{$link}' target='_blank'>{$formCommonSettings['TEXT_LINK_COMMON']['VALUE']}</a>", $consentText);
?>
<?php if (!empty($feedbackSettings)): ?>
    <section class="section-wrapper form-section pt-0 pb-0">
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse">
                <div class="col-lg-6 d-flex align-items-end">
                    <?php if (!empty($feedbackSettings['IMAGE_FEEDBACK']['VALUE'])): ?>
                        <div class="former-img">
                            <img src="<?= CFile::GetPath($feedbackSettings['IMAGE_FEEDBACK']['VALUE']) ?>"
                                 alt="<?= CFile::GetFileArray($feedbackSettings['IMAGE_FEEDBACK']['VALUE'])['ORIGINAL_NAME'] ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 d-flex align-items-end">

                    <div class="form-area form-area-rose">
                        <div class="form-heading kc-bold t-center">
                            <?= $feedbackSettings['TITLE_FEEDBACK']['VALUE'] ?>
                        </div>

                        <div class="d-flex justify-content-center">
                            <form action="/request/callback.php" method="POST"
                                  data-success-header="<?= $feedbackSettings['TITLE_SUCCESS_FEEDBACK']['VALUE'] ?>"
                                  data-success-message="<?= $feedbackSettings['TEXT_SUCCESS_FEEDBACK']['~VALUE']['TEXT'] ?? '' ?>"
                                  class="form-wrap data-form">

                                <div class="form-input form-contact-input">
                                    <input type="text" name="formName"
                                           placeholder="<?= $feedbackSettings['PLH_1_FEEDBACK']['VALUE'] ?>">
                                </div>

                                <div class="form-input form-contact-input">
                                    <input type="tel" name="formPhone"
                                           placeholder="<?= $feedbackSettings['PLH_2_FEEDBACK']['VALUE'] ?>">
                                </div>

                                <div style="display: none">
                                    <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                                    <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                                    <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                                    <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                                    <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                                </div>

                                <button type="submit" class="submit-button button-element gradient-button">
                                    <?= $feedbackSettings['TEXT_BTN_FEEDBACK']['VALUE'] ?>
                                </button>

                                <div class="form-agreement">
                                    <?= $consentText ?>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
