<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<?php if (!empty($arResult['PROPERTIES']['IMAGE_CLIENTS']['VALUE'])): ?>
    <section class="section-wrapper clients-section">
        <div class="container">
            <h2 class="section-heading kc-bold t-center"><?= $arResult['PROPERTIES']['TITLE_CLIENTS']['~VALUE'] ?></h2>
            <div class="clientsSlider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($arResult['PROPERTIES']['IMAGE_CLIENTS']['VALUE'] as $key => $image): ?>
                        <div class="swiper-slide">
                            <div class="client-box-image gr-background">
                                <img src="<?= CFile::GetPath($image) ?>"
                                     alt="<?= $arResult['PROPERTIES']['IMAGE_CLIENTS']['DESCRIPTION'][$key] ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (count($arResult['PROPERTIES']['IMAGE_CLIENTS']['VALUE']) > 4): ?>
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