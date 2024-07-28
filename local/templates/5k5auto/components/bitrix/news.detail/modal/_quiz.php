<?php

use classes\Helpers\Generic;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @var $request
 * @global CMain $APPLICATION
 */
?>
<div id="modal-quiz" class="modal-quiz">
    <div class="modal-quiz__wrapper">
        <form class="quiz-form" action="/request/feedback.php" method="POST">
            <div class="container">
                <div class="modal-quiz__item quiz-start quiz-active">
                    <div class="modal-quiz__left">
                        <div class="modal-quiz__top">
                            <div class="modal-quiz__logo">
                                <?php if (!empty($arResult['PROPERTIES']['LOGO_QUIZ']['VALUE'])): ?>
                                    <img src="<?= CFile::GetPath($arResult['PROPERTIES']['LOGO_QUIZ']['VALUE']) ?>"
                                         width="111" height="86"
                                         alt="<?= $arResult['PROPERTIES']['LOGO_QUIZ']['DESCRIPTION'] ?>">
                                <?php endif; ?>
                            </div>
                            <p class="modal-quiz__adress">
                                <span><?= $arResult['PROPERTIES']['ADDRESS_QUIZ']['~VALUE'] ?></span>
                            </p>
                        </div>
                        <ul class="modal-quiz__contacts">
                            <li>
                                <a href="tel:<?= Generic::getCleanPhoneNumber($arResult['PROPERTIES']['PHONE_QUIZ']['~VALUE']) ?>"><?= $arResult['PROPERTIES']['PHONE_QUIZ']['~VALUE'] ?></a>
                            </li>
                            <li>
                                <a href="mailto:<?= $arResult['PROPERTIES']['EMAIL_QUIZ']['~VALUE'] ?>"><?= $arResult['PROPERTIES']['EMAIL_QUIZ']['~VALUE'] ?></a>
                            </li>
                        </ul>
                        <h2 class="modal-quiz__title">
                            <?= $arResult['PROPERTIES']['TITLE_QUIZ']['~VALUE'] ?>
                        </h2>
                        <p class="modal-quiz__text">
                            <?= $arResult['PROPERTIES']['SUBTITLE_QUIZ']['~VALUE'] ?>
                        </p>
                        <div class="modal-quiz__btn"><?= $arResult['PROPERTIES']['TEXT_BTN_1_QUIZ']['~VALUE'] ?></div>
                    </div>
                    <div class="modal-quiz__right">
                        <?php if (!empty($arResult['PROPERTIES']['IMAGE_QUIZ']['VALUE'])): ?>
                            <img width="480" height="680"
                                 src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_QUIZ']['VALUE']) ?>"
                                 alt="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_QUIZ']['DESCRIPTION']) ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-quiz__item quiz-1">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title"><?= $arResult['PROPERTIES']['QUESTION_STEP_1_1_QUIZ']['~VALUE'] ?></h2>
                        <div class="modal-quiz__questions">
                            <?php foreach ($arResult['PROPERTIES']['ANSWER_STEP_1_1_QUIZ']['~VALUE'] as $key => $answer): ?>
                                <label class="checkbox-element">
                                    <?= $answer ?>
                                    <input type="radio" value="<?= $answer ?>" name="auto-age" data-auto-age="<?= $key + 1 ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled"><?= $arResult['PROPERTIES']['TEXT_BTN_2_QUIZ']['~VALUE'] ?></div>
                        <?php if (!empty($arResult['PROPERTIES']['IMAGE_STEP_1_1_QUIZ']['VALUE'])): ?>
                            <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_STEP_1_1_QUIZ']['VALUE']) ?>"
                                 width="760" height="430"
                                 alt="<?= $arResult['PROPERTIES']['IMAGE_STEP_1_1_QUIZ']['DESCRIPTION'] ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-quiz__item quiz-2">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title"><?= $arResult['PROPERTIES']['QUESTION_STEP_2_2_QUIZ']['~VALUE'] ?></h2>
                        <div class="modal-quiz__questions">
                            <?php foreach ($arResult['PROPERTIES']['ANSWER_STEP_2_2_QUIZ']['~VALUE'] as $key => $answer): ?>
                                <label class="checkbox-element">
                                    <?= $answer ?>
                                    <input type="radio" value="<?= $answer ?>" name="auto-price" data-auto-price="<?= $key + 1 ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled"><?= $arResult['PROPERTIES']['TEXT_BTN_2_QUIZ']['~VALUE'] ?></div>
                        <?php if (!empty($arResult['PROPERTIES']['IMAGE_STEP_2_2_QUIZ']['VALUE'])): ?>
                            <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_STEP_2_2_QUIZ']['VALUE']) ?>"
                                 width="760" height="430"
                                 alt="<?= $arResult['PROPERTIES']['IMAGE_STEP_2_2_QUIZ']['DESCRIPTION'] ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-quiz__item quiz-3">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title"><?= $arResult['PROPERTIES']['QUESTION_STEP_3_2_QUIZ']['~VALUE'] ?></h2>
                        <div class="modal-quiz__questions">
                            <?php foreach ($arResult['PROPERTIES']['ANSWER_STEP_3_2_QUIZ']['~VALUE'] as $key => $answer): ?>
                                <label class="checkbox-element">
                                    <?= $answer ?>
                                    <input type="radio" value="<?= $answer ?>" name="auto-use" data-auto-use="<?= $key + 1 ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled"><?= $arResult['PROPERTIES']['TEXT_BTN_2_QUIZ']['~VALUE'] ?></div>
                        <?php if (!empty($arResult['PROPERTIES']['IMAGE_STEP_3_2_QUIZ']['VALUE'])): ?>
                            <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_STEP_3_2_QUIZ']['VALUE']) ?>"
                                 width="760" height="430"
                                 alt="<?= $arResult['PROPERTIES']['IMAGE_STEP_3_2_QUIZ']['DESCRIPTION'] ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-quiz__item quiz-4">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title"><?= $arResult['PROPERTIES']['QUESTION_STEP_4_2_QUIZ']['~VALUE'] ?></h2>
                        <div class="modal-quiz__questions">
                            <?php foreach ($arResult['PROPERTIES']['ANSWER_STEP_4_2_QUIZ']['~VALUE'] as $key => $answer): ?>
                                <label class="checkbox-element">
                                    <?= $answer ?>
                                    <input type="radio" value="<?= $answer ?>" name="auto-sell" data-auto-sell="<?= $key + 1 ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled"><?= $arResult['PROPERTIES']['TEXT_BTN_2_QUIZ']['~VALUE'] ?></div>
                        <?php if (!empty($arResult['PROPERTIES']['IMAGE_STEP_4_2_QUIZ']['VALUE'])): ?>
                            <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_STEP_4_2_QUIZ']['VALUE']) ?>"
                                 width="760" height="430"
                                 alt="<?= $arResult['PROPERTIES']['IMAGE_STEP_4_2_QUIZ']['DESCRIPTION'] ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-quiz__item quiz-finish">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title" id="quiz-finish-title"></h2>
                        <p class="modal-quiz__text" id="quiz-finish-text"></p>
                        <div class="modal-quiz__form form-quiz">
                            <div style="display: none">
                                <div id="ending-title-1">
                                    <?= $arResult['PROPERTIES']['TITLE_END_1_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-text-1">
                                    <?= $arResult['PROPERTIES']['TEXT_END_1_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-title-2">
                                    <?= $arResult['PROPERTIES']['TITLE_END_2_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-text-2">
                                    <?= $arResult['PROPERTIES']['TEXT_END_2_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-title-3">
                                    <?= $arResult['PROPERTIES']['TITLE_END_3_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-text-3">
                                    <?= $arResult['PROPERTIES']['TEXT_END_3_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-title-4">
                                    <?= $arResult['PROPERTIES']['TITLE_END_4_QUIZ']['~VALUE'] ?>
                                </div>
                                <div id="ending-text-4">
                                    <?= $arResult['PROPERTIES']['TEXT_END_4_QUIZ']['~VALUE'] ?>
                                </div>
                            </div>
                            <div class="form-quiz__inputs">
                                <div class="form-quiz__inputs-w">
                                    <div class="form-quiz__input form-quiz__input_name">
                                        <input type="text" id="name" name="name" placeholder="<?= $arResult['PROPERTIES']['PLH_1_QUIZ']['~VALUE'] ?>">
                                    </div>
                                </div>
                                <div class="form-quiz__inputs-w">
                                    <div class="form-quiz__input form-quiz__input_phone">
                                        <input type="tel" id="phone" name="phone" placeholder="<?= $arResult['PROPERTIES']['PLH_2_QUIZ']['~VALUE'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div style="display: none">
                                <input name="ajax" value="quiz">
                                <input name="form" value="<?= $arResult['PROPERTIES']['FORM_NAME_QUIZ']['~VALUE'] ?>">
                                <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                                <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                                <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                                <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                                <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                            </div>
                            <div class="form-quiz__select">
                                <button class="form-quiz__btn" type="submit"><?= $arResult['PROPERTIES']['TEXT_BTN_3_QUIZ']['~VALUE'] ?></button>
                                <?php if (!empty($fileId) && !empty($arResult['PROPERTIES']['TEXT_CONSENT']['~VALUE']) && !empty($arResult['PROPERTIES']['TEXT_CONSENT']['~DESCRIPTION'])): ?>
                                <p class="form-quiz__text">
                                    <?= $arResult['PROPERTIES']['TEXT_CONSENT']['~VALUE'] ?>
                                    <a href="<?= CFile::GetPath($fileId) ?>" target="_blank" rel="noopener noreferrer"><?= $arResult['PROPERTIES']['TEXT_CONSENT']['~DESCRIPTION'] ?></a>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
