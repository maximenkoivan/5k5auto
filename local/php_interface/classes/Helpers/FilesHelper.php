<?php
namespace classes\Helpers;


use CFile;


class FilesHelper
{
    /**
     * Получить изображение по его идентификатору
     *
     * @param $id
     * @param int $width
     * @param int $height
     * @param bool $crop
     * @return string
     */
    public static function getPlaceholder()
    {
        return SITE_TEMPLATE_PATH . "/assets/images/placeholder.png";
    }

    public static function getImageById($id = 0, int $width = null, int $height = null, bool $crop = false): string
    {
        $placeholder = self::getPlaceholder();
        if (!$id || ($id != (int)$id )) {
            return $placeholder;
        }

        $fileInfo = CFile::GetFileArray($id);
        $resizeType = $crop ? BX_RESIZE_IMAGE_EXACT : BX_RESIZE_IMAGE_PROPORTIONAL_ALT;

        $resizeImageInfo = CFile::ResizeImageGet(
            $fileInfo,
            ["width" => $width, "height" => $height],
            $resizeType,
            true,
            false,
            false,
            70
        );

        $path = $resizeImageInfo ? $resizeImageInfo['src'] : '';

        return file_exists($_SERVER["DOCUMENT_ROOT"] . $path) ? $path : $placeholder;
    }

    /**
     * Получить файл по его идентификатору
     *
     * @param ?int $id
     * @return array
     */
    public static function getFilePathById(?int $id = 0): array
    {
        $uploadDir = "/upload/";
        $fileInfo = CFile::GetByID($id)->Fetch() ?: [];
        $path = $uploadDir . $fileInfo["SUBDIR"] . '/' . $fileInfo["FILE_NAME"];

        if (!$fileInfo) {
            return [
                "ORIGINAL_NAME" => null,
                "PATH" => null,
            ];
        }

        return [
            "ORIGINAL_NAME" => $fileInfo["ORIGINAL_NAME"],
            "PATH" => $path,
        ];
    }

    /**
     * Получает массив файлов $arResult['PROPERTIES']['FILES']  ['VALUE'], ['DESCRIPTION']
     * возвращает массив данных о файле: id, путь к файлу, имя файла, размер, расширение
     *
     *
     * @param array $filesArray
     * @return array $result
     */

    public static function getFilesInfo(array $filesArray)
    {
        $result = [];

        foreach ($filesArray['VALUE'] as $key => $id) {
            $result[] = [
                'ID'    => $id,
                'LINK'   => CFile::GetPath($id),
                'NAME'  => $filesArray['DESCRIPTION'][$key],
                'SIZE'  => CFile::FormatSize(CFile::GetFileArray($id)['FILE_SIZE']),
                'EXT'   => mb_strtoupper(\Bitrix\Main\IO\Path::getExtension(CFile::GetPath($id)), 'UTF-8'),
            ];
        }

        return $result;
    }

    public static function getFileInfo(string $fileID)
    {

            $result = [
                'LINK'   => CFile::GetPath($fileID),
                'SIZE'  => CFile::FormatSize(CFile::GetFileArray($fileID)['FILE_SIZE']),
                'EXT'   => '.' . \Bitrix\Main\IO\Path::getExtension(CFile::GetPath($fileID)),
            ];


        return $result;
    }

    /**
     * Возвращает путь до папки с подключаемыми частями шаблонов
     *
     * @return string
     */
    public static function getIncludePath()
    {
        return $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/partials/';
    }

    /**
     * Возвращает путь до шаблонов компонентов
     *
     * @return string
     */
    public static function getTemplatePath()
    {
        return $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/components/';
    }


    /**
     * Масшиабирует картинку и возвращает путь к ней
     *
     * @param $imageId
     * @param int $width
     * @param int $height
     * @param $type
     * @return mixed
     */
    public static function getResizedImage($imageId, $width = 80, $height = 80, $type = BX_RESIZE_IMAGE_PROPORTIONAL_ALT)
    {
        $file = CFile::ResizeImageGet(
            $imageId,
            [
                'width'     =>  $width,
                'height'    =>  $height
            ],
            $type,
            true);

        return $file['src'];
    }

    public static function checkImageById($id)
    {
        $filePath = CFile::GetPath($id);

        return static::getImageByPath($filePath);
    }

    /**
     * Получает путь к файлу
     * если файла нет, возвращает плейсхолдер,
     * иначе путь к файлу
     *
     * @param $path
     * @return string
     */
    public static function getImageByPath($path)
    {
        if(empty($path)) return self::getPlaceholder();

        if(static::fileExist($path)) {
            return $path;
        } else {
            return self::getPlaceholder();
        }
    }

    /**
     * Проверяет по заданному пути наличие файла
     *
     * @param $path
     * @return bool
     */
    public static function fileExist($path)
    {
        return file_exists($_SERVER["DOCUMENT_ROOT"] . $path);
    }

    /**
     * Проверяет существование файла и подключает его
     *
     * @param $path
     */
    public static function includeFile($path, $params = null)
    {
        $absolutePath = self::getIncludePath() . $path;
        if(file_exists($absolutePath)) {
            include $absolutePath;
        }
    }

    /**
     * shows var dump pretty
     * @param $var
     */
    public static function dd($var)
    {
        echo '<pre style="border: 1px solid #cc0000; display: block; color: #cc0000; background: #eeeeee">';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * MIME TYPES
     *
     * Получение полного списка соответствий расширения и MIME
     *
     * @return array
     */
    public static function getMimeTypeMapping(): array
    {
        return [
            'csv' => [
                'text/x-comma-separated-values',
                'text/comma-separated-values',
                'application/octet-stream',
                'application/vnd.ms-excel',
                'application/x-csv',
                'text/x-csv',
                'text/csv',
                'application/csv',
                'application/excel',
                'application/vnd.msexcel',
                'text/plain',
            ],
            'oda' => 'application/oda',
            'pdf' => 'application/pdf',
            'xls' => [
                'application/vnd.ms-excel',
                'application/msexcel',
                'application/x-msexcel',
                'application/x-ms-excel',
                'application/x-excel',
                'application/x-dos_ms_excel',
                'application/xls',
                'application/x-xls',
                'application/excel',
                'application/download',
                'application/vnd.ms-office',
            ],
            'ppt' => [
                'application/powerpoint',
                'application/vnd.ms-powerpoint',
                'application/vnd.ms-office',
            ],
            'pptx' => [
                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'application/x-zip',
                'application/zip',
            ],
            'bmp' => [
                'image/bmp',
                'image/x-bmp',
                'image/x-bitmap',
                'image/x-xbitmap',
                'image/x-win-bitmap',
                'image/x-windows-bmp',
                'image/ms-bmp',
                'image/x-ms-bmp',
                'application/bmp',
                'application/x-bmp',
                'application/x-win-bitmap',
            ],
            'gif' => 'image/gif',
            'jpeg' => ['image/jpeg', 'image/pjpeg'],
            'jpg' => ['image/jpeg', 'image/pjpeg'],
            'jpe' => ['image/jpeg', 'image/pjpeg'],
            'jp2' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'j2k' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'jpf' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'jpg2' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'jpx' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'jpm' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'mj2' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'mjp2' => ['image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'],
            'png' => ['image/png', 'image/x-png'],
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'txt' => 'text/plain',
            'text' => 'text/plain',
            'rtx' => 'text/richtext',
            'rtf' => 'text/rtf',
            'doc' => ['application/msword', 'application/vnd.ms-office'],
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xlsx' => [
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/zip',
                'application/vnd.ms-excel',
                'application/x-zip',
            ],
            'svg' => ['image/svg+xml', 'application/xml', 'text/xml'],
            'odc' => 'application/vnd.oasis.opendocument.chart',
            'otc' => 'application/vnd.oasis.opendocument.chart-template',
            'odf' => 'application/vnd.oasis.opendocument.formula',
            'otf' => 'application/vnd.oasis.opendocument.formula-template',
            'odg' => 'application/vnd.oasis.opendocument.graphics',
            'otg' => 'application/vnd.oasis.opendocument.graphics-template',
            'odi' => 'application/vnd.oasis.opendocument.image',
            'oti' => 'application/vnd.oasis.opendocument.image-template',
            'odp' => 'application/vnd.oasis.opendocument.presentation',
            'otp' => 'application/vnd.oasis.opendocument.presentation-template',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            'ots' => 'application/vnd.oasis.opendocument.spreadsheet-template',
            'odt' => 'application/vnd.oasis.opendocument.text',
            'odm' => 'application/vnd.oasis.opendocument.text-master',
            'ott' => 'application/vnd.oasis.opendocument.text-template',
            'oth' => 'application/vnd.oasis.opendocument.text-web',
        ];
    }

    /**
     * Преобразование MIME в расширение
     *
     * @param string $contentType
     *
     * @return string
     */
    public static function getExtensionByMime(string $contentType): string
    {
        $mapping = static::getMimeTypeMapping();
        foreach ($mapping as $extension => $mimeType) {
            if ((is_array($mimeType) && in_array($contentType, $mimeType, true)) ||
                $contentType === $mimeType
            ) {
                return $extension;
            }
        }
        return 'undefined';
    }


}