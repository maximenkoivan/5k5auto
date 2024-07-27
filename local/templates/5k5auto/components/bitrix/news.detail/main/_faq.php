<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$questions = \classes\Models\FiveKFiveAuto\Content\Faq::getInstance()->getElements()->getResult();
?>
<?php if (!empty($questions)): ?>
    <section class="faq">
        <div class="container">
            <h2 class="faq__title"><?= $arResult['PROPERTIES']['TITLE_FAQ']['~VALUE'] ?></h2>
            <div class="faq__accordion accordion">
                <?php foreach ($questions as $question): ?>
                    <?php if (empty($question['QUESTION']['~VALUE']['TEXT']) || empty($question['ANSWER']['~VALUE']['TEXT'])) continue ?>
                    <div class="accordion__item">
                        <button class="accordion__button"><?= $question['QUESTION']['~VALUE']['TEXT'] ?></button>
                        <div class="accordion__content">
                            <p><?= $question['ANSWER']['~VALUE']['TEXT'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
