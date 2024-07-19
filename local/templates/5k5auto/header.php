<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;

$assets = Asset::getInstance();
$assets->addString(
    '<link rel="icon" href="' . SITE_TEMPLATE_PATH . '/assets/images/favicon.ico" type="image/x-icon"/>',
    AssetLocation::BEFORE_CSS
);
$assets->addString(
    ' <link rel="icon" sizes="120x120" type="image/png" href="' . SITE_TEMPLATE_PATH . '/assets/images/favicon-120x120.png">',
    AssetLocation::BEFORE_CSS
);
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/screen.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/fancybox.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/responsive.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/assets/stylesheets/swiper-bundle.min.css');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/jquery-1.12.4.min.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/fancybox.umd.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/imask.min.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/swiper-bundle.min.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/assets/js/common.js');
$headerData = \classes\Models\FiveKFiveAuto\Common\CommonData::getInstance()->getPropertiesByPostfix('HEADER')->cashed('header')->getResult();
?>
    <!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
    <head>
        <meta charset="<?= LANG_CHARSET ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php $APPLICATION->ShowTitle() ?></title>

        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?= $HTTP_X_FORWARDED_PROTO . '://' . SITE_SERVER_NAME ?>"/>
        <meta property="og:title" content="<?php $APPLICATION->ShowTitle(); ?>"/>
        <meta property="og:description" content="<?php $APPLICATION->ShowProperty('description', ''); ?>"/>
        <meta property="og:image" content="<?= $HTTP_X_FORWARDED_PROTO . '://' . SITE_SERVER_NAME . SITE_TEMPLATE_PATH . '/assets/images/favicon-120x120.png' ?>"/>

        <?php $APPLICATION->ShowHead() ?>

        <?php if ($USER->IsAdmin()): ?>
            <?php $APPLICATION->ShowPanel(); ?>
        <?php endif; ?>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();
                for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(97521790, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/97521790" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </head>
<?php if (defined('ERROR_404') && ERROR_404 == 'Y'): ?>
    <body class="error-page">
<?php else: ?>
    <body>
<header class="section-wrapper header-section" id="top">
    <div class="container">
        <div class="row align-items-center">
            <?php if (!empty($headerData['LOGO_HEADER']['VALUE'])): ?>
                <div class="col-xl-auto col-md-4 col-8">
                    <a href="/" class="logo">
                        <img src="<?= CFile::GetPath($headerData['LOGO_HEADER']['VALUE']) ?>"
                             alt="<?= $headerData['LOGO_HEADER']['DESCRIPTION'] ?>">
                    </a>
                </div>
            <?php endif; ?>

            <div class="col-xl col-lg-4 col-md-4 col-2 d-flex justify-content-lg-center justify-content-end">
                <?php if (!empty($headerData['PHONE_HEADER']['VALUE'])): ?>
                    <a href="tel:<?= \classes\Helpers\Generic::getCleanPhoneNumber($headerData['PHONE_HEADER']['VALUE']) ?>"
                       class="contact-element lg-contact-font d-flex">
                        <div class="contact-element-icon gr-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.71325 0.349818C3.25825 -0.105653 2.52183 -0.105653 2.06683 0.349818C1.74755 0.670358 1.38184 1.03659 1.00755 1.4121C-0.634585 3.05764 0.00398374 5.00367 0.994694 7.10832C2.26326 9.80254 6.224 13.9067 8.92533 15.0362C11.0653 15.9314 12.9617 16.666 14.601 15.0233C14.601 15.0233 15.151 14.4744 15.6567 13.9703C15.876 13.7519 15.9988 13.4549 15.9995 13.1451C16.0003 12.8353 15.8774 12.5383 15.6581 12.3191C15.0567 11.7166 14.2996 10.9584 14.0138 10.6721C13.5596 10.2167 12.8224 10.2167 12.3681 10.6721C12.031 11.0105 11.6467 11.3946 11.3353 11.7073C10.9603 12.0828 10.3789 12.1571 9.92173 11.8879C8.39746 10.957 5.08958 7.64737 4.15464 6.0974C3.88535 5.64193 3.95893 5.06224 4.33178 4.68817C4.63893 4.37048 5.02177 3.98713 5.35892 3.64873C5.81321 3.19326 5.81321 2.4551 5.35892 1.99963C4.85607 1.49562 4.21536 0.853823 3.71322 0.350525L3.71325 0.349818ZM8.57173 1.14224C12.0411 1.14224 14.8574 3.95709 14.8574 7.42456C14.8574 7.74011 15.1131 7.99568 15.4288 7.99568C15.7445 7.99568 16.0002 7.74011 16.0002 7.42456C16.0002 3.32675 12.6717 0 8.57173 0C8.25601 0 8.0003 0.255569 8.0003 0.57112C8.0003 0.886671 8.25601 1.14224 8.57173 1.14224ZM8.57173 5.7112C9.51815 5.7112 10.286 6.47864 10.286 7.42456C10.286 7.74011 10.5417 7.99568 10.8574 7.99568C11.1731 7.99568 11.4288 7.74011 11.4288 7.42456C11.4288 5.84827 10.1489 4.56896 8.57173 4.56896C8.25601 4.56896 8.0003 4.82453 8.0003 5.14008C8.0003 5.45563 8.25601 5.7112 8.57173 5.7112ZM8.57173 3.42672C10.7788 3.42672 12.5717 5.21861 12.5717 7.42456C12.5717 7.74011 12.8274 7.99568 13.1431 7.99568C13.4588 7.99568 13.7145 7.74011 13.7145 7.42456C13.7145 4.5876 11.4102 2.28448 8.57173 2.28448C8.25601 2.28448 8.0003 2.54005 8.0003 2.8556C8.0003 3.17115 8.25601 3.42672 8.57173 3.42672Z"
                                      fill="white"/>
                            </svg>
                        </div>
                        <span><?= $headerData['PHONE_HEADER']['VALUE'] ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="col-xl col-md-4 col-2">
                <?php if (!empty($headerData['EMAIL_HEADER']['VALUE'])): ?>
                    <a href="mailto:<?= $headerData['EMAIL_HEADER']['VALUE'] ?>" class="contact-element">
                        <div class="contact-element-icon gr-icon">
                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.7111 0.127175C18.4902 0.0448384 18.2502 0 18.0002 0H2.00024C1.75024 0 1.51024 0.0448363 1.28942 0.127175L9.4635 6.97263C9.78433 7.24085 10.216 7.24085 10.5368 6.97263L18.7111 0.127175Z"
                                      fill="white"/>
                                <path d="M0.263583 0.985545C0.0960819 1.27169 0.000244141 1.60266 0.000244141 1.95646V13.0435C0.000244141 14.1236 0.896074 15 2.00024 15H18.0002C19.1044 15 20.0002 14.1236 20.0002 13.0435V1.95646C20.0002 1.60266 19.9044 1.27169 19.7369 0.985545L11.4037 7.96311C10.5837 8.65034 9.41701 8.65034 8.59707 7.96311L0.263583 0.985545Z"
                                      fill="white"/>
                            </svg>
                        </div>
                        <span><?= $headerData['EMAIL_HEADER']['VALUE'] ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php if (!empty($headerData['BTN_TEXT_HEADER']['~VALUE'])): ?>
                <div class="col-xl-auto col-6 d-flex justify-content-end mt-xl-0 mt-2">
                    <a href="javascript:" data-fancybox data-src="#modal-consult" class="button-element gradient-button"
                       role="button">
                        <?= $headerData['BTN_TEXT_HEADER']['VALUE'] ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if (!empty($headerData['ADDRESS_HEADER']['~VALUE'])): ?>
                <div class="col-xl col-6 mt-xl-0 mt-2">
                    <div class="contact-element address-contact">
                        <div class="contact-element-icon">
                            <svg width="27" height="39" viewBox="0 0 27 39" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.4963 0C6.05441 0 0 6.06357 0 13.5163C0 18.8407 3.08842 23.6229 7.90561 25.818L12.2683 38.376C12.3963 38.7437 12.7413 38.9926 13.129 39C13.1346 39 13.1402 39 13.1457 39C13.5278 39 13.8728 38.7641 14.012 38.4076L18.8329 25.9257C23.8096 23.7844 27 18.9577 27 13.5163C26.9963 6.06357 20.9419 0 13.4963 0ZM17.7681 24.3546C17.527 24.4493 17.3378 24.6406 17.2432 24.882L13.1884 35.3767L9.52308 24.8226C9.4359 24.5719 9.24856 24.3731 9.00557 24.271C4.66138 22.4529 1.85491 18.2297 1.85491 13.5144C1.85491 7.085 7.07646 1.85529 13.4963 1.85529C19.918 1.85529 25.1414 7.085 25.1414 13.5144C25.1414 18.3281 22.2477 22.5829 17.7681 24.3546Z"
                                      fill="#F31842"/>
                                <path d="M13.4963 6.86586C9.83285 6.86586 6.85388 9.84843 6.85388 13.5163C6.85388 17.1823 9.83285 20.1649 13.4963 20.1649C17.1597 20.1649 20.1387 17.1823 20.1387 13.5163C20.1387 9.85029 17.1597 6.86586 13.4963 6.86586ZM13.4963 18.3077C10.8568 18.3077 8.70878 16.159 8.70878 13.5163C8.70878 10.8736 10.8568 8.723 13.4963 8.723C16.1358 8.723 18.2838 10.8736 18.2838 13.5163C18.2838 16.159 16.1358 18.3077 13.4963 18.3077Z"
                                      fill="#F31842"/>
                            </svg>
                        </div>
                        <address><?= $headerData['ADDRESS_HEADER']['~VALUE'] ?></strong></address>
                    </div>
                </div>
            <?php endif; ?>
        </div>
</header>
<?php endif; ?>