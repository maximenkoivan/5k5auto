<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<?php if (!empty($arResult['PROPERTIES']['TEXT_FACTOIDS']['VALUE'])): ?>
    <section class="section-wrapper inumbers-section pb-0">
        <div class="lines-bg lines-bg-reverse"></div>
        <div class="container">
            <div class="row flex-md-row flex-row-reverse">
                <div class="col-md-6 col-12 d-flex flex-column align-items-end">
                    <?php foreach ($arResult['PROPERTIES']['TEXT_FACTOIDS']['VALUE'] as $key => $factoid): ?>
                        <?php if (empty($arResult['PROPERTIES']['TEXT_FACTOIDS']['~DESCRIPTION'][$key])) continue; ?>
                        <div class="inumbers-item d-flex align-items-end justify-content-end gr-background <?= $key % 2 == 0 ? '' : 'align-self-md-start align-self-end' ?>">
                            <div>
                        <span>
                            <svg class="mr-lg-3 mr-2" width="35" height="35" viewBox="0 0 35 35" fill="none"
                                 xmlns="http://www.w3.org/2000/svg"> <path
                                        d="M35 17.5C35 27.165 27.165 35 17.5 35C7.83502 35 0 27.165 0 17.5C0 7.83502 7.83502 0 17.5 0C27.165 0 35 7.83502 35 17.5Z"
                                        fill="#F31842"/> <path
                                        d="M16.9753 21.9815C16.5601 22.4202 15.8538 22.3935 15.4729 21.9248L12.6768 18.4838C12.3577 18.0912 12.3965 17.5187 12.7656 17.1727C13.1664 16.797 13.7996 16.8317 14.1569 17.2489L15.6444 18.9857C16.0343 19.4409 16.7342 19.4533 17.1399 19.0122L21.8735 13.8664C22.2654 13.4403 22.936 13.435 23.3346 13.8547L23.3489 13.8697C23.7149 14.2552 23.7154 14.8597 23.3501 15.2457L16.9753 21.9815Z"
                                        fill="white"/> </svg>
                            <span class="inumbers-item-heading kc-bold-it">
                                <?= $arResult['PROPERTIES']['TEXT_FACTOIDS']['~DESCRIPTION'][$key] ?>
                            </span>
                        </span>
                                <p><?= $factoid ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (!empty($arResult['PROPERTIES']['IMAGE_FACTOIDS']['VALUE'])): ?>
                    <div class="col-md-6 p-lg-nrel col-auto d-flex align-items-end">
                        <div class="tech-img d-flex align-items-end">
                            <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_FACTOIDS']['VALUE']) ?>"
                                 alt="<?= $arResult['PROPERTIES']['IMAGE_FACTOIDS']['DESCRIPTION'] ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>