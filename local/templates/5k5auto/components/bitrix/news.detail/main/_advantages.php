<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<?php if (!empty($arResult['PROPERTIES']['ELEMENTS_ADVANTAGES']['VALUE'])): ?>
    <section class="section-wrapper why-us gr-background">
        <div class="container">
            <h2 class="section-heading kc-bold t-center"><?= $arResult['PROPERTIES']['TITLE_ADVANTAGES']['VALUE'] ?></h2>
            <div class="whyus-row">
                <?php foreach ($arResult['PROPERTIES']['ELEMENTS_ADVANTAGES']['VALUE'] as $advantage): ?>
                    <?php if (empty($advantage['SUB_VALUES']['IMAGE_ELEMENT_ADVANTAGES']['VALUE'])) continue; ?>
                    <div class="whyus-grid-col">
                        <div class="icon-text-box gr-background d-flex justify-content-center align-items-center flex-column">
                            <div class="icon-box">
                                <img src="<?= CFile::GetPath($advantage['SUB_VALUES']['IMAGE_ELEMENT_ADVANTAGES']['VALUE']) ?>"
                                     alt="<?= $advantage['SUB_VALUES']['TITLE_ELEMENT_ADVANTAGES']['VALUE'] ?>">
                            </div>
                            <h3 class="icon-text-box-heading kc-bold"><?= $advantage['SUB_VALUES']['TITLE_ELEMENT_ADVANTAGES']['VALUE'] ?></h3>
                            <p class="icon-text">
                                <?= $advantage['SUB_VALUES']['DESC_ELEMENT_ADVANTAGES']['VALUE'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>