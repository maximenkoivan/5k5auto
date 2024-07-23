<?php

use classes\Helpers\Generic;
use classes\Models\FiveKFiveAuto\Feedback\FormSettings;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$footerData = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByPostfix('FOOTER')->cashed('footer')->getResult();
?>
<footer class="footer" id="footer">
    <div class="container">
        <div class="footer-info">
            <div class="footer-info__left">
                <a class="footer-info__logo">
                    <?php if (!empty($footerData['LOGO_FOOTER']['VALUE'])): ?>
                        <a href="<?= $footerData['LOGO_FOOTER']['DESCRIPTION'] ?>" target="_blank"
                           rel="noopener noreferrer">
                            <img src="<?= CFile::GetPath($footerData['LOGO_FOOTER']['VALUE']) ?>" width="98" height="77"
                                 alt="<?= $footerData['LOGO_FOOTER']['DESCRIPTION'] ?>">
                        </a>
                    <?php endif; ?>
            </div>
            <p class="footer-info__adress">
                <?= $footerData['ADDRESS_FOOTER']['~VALUE'] ?>
            </p>
            <ul class="footer-info__social">
                <?php foreach ($footerData['SOCNET_FOOTER']['VALUE'] as $key => $imageId): ?>
                    <li>
                        <a href="<?= $footerData['SOCNET_FOOTER']['DESCRIPTION'][$key] ?>" target="_blank">
                            <img src="<?= CFile::GetPath($imageId) ?>"
                                 alt="<?= $footerData['SOCNET_FOOTER']['DESCRIPTION'][$key] ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-info__right">
            <?php if (!empty($footerData['BTN_TEXT_FOOTER']['~VALUE'])): ?>
                <button class="footer-info__order" data-src="#modal-call">
                    <?= $footerData['BTN_TEXT_FOOTER']['~VALUE'] ?>
                </button>
            <?php endif; ?>
            <ul class="footer-info__contacts">
                <?php if (!empty($footerData['PHONE_FOOTER']['~VALUE'])): ?>
                    <li><a href="tel:<?= Generic::getCleanPhoneNumber($footerData['PHONE_FOOTER']['~VALUE']) ?>"
                           target="_blank"
                           rel="noopener noreferrer"><?= $footerData['PHONE_FOOTER']['~VALUE'] ?></a></li>
                <?php endif; ?>
                <?php if (!empty($footerData['EMAIL_FOOTER']['~VALUE'])): ?>
                    <li><a href="mailto:<?= $footerData['EMAIL_FOOTER']['~VALUE'] ?>" target="_blank"
                           rel="noopener noreferrer"><?= $footerData['EMAIL_FOOTER']['~VALUE'] ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="footer-copyright__left">
            <p class="footer-copyright__text"><?= str_replace('#YEAR#', date('Y'), $footerData['COPYRIGHT_FOOTER']['~VALUE']) ?></p>
            <ul class="footer-copyright__documentation">
                <?php if (!empty($footerData['POLICY_FOOTER']['VALUE'])): ?>
                    <li>
                        <a href="<?= CFile::GetPath($footerData['POLICY_FOOTER']['VALUE']) ?>" target="_blank"
                           rel="noopener noreferrer"><?= $footerData['POLICY_FOOTER']['DESCRIPTION'] ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="footer-copyright__right">
            <ul class="footer-copyright__links">
                <li>
                    <a href="https://d-option.ru" target="_blank" rel="noopener noreferrer">Разработано веб-студией
                        Digital Option</a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</footer>
<?php if (!empty($footerData['WHATSAPP_FOOTER']['VALUE'])): ?>
    <a href="<?= $footerData['WHATSAPP_FOOTER']['DESCRIPTION'] ?>" target="_blank" class="wa-call">
        <img src="<?= CFile::GetPath($footerData['WHATSAPP_FOOTER']['VALUE']) ?>" height="60" width="60" alt="whatsapp">
    </a>
<?php endif; ?>

<a href="#top" class="button-up">
    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M8.8443 4.26471L2.26421 11.0343L0.611816 9.33431L8.8443 0.864746L17.0768 9.33431L15.4244 11.0343L8.8443 4.26471Z"
              fill="white"></path>
    </svg>
</a>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "modal",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "BROWSER_TITLE" => "-",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "N",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "N",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_CODE" => "settings",
        "ELEMENT_ID" => "",
        "FIELD_CODE" => array(""),
        "GROUP_PERMISSIONS" => array(""),
        "IBLOCK_ID" => FormSettings::getInstance()->getIblockId(),
        "IBLOCK_TYPE" => "5k5auto",
        "IBLOCK_URL" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "PAGER_BASE_LINK" => "",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_PARAMS_NAME" => "r",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_TEMPLATE" => "",
        "PAGER_TITLE" => "Страница",
        "PROPERTY_CODE" => array("*"),
        "SET_BROWSER_TITLE" => "N",
        "SET_CANONICAL_URL" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHARE_HIDE" => "N",
        "SHARE_SHORTEN_URL_KEY" => "",
        "SHARE_SHORTEN_URL_LOGIN" => "",
        "SHARE_TEMPLATE" => "",
        "SHOW_404" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_SHARE" => "N"
    )
); ?>
</body>
</html>