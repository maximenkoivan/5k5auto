<?php


namespace classes\Helpers;

use CFile;
use COption;


class Generic
{
    public const PLACEHOLDER = '/local/templates/assets/images/placeholder.png';


    /**
     * Получить телефон без маски
     *
     * @param string $phone
     *
     * @return string
     */
    public static function getCleanPhoneNumber(string $phone): string
    {
        $prefix = '';
        if (mb_strpos($phone, '+') === 0) $prefix = '+';

        $result = $phone !== '' ? preg_replace('/\D/', '', $phone) : '';

        return !(empty($result)) ? $prefix . $result : '';
    }

    /**
     * Получить изображение по его идентификатору
     *
     * @param int|null $id
     * @param int $width
     * @param int $height
     * @param bool $crop
     * @param bool $changeRatio
     * @param bool $withoutPlaceholder
     *
     * @return mixed
     */
    public static function getImageById(?int $id = 0, int $width = 630, int $height = 450, bool $crop = false, bool $changeRatio = false, bool $withoutPlaceholder = false)
    {
        if (!$withoutPlaceholder && (int)$id <= 0) {
            return self::PLACEHOLDER;
        }

        $arImgParams = CFile::_GetImgParams($id);
        $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL_ALT;
        if ($crop) {
            $resizeType = BX_RESIZE_IMAGE_EXACT;
            if ($changeRatio && $width >= $arImgParams['WIDTH'] && $height >= $arImgParams['HEIGHT']) {
                $ratio = $width / $height;
                if ($ratio > 1) {
                    $width = $arImgParams['WIDTH'];
                    $height = $arImgParams['WIDTH'] / $ratio;
                } else {
                    $width = $arImgParams['HEIGHT'] * $ratio;
                    $height = $arImgParams['HEIGHT'];
                }
            }
        }

        $arFile = CFile::GetFileArray($id);
        $arrImage = CFile::ResizeImageGet(
            $arFile,
            ['width' => $width, 'height' => $height],
            $resizeType,
            true,
            false,
            false,
            85
        );
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $arrImage['src'])) {
            return $arrImage['src'];
        }
        if (!$withoutPlaceholder) {
            return self::PLACEHOLDER;
        }
        return null;
    }

    /**
     * Получить файл по его идентификатору
     *
     * @param ?int $id
     *
     * @return array
     */
    public static function getFilePathById(?int $id = 0): array
    {
        $uploadDir = '/upload/';
        $fileInfo = CFile::GetByID($id)->Fetch() ?: [];
        $path = $uploadDir . $fileInfo['SUBDIR'] . '/' . $fileInfo['FILE_NAME'];

        if (!$fileInfo) {
            return [
                'ORIGINAL_NAME' => null,
                'PATH' => null,
            ];
        }

        return [
            'ORIGINAL_NAME' => $fileInfo['ORIGINAL_NAME'],
            'PATH' => $path,
        ];
    }


    /**
     * @param $bytes
     * @param int $decimals
     *
     * @return string
     */
    public static function getFormattedFilesize($bytes, int $decimals = 2): string
    {
        $size = ['б', 'кБ', 'МБ', 'ГБ', 'ТБ', 'PB', 'EB', 'ZB', 'YB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / (1024 ** $factor)) . @$size[$factor];
    }


    /**
     * Склонение для числительных
     *
     * @param $number
     * @param array $expressions
     *
     * @return string
     */
    public static function declension($number, array $expressions): string
    {
        $number = (int)$number;
        $number = (($number < 0) ? $number - $number * 2 : $number) % 100;
        $digit = ($number > 20) ? $number % 10 : $number;
        return trim(
            (($digit == 1) ?
                $expressions[0] :
                (($digit > 4 || $digit < 1) ?
                    $expressions[2] :
                    $expressions[1]))
        );
    }

    /**
     * Получить телефон без маски
     *
     * @param string $phone
     * @return string
     */
    public static function getPhoneWithoutMask(string $phone): string
    {
        return !empty($phone) ? preg_replace('/[*( +()\-)]/', '', $phone) : "";
    }

    /**
     * Получить массив координат из строки
     * @param string $string
     * @return array|int[]
     */
    public static function getCoordinatesFromString(string $string): array
    {
        $coordinates = explode(',', $string);
        if (count($coordinates) < 2) {
            return [
                'lat' => 0,
                'lng' => 0,
            ];
        }

        return [
            'lat' => $coordinates[0],
            'lng' => $coordinates[1]
        ];
    }

    /**
     * Получить данные о ссылке на ютьюб
     *
     * @param string|null $url
     * @return array|null[]
     */
    public static function getYoutubeData(?string $url)
    {
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        if (preg_match($pattern, $url, $match)) {
            $youtubeId = $match[1];

            return [
                'IMG' => "https://img.youtube.com/vi/" . $youtubeId . "/sddefault.jpg",
                'VIDEO' => $youtubeId,
            ];
        }

        return [
            'IMG' => null,
            'VIDEO' => null,
        ];
    }

    /**
     * Получает API ключ Yandex карт из настроек Битрикса (Управление уструктурой)
     * @return false|string|null
     */
    public static function getYandexAPIKey()
    {
        return COption::GetOptionString("fileman", "yandex_map_api_key");
    }

    /**
     * Возвращает подстроку после цифр
     * @param string $string
     * @return mixed
     */
    public static function separate(string $string)
    {
        preg_match("/([^0-9])+/u", $string, $matches);
        return $matches[0];
    }
}
