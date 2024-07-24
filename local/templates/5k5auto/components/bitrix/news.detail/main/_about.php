<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$videoId = \classes\Helpers\Generic::getYoutubeData($arResult['PROPERTIES']['YOUTUBE_LINK_ABOUT']['~VALUE'])['VIDEO'] ?: '';
?>
<section class="information next-section">
    <div class="container">
        <h2 class="information__title"><?= $arResult['PROPERTIES']['TITLE_ABOUT']['~VALUE'] ?></h2>
        <div class="information__cards information-cards">
            <?php if (!empty($arResult['PROPERTIES']['NUMBER_1_ABOUT']['~VALUE']) && !empty($arResult['PROPERTIES']['DESC_1_ABOUT']['~VALUE'])): ?>
                <div class="information-cards__item">
                    <div class="information-cards__content">
                        <div class="information-cards__number"
                             id="card-years"><?= $arResult['PROPERTIES']['NUMBER_1_ABOUT']['~VALUE'] ?></div>
                        <p class="information-cards__text"><?= $arResult['PROPERTIES']['DESC_1_ABOUT']['~VALUE'] ?></p>
                    </div>
                    <?php if (!empty($arResult['PROPERTIES']['IMAGE_1_ABOUT']['~VALUE'])): ?>
                        <img class="information-cards__img" width="338" height="425"
                             src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_1_ABOUT']['~VALUE']) ?>"
                             alt="<?= $arResult['PROPERTIES']['IMAGE_1_ABOUT']['DESCRIPTION'] ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($arResult['PROPERTIES']['NUMBER_2_ABOUT']['~VALUE']) && !empty($arResult['PROPERTIES']['DESC_2_ABOUT']['~VALUE'])): ?>
                <div class="information-cards__item">
                    <div class="information-cards__content">
                        <div class="information-cards__number"
                             id="card-projects"><?= $arResult['PROPERTIES']['NUMBER_2_ABOUT']['~VALUE'] ?></div>
                        <p class="information-cards__text"><?= $arResult['PROPERTIES']['DESC_2_ABOUT']['~VALUE'] ?></p>
                    </div>
                    <?php if (!empty($arResult['PROPERTIES']['IMAGE_2_ABOUT']['~VALUE'])): ?>
                        <img class="information-cards__img" width="338" height="425"
                             src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_2_ABOUT']['~VALUE']) ?>"
                             alt="<?= $arResult['PROPERTIES']['IMAGE_2_ABOUT']['DESCRIPTION'] ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($arResult['PROPERTIES']['NUMBER_3_ABOUT']['~VALUE']) && !empty($arResult['PROPERTIES']['DESC_3_ABOUT']['~VALUE'])): ?>
                <div class="information-cards__item">
                    <div class="information-cards__content">
                        <div class="information-cards__number"
                             id="card-specialists"><?= $arResult['PROPERTIES']['NUMBER_3_ABOUT']['~VALUE'] ?></div>
                        <p class="information-cards__text"><?= $arResult['PROPERTIES']['DESC_3_ABOUT']['~VALUE'] ?></p>
                    </div>
                    <?php if (!empty($arResult['PROPERTIES']['IMAGE_3_ABOUT']['~VALUE'])): ?>
                        <img class="information-cards__img" width="338" height="425"
                             src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_3_ABOUT']['~VALUE']) ?>"
                             alt="<?= $arResult['PROPERTIES']['IMAGE_3_ABOUT']['DESCRIPTION'] ?>">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!empty($arResult['PROPERTIES']['TEXT_ABOUT']['~VALUE']['TEXT'])): ?>
            <div class="information__info info">
                <p class="info__text">
                    <?= $arResult['PROPERTIES']['TEXT_ABOUT']['~VALUE']['TEXT'] ?>
                </p>
                <?php if (!empty($videoId)): ?>
                    <div class="info__video" data-video="https://www.youtube.com/watch?v=<?= $videoId ?>">
                        <img src="//img.youtube.com/vi/<?= $videoId ?>/maxresdefault.jpg" alt="preview">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
