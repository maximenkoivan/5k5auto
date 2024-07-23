<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<section class="hero">
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <?php if (!empty($arResult['PROPERTIES']['IMAGE_SLIDE_1_PROMO']['VALUE'])): ?>
                <div class="swiper-slide">
                    <div class="hero-slider__inner hero-slide"
                         style="background-image: url('<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_SLIDE_1_PROMO']['VALUE']) ?>');">
                        <div class="container">
                            <div class="hero-slide__content">
                                <h1 class="hero-slide__title"><?= $arResult['PROPERTIES']['TITLE_SLIDE_1_PROMO']['~VALUE'] ?></h1>
                                <p class="hero-slide__text hero-slide__text_position">
                                    <?= $arResult['PROPERTIES']['SUBTITLE_SLIDE_1_PROMO']['~VALUE'] ?>
                                </p>
                            </div>
                            <div class="hero-slide__selects hero-buttons">
                                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'])): ?>
                                    <button class="hero-buttons__order"
                                            data-src="#modal-call"><?= $arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'] ?></button>
                                <?php endif; ?>
                                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'])): ?>
                                    <button class="hero-buttons__consultation"
                                            data-src="#modal-quiz"><?= $arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'] ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($arResult['PROPERTIES']['IMAGE_SLIDE_2_PROMO']['VALUE'])): ?>
                <div class="swiper-slide">
                    <div class="hero-slider__inner hero-slide"
                         style="background-image: url('<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_SLIDE_2_PROMO']['VALUE']) ?>');">
                        <div class="container">
                            <div class="hero-slide__content">
                                <h1 class="hero-slide__title"><?= $arResult['PROPERTIES']['TITLE_SLIDE_2_PROMO']['~VALUE'] ?></h1>
                                <p class="hero-slide__text">
                                    <?= $arResult['PROPERTIES']['SUBTITLE_SLIDE_2_PROMO']['~VALUE'] ?>
                                </p>
                            </div>
                            <div class="hero-slide__selects hero-buttons">
                                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'])): ?>
                                    <button class="hero-buttons__order"
                                            data-src="#modal-call"><?= $arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'] ?></button>
                                <?php endif; ?>
                                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'])): ?>
                                    <button class="hero-buttons__consultation"
                                            data-src="#modal-quiz"><?= $arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'] ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($arResult['PROPERTIES']['IMAGE_SLIDE_3_PROMO']['VALUE'])): ?>
                <div class="swiper-slide">
                    <div class="hero-slider__inner hero-slide"
                         style="background-image: url('<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_SLIDE_3_PROMO']['VALUE']) ?>');">
                        <div class="container">
                            <div class="hero-slide__content">
                                <h1 class="hero-slide__title"><?= $arResult['PROPERTIES']['TITLE_SLIDE_3_PROMO']['~VALUE'] ?></h1>
                                <p class="hero-slide__text">
                                    <?= $arResult['PROPERTIES']['SUBTITLE_SLIDE_3_PROMO']['~VALUE'] ?>
                                </p>
                            </div>
                            <div class="hero-slide__selects hero-buttons">
                                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'])): ?>
                                    <button class="hero-buttons__order"
                                            data-src="#modal-call"><?= $arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'] ?></button>
                                <?php endif; ?>
                                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'])): ?>
                                    <button class="hero-buttons__consultation"
                                            data-src="#modal-quiz"><?= $arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'] ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
