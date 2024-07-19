<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<?php if (!empty($arResult['PROPERTIES']['IMAGE_EXAMPLES']['VALUE'])): ?>
    <section class="section-wrapper our-work gr-background">
        <div class="container">
            <h2 class="section-heading kc-bold t-center mb-4"><?= $arResult['PROPERTIES']['TITLE_EXAMPLES']['~VALUE'] ?></h2>
            <div class="mediaSlider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($arResult['PROPERTIES']['IMAGE_EXAMPLES']['VALUE'] as $key => $image): ?>
                        <div class="swiper-slide">
                            <a href="<?= $arResult['PROPERTIES']['IMAGE_EXAMPLES']['DESCRIPTION'][$key] ?: CFile::GetPath($image) ?>"
                               data-fancybox
                               class="workBox <?= !empty($arResult['PROPERTIES']['IMAGE_EXAMPLES']['DESCRIPTION'][$key]) ? 'isVideo' : '' ?>">
                                <img src="<?= CFile::GetPath($image) ?>"
                                     alt="<?= CFile::GetFileArray($image)['ORIGINAL_NAME'] ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (count($arResult['PROPERTIES']['IMAGE_EXAMPLES']['VALUE']) > 6): ?>
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