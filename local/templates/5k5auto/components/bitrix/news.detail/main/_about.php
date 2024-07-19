<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<section class="section-wrapper about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-auto custom-col-1 d-flex justify-content-between flex-column">
                <div class="about-text">
                    <h2 class="section-heading kc-bold mb-2"><?= $arResult['PROPERTIES']['TITLE_ABOUT']['~VALUE'] ?></h2>
                    <p class="section-txt"><?= $arResult['PROPERTIES']['TEXT_ABOUT']['~VALUE']['TEXT'] ?? '' ?></p>
                </div>
                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_ABOUT']['VALUE'])): ?>
                    <div class="popup-cta-block">
                        <h3 class="popup-cta-block-heading kc-bold">
                            <?= $arResult['PROPERTIES']['DESC_BTN_ABOUT']['~VALUE'] ?>
                        </h3>

                        <div class="popup-cta-button d-flex">
                            <a href="javascript:;" data-fancybox data-src="#modal-quiz"
                               class="button-element white-button hero-button px-2" role="button">
                                <?= $arResult['PROPERTIES']['TEXT_BTN_ABOUT']['VALUE'] ?>
                            </a>
                            <svg class="ml-md-5 ml-2" width="72" height="39" viewBox="0 0 72 39" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.25552 30.8502L2.02003 32.7325C37.4297 37.153 63.6465 20.4291 71.243 1.62577L69.4838 0.91448C62.16 19.0475 36.7139 35.1521 2.25552 30.8502Z"
                                      fill="white"/>
                                <path d="M8.12915e-05 31.3637L7.79077 38.2118L9.29313 36.5021L3.87033 31.7344L10.3926 27.9127L9.24121 25.9482L8.12915e-05 31.3637Z"
                                      fill="white"/>
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($arResult['PROPERTIES']['IMAGE_ABOUT']['VALUE'])): ?>
                <div class="col-lg-auto custom-col-2 d-flex align-items-lg-end justify-content-end">
                    <div class="worker-img">
                        <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_ABOUT']['VALUE']) ?>"
                             alt="<?= $arResult['PROPERTIES']['IMAGE_ABOUT']['DESCRIPTION'] ?>">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
