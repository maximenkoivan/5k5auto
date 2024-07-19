<?php

use classes\Helpers\Generic;
use classes\Models\ReplaceGlazing\Feedback\FormSettings;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$footerData = \classes\Models\ReplaceGlazing\Common\CommonData::getInstance()->getPropertiesByPostfix('FOOTER')->cashed('footer')->getResult();
?>
<footer class="footer-section mt-md-5 mt-4">
    <div class="container">
        <div class="footer-info d-flex justify-content-md-between align-items-md-start align-items-center flex-lg-nowrap flex-wrap flex-md-row flex-column">
            <?php if (!empty($footerData['LOGO_FOOTER']['VALUE'])): ?>
                <a href="/" class="footer-logo logo">
                    <picture>
                        <source media="(max-width:767px)"
                                srcset="<?= CFile::GetPath($footerData['LOGO_MOBILE_FOOTER']['DESCRIPTION']) ?>">
                        <source media="(max-width:1200px)"
                                srcset="<?= CFile::GetPath($footerData['LOGO_TABLET_FOOTER']['DESCRIPTION']) ?>">
                        <img src="<?= CFile::GetPath($footerData['LOGO_FOOTER']['VALUE']) ?>"
                             alt="<?= $footerData['LOGO_FOOTER']['DESCRIPTION'] ?>">
                    </picture>
                </a>
            <?php endif; ?>

            <div class="add-links d-flex justify-content-center align-items-lg-start align-items-center flex-lg-column flex-md-row flex-column pt-lg-2">
                <?php if (!empty($footerData['LINK_FOOTER']['VALUE'])): ?>
                    <a href="<?= $footerData['LINK_FOOTER']['VALUE'] ?>" class="footer-link footer-element mb-lg-5"
                       target="_blank">
                        <?= $footerData['LINK_FOOTER']['~DESCRIPTION'] ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($footerData['POLICY_FOOTER']['VALUE'])): ?>
                    <a href="<?= CFile::GetPath($footerData['POLICY_FOOTER']['VALUE']) ?>" target="_blank"
                       class="footer-link footer-element mb-lg-5">
                        <?= $footerData['POLICY_FOOTER']['~DESCRIPTION'] ?>
                    </a>
                <?php endif; ?>
                <a href="https://d-option.ru/" class="d-lg-none d-block footer-link" target="_blank">
                    Разработано веб-студией «Digital Option»
                </a>
            </div>

            <div class="footer-phones">
                <?php foreach ($footerData['PHONE_FOOTER']['VALUE'] as $phone): ?>
                    <a href="tel:<?= Generic::getCleanPhoneNumber($phone) ?>"
                       class="contact-element lg-contact-font d-flex footer-element">
                        <div class="contact-element-icon gr-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.71325 0.349818C3.25825 -0.105653 2.52183 -0.105653 2.06683 0.349818C1.74755 0.670358 1.38184 1.03659 1.00755 1.4121C-0.634585 3.05764 0.00398374 5.00367 0.994694 7.10832C2.26326 9.80254 6.224 13.9067 8.92533 15.0362C11.0653 15.9314 12.9617 16.666 14.601 15.0233C14.601 15.0233 15.151 14.4744 15.6567 13.9703C15.876 13.7519 15.9988 13.4549 15.9995 13.1451C16.0003 12.8353 15.8774 12.5383 15.6581 12.3191C15.0567 11.7166 14.2996 10.9584 14.0138 10.6721C13.5596 10.2167 12.8224 10.2167 12.3681 10.6721C12.031 11.0105 11.6467 11.3946 11.3353 11.7073C10.9603 12.0828 10.3789 12.1571 9.92173 11.8879C8.39746 10.957 5.08958 7.64737 4.15464 6.0974C3.88535 5.64193 3.95893 5.06224 4.33178 4.68817C4.63893 4.37048 5.02177 3.98713 5.35892 3.64873C5.81321 3.19326 5.81321 2.4551 5.35892 1.99963C4.85607 1.49562 4.21536 0.853823 3.71322 0.350525L3.71325 0.349818ZM8.57173 1.14224C12.0411 1.14224 14.8574 3.95709 14.8574 7.42456C14.8574 7.74011 15.1131 7.99568 15.4288 7.99568C15.7445 7.99568 16.0002 7.74011 16.0002 7.42456C16.0002 3.32675 12.6717 0 8.57173 0C8.25601 0 8.0003 0.255569 8.0003 0.57112C8.0003 0.886671 8.25601 1.14224 8.57173 1.14224ZM8.57173 5.7112C9.51815 5.7112 10.286 6.47864 10.286 7.42456C10.286 7.74011 10.5417 7.99568 10.8574 7.99568C11.1731 7.99568 11.4288 7.74011 11.4288 7.42456C11.4288 5.84827 10.1489 4.56896 8.57173 4.56896C8.25601 4.56896 8.0003 4.82453 8.0003 5.14008C8.0003 5.45563 8.25601 5.7112 8.57173 5.7112ZM8.57173 3.42672C10.7788 3.42672 12.5717 5.21861 12.5717 7.42456C12.5717 7.74011 12.8274 7.99568 13.1431 7.99568C13.4588 7.99568 13.7145 7.74011 13.7145 7.42456C13.7145 4.5876 11.4102 2.28448 8.57173 2.28448C8.25601 2.28448 8.0003 2.54005 8.0003 2.8556C8.0003 3.17115 8.25601 3.42672 8.57173 3.42672Z"
                                      fill="white"></path>
                            </svg>
                        </div>
                        <span><?= $phone ?></span>
                    </a>
                <?php endforeach; ?>
            </div>


            <div class="footer-contact-details">
                <?php if (!empty($footerData['EMAIL_FOOTER']['VALUE'])): ?>
                    <a href="mailto:<?= $footerData['EMAIL_FOOTER']['VALUE'] ?>" class="contact-element footer-element">
                        <div class="contact-element-icon gr-icon">
                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.7111 0.127175C18.4902 0.0448384 18.2502 0 18.0002 0H2.00024C1.75024 0 1.51024 0.0448363 1.28942 0.127175L9.4635 6.97263C9.78433 7.24085 10.216 7.24085 10.5368 6.97263L18.7111 0.127175Z"
                                      fill="white"></path>
                                <path d="M0.263583 0.985545C0.0960819 1.27169 0.000244141 1.60266 0.000244141 1.95646V13.0435C0.000244141 14.1236 0.896074 15 2.00024 15H18.0002C19.1044 15 20.0002 14.1236 20.0002 13.0435V1.95646C20.0002 1.60266 19.9044 1.27169 19.7369 0.985545L11.4037 7.96311C10.5837 8.65034 9.41701 8.65034 8.59707 7.96311L0.263583 0.985545Z"
                                      fill="white"></path>
                            </svg>
                        </div>
                        <span><?= $footerData['EMAIL_FOOTER']['VALUE'] ?></span>
                    </a>
                <?php endif; ?>
                <?php if (!empty($footerData['ADDRESS_FOOTER']['VALUE'])): ?>
                    <div class="contact-element address-contact footer-element">
                        <div class="contact-element-icon">
                            <svg width="27" height="39" viewBox="0 0 27 39" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.4963 0C6.05441 0 0 6.06357 0 13.5163C0 18.8407 3.08842 23.6229 7.90561 25.818L12.2683 38.376C12.3963 38.7437 12.7413 38.9926 13.129 39C13.1346 39 13.1402 39 13.1457 39C13.5278 39 13.8728 38.7641 14.012 38.4076L18.8329 25.9257C23.8096 23.7844 27 18.9577 27 13.5163C26.9963 6.06357 20.9419 0 13.4963 0ZM17.7681 24.3546C17.527 24.4493 17.3378 24.6406 17.2432 24.882L13.1884 35.3767L9.52308 24.8226C9.4359 24.5719 9.24856 24.3731 9.00557 24.271C4.66138 22.4529 1.85491 18.2297 1.85491 13.5144C1.85491 7.085 7.07646 1.85529 13.4963 1.85529C19.918 1.85529 25.1414 7.085 25.1414 13.5144C25.1414 18.3281 22.2477 22.5829 17.7681 24.3546Z"
                                      fill="#F31842"></path>
                                <path d="M13.4963 6.86586C9.83285 6.86586 6.85388 9.84843 6.85388 13.5163C6.85388 17.1823 9.83285 20.1649 13.4963 20.1649C17.1597 20.1649 20.1387 17.1823 20.1387 13.5163C20.1387 9.85029 17.1597 6.86586 13.4963 6.86586ZM13.4963 18.3077C10.8568 18.3077 8.70878 16.159 8.70878 13.5163C8.70878 10.8736 10.8568 8.723 13.4963 8.723C16.1358 8.723 18.2838 10.8736 18.2838 13.5163C18.2838 16.159 16.1358 18.3077 13.4963 18.3077Z"
                                      fill="#F31842"></path>
                            </svg>
                        </div>
                        <address><?= $footerData['ADDRESS_FOOTER']['~VALUE'] ?></address>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container d-flex justify-content-between">
            <?php if (!empty($footerData['COPYRIGHT_FOOTER']['~VALUE'])): ?>
                <a class="footer-link"><?= $footerData['COPYRIGHT_FOOTER']['~VALUE'] ?></a>
            <?php endif; ?>
            <a href="https://d-option.ru/" class="footer-link" target="_blank">Разработано веб-студией «Digital
                Option»</a>
        </div>
    </div>
</footer>
<a href="#top" class="button-element button-up gradient-button">
    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M8.8443 4.26471L2.26421 11.0343L0.611816 9.33431L8.8443 0.864746L17.0768 9.33431L15.4244 11.0343L8.8443 4.26471Z"
              fill="white"/>
    </svg>
</a>
<?php if (!empty($footerData['WHATSAPP_FOOTER']['VALUE']) && !empty($footerData['WHATSAPP_FOOTER']['~DESCRIPTION'])): ?>
    <a href="<?= $footerData['WHATSAPP_FOOTER']['~DESCRIPTION'] ?>" target="_blank" class="call">
        <img src="<?= CFile::GetPath($footerData['WHATSAPP_FOOTER']['VALUE']) ?>" height="60" width="60" alt="">
    </a>
<?php endif; ?>

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
        "IBLOCK_TYPE" => "replace_glazing",
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