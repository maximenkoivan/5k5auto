<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$reviews = \classes\Models\FiveKFiveAuto\Content\Reviews::getInstance()->getElements()->getResult();
?>
<?php if (!empty($reviews)): ?>
    <section class="reviews">
        <div class="container">
            <h2 class="reviews__title">Отзывы</h2>
            <div class="reviews__slider">
                <div class="swiper reviews-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($reviews as $review): ?>
                            <?php if (empty($review['PHOTO_AUTO']['VALUE'])) continue ?>
                            <div class="swiper-slide">
                                <div class="reviews-card">
                                    <div class="reviews-card__content">
                                        <div class="reviews-card__img card-img">
                                            <?php if (!empty($review['PHOTO_AUTO']['VALUE'])): ?>
                                                <img class="card-img__car" width="550" height="356"
                                                     src="<?= CFile::GetPath($review['PHOTO_AUTO']['VALUE']) ?>"
                                                     alt="<?= $review['PHOTO_AUTO']['DESCRIPTION'] ?>">
                                            <?php endif; ?>
                                            <?php if (!empty($review['PHOTO_AUTHOR']['VALUE'])): ?>
                                                <div class="card-img__avatar">
                                                    <img class="card-img__user" width="130" height="130"
                                                         src="<?= CFile::GetPath($review['PHOTO_AUTHOR']['VALUE']) ?>"
                                                         alt="<?= $review['NAME_AUTHOR']['VALUE'] ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <h3 class="reviews-card__title"><?= $review['NAME_AUTHOR']['VALUE'] ?></h3>
                                        <p class="reviews-card__text">
                                            <?= $review['~PREVIEW_TEXT'] ?>
                                        </p>
                                    </div>
                                    <div class="reviews-card__signature"><?= $review['PHOTO_AUTO']['DESCRIPTION'] ?></div>
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