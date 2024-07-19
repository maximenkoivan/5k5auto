<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
if (!empty($arResult['PROPERTIES']['DESC_STAGES']['VALUE'])) {
    $firstElement = array_shift($arResult['PROPERTIES']['DESC_STAGES']['~VALUE']);
    $elements = array_chunk($arResult['PROPERTIES']['DESC_STAGES']['~VALUE'], 2, true);
    array_unshift($elements, [$firstElement]);
}
?>
<?php if (!empty($elements)): ?>
    <section class="section-wrapper how-we-work pb-0">
        <div class="lines-bg lines-bg-reverse"></div>
        <div class="container">
            <h2 class="section-heading kc-bold d-md-none d-block"><?= $arResult['PROPERTIES']['TITLE_STAGES']['~VALUE'] ?></h2>
            <div class="row flex-md-row flex-column-reverse">
                <div class="col-lg-auto work-col-1">
                    <h2 class="section-heading kc-bold d-md-block d-none"><?= $arResult['PROPERTIES']['TITLE_STAGES']['~VALUE'] ?></h2>
                    <?php if (!empty($arResult['PROPERTIES']['IMAGE_STAGES']['VALUE'])): ?>
                        <div class="tech-img-2 d-flex align-items-end">
                            <img src="<?= CFile::GetPath($arResult['PROPERTIES']['IMAGE_STAGES']['VALUE']) ?>"
                                 alt="<?= $arResult['PROPERTIES']['IMAGE_STAGES']['DESCRIPTION'] ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg work-col-2">
                    <ul class="how-we-work-list row">
                        <?php foreach ($elements as $num => $element): ?>
                            <?php foreach ($element as $key => $text): ?>
                                <li class="how-we-work-list-item d-flex align-items-end col-6 px-0 gr-background"
                                    data-count="0<?= $num > 0 ? ++$key + 1 : ++$key ?>">
                                    <div class="how-we-work-list-item-inner d-flex align-items-center flex-column">
                                        <?php if ($num > 0 && $num % 2 > 0): ?>
                                            <svg class="mb-2" width="35" height="35" viewBox="0 0 35 35" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M35 17.5C35 27.165 27.165 35 17.5 35C7.83502 35 0 27.165 0 17.5C0 7.83502 7.83502 0 17.5 0C27.165 0 35 7.83502 35 17.5Z"
                                                      fill="#F31842"/>
                                                <path d="M16.9753 21.9815C16.5601 22.4202 15.8538 22.3935 15.4729 21.9248L12.6768 18.4838C12.3577 18.0912 12.3965 17.5187 12.7656 17.1727C13.1664 16.797 13.7996 16.8317 14.1569 17.2489L15.6444 18.9857C16.0343 19.4409 16.7342 19.4533 17.1399 19.0122L21.8735 13.8664C22.2654 13.4403 22.936 13.435 23.3346 13.8547L23.3489 13.8697C23.7149 14.2552 23.7154 14.8597 23.3501 15.2457L16.9753 21.9815Z"
                                                      fill="white"/>
                                            </svg>
                                        <?php endif; ?>
                                        <span><?= $text ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <div class="text-bg kc-bold">
        <div class="container d-flex justify-content-end">
            <span><?= $arResult['PROPERTIES']['TEXT_STAGES']['VALUE'] ?></span>
        </div>
    </div>
<?php endif; ?>