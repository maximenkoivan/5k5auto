<?php

namespace classes\Helpers;

use Bitrix\Main\Application;
use Bitrix\Main\Context;
use Bitrix\Main\Web\Cookie;

class Utm
{
    public static array $utm = [
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
    ];

    static function saveToCoockie(): void
    {
        $request = Context::getCurrent()->getRequest();
        $application = Application::getInstance();
        foreach (self::$utm as $mark) {
            if (!empty($request->get($mark))) {
                $cookie = new Cookie($mark, $request->get($mark), null, false);
                $application->getContext()->getResponse()->addCookie($cookie);
            }
        }
    }
}