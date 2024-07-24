<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$advantages = \classes\Models\FiveKFiveAuto\Content\Advantages::getInstance()->getElements()->getResult();
?>
<?php if (!empty($advantages)): ?>
    <section class="advantages">
        <div class="container">
            <h2 class="advantages__title"><?= $arResult['PROPERTIES']['TITLE_ADVANTAGES']['~VALUE'] ?></h2>
            <div class="advantages__list advantages-cards">
                <?php foreach ($advantages as $key => $advantage): ?>
                    <?php if (empty($advantage['IMAGE']['VALUE']) || empty($advantage['DESCRIPTION']['~VALUE'])) continue ?>
                    <?php if ($key % 2 === 0): ?>
                        <div class="advantages-cards__item">
                            <div class="advantages-cards__img">
                                <img width="126" height="126" src="<?= CFile::GetPath($advantage['IMAGE']['VALUE']) ?>"
                                     alt="<?= $advantage['DESCRIPTION']['~VALUE'] ?>">
                            </div>
                            <p class="advantages-cards__text">
                                <?= $advantage['DESCRIPTION']['~VALUE'] ?>
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="advantages-cards__item">
                            <div class="advantages-cards__img">
                                <img width="90" height="90" src="<?= CFile::GetPath($advantage['IMAGE']['VALUE']) ?>"
                                     alt="<?= $advantage['DESCRIPTION']['~VALUE'] ?>">
                            </div>
                            <p class="advantages-cards__text">
                                <?= $advantage['DESCRIPTION']['~VALUE'] ?>
                            </p>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

