<?php

use classes\Models\ReplaceGlazing\Common\CommonData;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$privacyPolicyLink = CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult();
$link = CFile::GetPath($privacyPolicyLink[0]);
$consentTextQuiz = str_replace('#TEXT_BUTTON#', '"' . $arResult['PROPERTIES']['TEXT_BTN_1_QUIZ']['VALUE'] . '"', $arResult['PROPERTIES']['CONSENT_TEXT_COMMON']['VALUE']);
$consentTextQuiz = str_replace('#PRIVACY_POLICY#', "<a href='{$link}' target='_blank'>{$arResult['PROPERTIES']['TEXT_LINK_COMMON']['VALUE']}</a>", $consentTextQuiz);
$consentTextCallaback = str_replace('#TEXT_BUTTON#', '"' . $arResult['PROPERTIES']['TEXT_BTN_CALLBACK']['VALUE'] . '"', $arResult['PROPERTIES']['CONSENT_TEXT_COMMON']['VALUE']);
$consentTextCallaback = str_replace('#PRIVACY_POLICY#', "<a href='{$link}' target='_blank'>{$arResult['PROPERTIES']['TEXT_LINK_COMMON']['VALUE']}</a>", $consentTextCallaback);
?>
<div id="modal-quiz" class="modal-box">
    <div class="quiz-wrapper">
        <div class="modal-img-right">
            <form action="/request/calculate.php" method="POST"
                  data-success-header="<?= $arResult['PROPERTIES']['TITLE_SUCCESS_QUIZ']['~VALUE'] ?>"
                  data-success-message="<?= $arResult['PROPERTIES']['TEXT_SUCCESS_QUIZ']['~VALUE']['TEXT'] ?? '' ?>"
                  class="quiz-inner-container">

                <div class="quiz-item active-quiz">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_STEP_1_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_STEP_1_QUIZ']['~VALUE'] as $key => $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>"
                                       data-items="<?= array_key_last($arResult['PROPERTIES']['DESC_STEP_1_QUIZ']['~VALUE']) === $key ? '2' : '1' ?>"
                                       name="services">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="quiz-item active-quiz">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_STEP_2_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_STEP_2_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="place">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item" data-item="1">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_1_STEP_3_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_1_STEP_3_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="buildingType">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item" data-item="1">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_1_STEP_4_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <div class="form-input form-input-thiner form-input-border">
                            <input type="text"
                                   placeholder="<?= $arResult['PROPERTIES']['PLH_1_STEP_4_QUIZ']['~VALUE'] ?>"
                                   name="numberFloor">
                        </div>
                        <div class="form-input form-input-thiner form-input-border">
                            <input type="number"
                                   placeholder="<?= $arResult['PROPERTIES']['PLH_2_STEP_4_QUIZ']['~VALUE'] ?>"
                                   name="totalFloor">
                        </div>
                    </div>
                </div>


                <div class="quiz-item" data-item="1">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_1_STEP_5_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_1_STEP_5_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="typeWork">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item" data-item="1">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_1_STEP_6_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <div class="form-input form-input-thiner form-input-border shorter-input">
                            <input type="number" name="totalCount">
                        </div>
                    </div>
                </div>


                <div class="quiz-item" data-item="1">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_1_STEP_7_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_1_STEP_7_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="lift">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item" data-item="2">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_2_STEP_3_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <div class="form-input form-input-thiner form-input-border shorter-input">
                            <input type="number" name="itemsNumber">
                        </div>
                    </div>
                </div>


                <div class="quiz-item" data-item="2">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_2_STEP_4_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_2_STEP_4_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="weight">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item" data-item="2">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_2_STEP_5_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_2_STEP_5_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="floor">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item" data-item="2">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_2_STEP_6_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap">
                        <?php foreach ($arResult['PROPERTIES']['DESC_2_STEP_6_QUIZ']['~VALUE'] as $text): ?>
                            <label class="checkbox-element"><?= $text ?>
                                <input type="radio" value="<?= $text ?>" name="cover">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="quiz-item active-quiz">
                    <div class="quiz-item-heading"><?= $arResult['PROPERTIES']['TITLE_STEP_QUIZ']['~VALUE'] ?></div>

                    <div class="quiz-form-wrap boxed-quiz-form data-form pb-4">
                        <div class="form-input form-contact-input form-input-thiner form-input-border">
                            <input type="text" placeholder="<?= $arResult['PROPERTIES']['PLH_1_STEP_QUIZ']['~VALUE'] ?>"
                                   name="formName">
                        </div>
                        <div class="form-input form-contact-input form-input-thiner form-input-border">
                            <input type="tel" placeholder="<?= $arResult['PROPERTIES']['PLH_2_STEP_QUIZ']['~VALUE'] ?>"
                                   name="formPhone">
                        </div>

                        <div style="display: none">
                            <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                            <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                            <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                            <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                            <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                        </div>

                        <button type="submit"
                                class="submit-button form-button-thiner sho no-border button-element gradient-button">
                            <?= $arResult['PROPERTIES']['TEXT_BTN_1_QUIZ']['~VALUE'] ?>
                        </button>

                        <div class="form-agreement">
                            <?= $consentTextQuiz ?>
                        </div>
                    </div>

                </div>
            </form>

            <div class="quiz-buttons d-flex flex-wrap">
                <button class="quiz-prev-btn button-element dark-outline-button mr-md-4">
                    <svg class="mr-1" width="22" height="8" viewBox="0 0 22 8" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.646446 4.35352C0.451185 4.15826 0.451185 3.84168 0.646446 3.64642L3.82843 0.464436C4.02369 0.269173 4.34027 0.269173 4.53553 0.464436C4.7308 0.659698 4.7308 0.97628 4.53553 1.17154L1.70711 3.99997L4.53553 6.8284C4.7308 7.02366 4.7308 7.34024 4.53553 7.5355C4.34027 7.73077 4.02369 7.73077 3.82843 7.5355L0.646446 4.35352ZM22 4.49997H1V3.49997H22V4.49997Z"
                              fill="#2A2A2A"/>
                    </svg>
                    <?= $arResult['PROPERTIES']['TEXT_BTN_2_QUIZ']['~VALUE'] ?>
                </button>

                <button class="quiz-next-btn button-element gradient-button">
                    <?= $arResult['PROPERTIES']['TEXT_BTN_3_QUIZ']['~VALUE'] ?>
                    <svg class="ml-1" width="22" height="8" viewBox="0 0 22 8" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.3536 4.35352C21.5488 4.15826 21.5488 3.84168 21.3536 3.64642L18.1716 0.464436C17.9763 0.269173 17.6597 0.269173 17.4645 0.464436C17.2692 0.659698 17.2692 0.97628 17.4645 1.17154L20.2929 3.99997L17.4645 6.8284C17.2692 7.02366 17.2692 7.34024 17.4645 7.5355C17.6597 7.73077 17.9763 7.73077 18.1716 7.5355L21.3536 4.35352ZM0 4.49997H21V3.49997H0V4.49997Z"
                              fill="white"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</div>


<div id="modal-consult" class="modal-box">
    <div class="modal-inner-container modal-img-left">
        <div class="form-area pt-0 pl-0 pb-0 pr-2 d-flex align-items-md-end align-items-center flex-column">
            <div>
                <div class="section-heading rose-color kc-bold t-center mb-4"><?= $arResult['PROPERTIES']['TITLE_CALLBACK']['~VALUE'] ?></div>
                <div class="d-flex justify-content-center">
                    <form action="/request/callback.php" method="POST"
                          data-success-header="<?= $arResult['PROPERTIES']['TITLE_SUCCESS_CALLBACK']['~VALUE'] ?>"
                          data-success-message="<?= $arResult['PROPERTIES']['TEXT_SUCCESS_CALLBACK']['~VALUE']['TEXT'] ?? '' ?>"
                          class="form-wrap data-form">

                        <div class="form-input form-contact-input form-input-thiner form-input-border">
                            <input type="text" name="formName"
                                   placeholder="<?= $arResult['PROPERTIES']['PLH_1_CALLBACK']['~VALUE'] ?>">
                        </div>

                        <div class="form-input form-contact-input form-input-thiner form-input-border">
                            <input type="tel" name="formPhone"
                                   placeholder="<?= $arResult['PROPERTIES']['PLH_2_CALLBACK']['~VALUE'] ?>">
                        </div>
                        <!--                        <div class="form-input hidden">-->
                        <div style="display: none">
                            <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                            <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                            <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                            <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                            <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                        </div>

                        <!--                        </div>-->
                        <button type="submit"
                                class="submit-button form-button-thiner no-border button-element gradient-button"><?= $arResult['PROPERTIES']['TEXT_BTN_CALLBACK']['~VALUE'] ?></button>

                        <div class="form-agreement form-agreement-larger darker-clr mt-4"><?= $consentTextCallaback ?></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>