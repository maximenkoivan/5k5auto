<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<?php if (!empty($arResult['PROPERTIES']['SLIDER_PROMO']['~VALUE'])): ?>
    <section class="section-wrapper hero-section gr-background py-0">
        <div class="lines-bg"></div>
        <div class="container">

            <div class="hero-slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($arResult['PROPERTIES']['SLIDER_PROMO']['~VALUE'] as $slide): ?>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-lg-6 d-lg-block d-none">
                                    <?php if (!empty($slide['SUB_VALUES']['IMAGE_PROMO']['VALUE'])): ?>
                                        <div class="pr-xl-5">
                                            <img src="<?= CFile::GetPath($slide['SUB_VALUES']['IMAGE_PROMO']['VALUE']) ?>"
                                                 alt="<?= $slide['SUB_VALUES']['TITLE_PROMO']['VALUE'] ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6">

                                    <h1 class="hero-title kc-bold">
                                        <?= $slide['SUB_VALUES']['TITLE_PROMO']['~VALUE'] ?>
                                    </h1>

                                    <div class="hero-contents">
                                        <?= $slide['SUB_VALUES']['DESC_PROMO']['~VALUE']['TEXT'] ?? '' ?>
                                    </div>

                                    <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'])): ?>
                                        <a href="javascript:" data-fancybox data-src="#modal-quiz"
                                           class="button-element hero-button px-2 mr-2 gradient-button" role="button">
                                            <?= $arResult['PROPERTIES']['TEXT_BTN_1_PROMO']['~VALUE'] ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'])): ?>
                                        <a href="javascript:" data-fancybox data-src="#modal-consult"
                                           class="button-element hero-button px-2 mr-2" role="button">
                                            <?= $arResult['PROPERTIES']['TEXT_BTN_2_PROMO']['~VALUE'] ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (count($arResult['PROPERTIES']['SLIDER_PROMO']['~VALUE']) > 1): ?>
                    <div class="swiper-button-prev">
                        <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.47101 8.94922L10.2406 2.36913L8.5406 0.716736L0.0710449 8.94922L8.5406 17.1817L10.2406 15.5293L3.47101 8.94922Z"
                                  fill="white"/>
                        </svg>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next">
                        <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.52899 8.94922L0.759412 2.36913L2.4594 0.716736L10.929 8.94922L2.4594 17.1817L0.759412 15.5293L7.52899 8.94922Z"
                                  fill="white"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>