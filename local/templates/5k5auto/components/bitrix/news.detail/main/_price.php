<?php

use classes\Helpers\FilesHelper;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$services = \classes\Models\FiveKFiveAuto\Content\Price::getInstance()->getElements()->getResult();
?>
<?php if (!empty($services)): ?>
    <section class="price-list">
        <div class="container">
            <h2 class="price-list__title"><?= $arResult['PROPERTIES']['TITLE_PRICE']['~VALUE'] ?></h2>
            <div class="price-list__items price-cards">
                <?php foreach ($services as $service): ?>
                    <div class="price-cards__item">
                        <div class="price-cards__img">
                            <img width="380" height="170"
                                 src="<?= FilesHelper::getImageById($service['IMAGE']['VALUE']) ?>"
                                 alt="<?= $service['NAME'] ?>">
                        </div>
                        <h3 class="price-cards__cost"><?= $service['PRICE']['~VALUE'] ?></h3>
                        <p class="price-cards__name"><?= $service['NAME'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="price-list__selects selects-buttons">
                <?php if (!empty($arResult['PROPERTIES']['TEXT_BTN_PRICE']['VALUE'])): ?>
                    <button class="selects-buttons__btn"
                            data-src="#modal-call"><?= $arResult['PROPERTIES']['TEXT_BTN_PRICE']['VALUE'] ?>
                    </button>
                <?php endif; ?>
                <?php if (!empty($arResult['PROPERTIES']['FILE_PRICE']['VALUE']) && !empty($arResult['PROPERTIES']['FILE_PRICE']['DESCRIPTION'])): ?>
                    <a class="selects-buttons__link"
                       href="<?= CFile::GetPath($arResult['PROPERTIES']['FILE_PRICE']['VALUE']) ?>" target="_blank"
                       rel="noopener noreferrer"><?= $arResult['PROPERTIES']['FILE_PRICE']['DESCRIPTION'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

