<?php

use classes\Models\FiveKFiveAuto\Common\CommonData;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$privacyPolicyLink = CommonData::getInstance()->getPropertiesByCode('POLICY_FOOTER')->getResult();
$link = CFile::GetPath($privacyPolicyLink[0]);
$consentTextQuiz = str_replace('#TEXT_BUTTON#', '"' . $arResult['PROPERTIES']['TEXT_BTN_1_QUIZ']['VALUE'] . '"', $arResult['PROPERTIES']['CONSENT_TEXT_COMMON']['VALUE']);
$consentTextQuiz = str_replace('#PRIVACY_POLICY#', "<a href='{$link}' target='_blank'>{$arResult['PROPERTIES']['TEXT_LINK_COMMON']['VALUE']}</a>", $consentTextQuiz);
$consentTextCallaback = str_replace('#TEXT_BUTTON#', '"' . $arResult['PROPERTIES']['TEXT_BTN_CALLBACK']['VALUE'] . '"', $arResult['PROPERTIES']['CONSENT_TEXT_COMMON']['VALUE']);
$consentTextCallaback = str_replace('#PRIVACY_POLICY#', "<a href='{$link}' target='_blank'>{$arResult['PROPERTIES']['TEXT_LINK_COMMON']['VALUE']}</a>", $consentTextCallaback);
?>
