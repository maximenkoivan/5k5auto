<?php

use classes\Helpers\Generic;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$slides = \classes\Models\FiveKFiveAuto\Content\Portfolio::getInstance()->getElements()->getResult();
?>
<?php if (!empty($slides)): ?>
    <section class="portfolio">
        <div class="container">
            <h2 class="portfolio__title"><?= $arResult['PROPERTIES']['TITLE_PORTFOLIO']['~VALUE'] ?></h2>
            <div class="portfolio__slider">
                <div class="swiper portfolio-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($slides as $slide): ?>
                            <?php if (empty($slide['IMAGES']['VALUE'])) continue ?>
                            <div class="swiper-slide">
                                <div class="portfolio-card">
                                    <div class="portfolio-card__content">
                                        <?php foreach ($slide['IMAGES']['VALUE'] as $key => $imageId): ?>
                                            <?php if (!empty($slide['IMAGES']['DESCRIPTION'][$key])): ?>
                                                <div class="portfolio-card__video"
                                                     data-video="<?= $slide['IMAGES']['DESCRIPTION'][$key] ?>">
                                                    <img src="<?= CFile::GetPath($imageId) ?>"
                                                         alt="<?= $slide['DESCRIPTION']['~VALUE'] ?>">
                                                </div>
                                            <?php else: ?>
                                                <a class="portfolio-card__image"
                                                   href="<?= CFile::GetPath($slide['IMAGES']['VALUE'][0]) ?>"
                                                   data-fancybox="gallery">
                                                    <img src="<?= CFile::GetPath($slide['IMAGES']['VALUE'][0]) ?>"
                                                         alt="<?= $slide['IMAGES']['DESCRIPTION'][0] ?>">
                                                </a>
                                            <?php endif; ?>
                                            <?php unset ($slide['IMAGES']['VALUE'][$key]); break ?>
                                        <?php endforeach; ?>
                                        <div class="portfolio-card__images gallery">
                                            <?php foreach ($slide['IMAGES']['VALUE'] as $key => $imageId): ?>
                                                <?php if ($key > 3) continue ?>
                                                <a class="gallery__item"
                                                   href="<?= CFile::GetPath($imageId) ?>"
                                                   data-fancybox="gallery">
                                                    <img src="<?= CFile::GetPath($imageId) ?>"
                                                         alt="<?= $slide['IMAGES']['DESCRIPTION'][$key] ?>">
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="portfolio-card__signature">
                                        <?= $slide['DESCRIPTION']['~VALUE'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="swiper-button-prev" tabindex="0"></button>
                <button class="swiper-button-next" tabindex="0"></button>
            </div>
        </div>
    </section>
<?php endif; ?>