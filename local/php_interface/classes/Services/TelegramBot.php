<?php

namespace classes\Services;

use classes\Models\FiveKFiveAuto\Feedback\FormSettings;

class TelegramBot
{
    private string $token;

    private mixed $chatID;

    private FormSettings $settings;

    public function __construct()
    {
        $this->settings = FormSettings::getInstance();
        $settings = $this->settings->getPropertiesByPostfix('TELEGRAM')->getResult();
        $this->token = $settings['TOKEN_TELEGRAM']['~VALUE'];
        $this->chatID = $settings['CHAT_ID_TELEGRAM']['~VALUE'];
    }


    public function sendMessage(string $text)
    {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . $this->token . '/sendMessage?disable_web_page_preview=true',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => $this->chatID,
                    'text' => $text,
                    'parse_mode' => 'html'
                ),
            )
        );
        $result = curl_exec($ch);
        $element = $this->settings->getElementByCode('settings', false, [], true)->cashed('settings_element')->getResult();
        if (!json_decode($result, JSON_OBJECT_AS_ARRAY)['ok']) {
            $this->settings->setProperties($element['ID'], ['LOG_TELEGRAM' => date('d.m.Y H:i:s - ') . $result]);
        } else {
            $this->settings->setProperties($element['ID'], ['LOG_TELEGRAM' => '']);
        }
    }
}