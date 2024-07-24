<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$fileId = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult()[0] ?: ''
?>
<section class="consultation">
    <div class="container">
        <h2 class="consultation__title"><?= $arResult['PROPERTIES']['TITLE_CONSULTATION']['~VALUE'] ?></h2>
        <div class="consultation__offer offer">
            <div class="offer__content">
                <h3 class="offer__title"><?= $arResult['PROPERTIES']['SUBTITLE_CONSULTATION']['~VALUE'] ?></h3>
                <p class="offer__text"><?= $arResult['PROPERTIES']['TEXT_CONSULTATION']['~VALUE'] ?></p>
                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_CONSULTATION']['~VALUE'])): ?>
                    <button class="offer__btn"
                            data-src="#modal-call"><?= $arResult['PROPERTIES']['TEXT_BTN_CONSULTATION']['~VALUE'] ?></button>
                <?php endif; ?>
                <?php if (!empty($arResult['PROPERTIES']['TEXT_CONSENT_CONSULTATION']['~VALUE']) && !empty($arResult['PROPERTIES']['TEXT_CONSENT_CONSULTATION']['~DESCRIPTION']) && !empty($fileId)): ?>
                    <p class="offer__text offer__text_policy">
                        <?= $arResult['PROPERTIES']['TEXT_CONSENT_CONSULTATION']['~VALUE'] ?>
                        <a href="<?= CFile::GetPath($fileId) ?>"
                           target="_blank"><?= $arResult['PROPERTIES']['TEXT_CONSENT_CONSULTATION']['~DESCRIPTION'] ?></a>
                    </p>
                <?php endif; ?>
            </div>
            <?php if (!empty($arResult['PROPERTIES']['IMAGE_CONSULTATION']['VALUE'])): ?>
                <div class="offer__image">
                    <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_CONSULTATION']['VALUE']) ?>"
                         alt="<?= $arResult['PROPERTIES']['IMAGE_CONSULTATION']['DESCRIPTION'] ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>