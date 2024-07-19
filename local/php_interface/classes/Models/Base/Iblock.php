<?php

namespace classes\Models\Base;


use Bitrix\Main\Data\Cache;
use classes\Exceptions\IblockException;
use classes\Models\Base\Traits\Element;
use classes\Models\Base\Traits\Property;
use classes\Models\Base\Traits\Section;
use CModule;

abstract class Iblock
{
    use Section, Element, Property;

    protected const IBLOCK_TYPE_CODE = '';

    protected const IBLOCK_CODE = '';

    protected const TTL_CACHE = 360000;

    protected array $result = [];

    public function __construct()
    {
        CModule::IncludeModule('iblock');
        CModule::IncludeModule("main");
    }

    /**
     * Получает идентификатор инфоблока
     * @return string
     */
    public function getIblockId(): string
    {
        $iblock = \CIBlock::GetList(false, ['TYPE' => static::IBLOCK_TYPE_CODE, 'CODE' => static::IBLOCK_CODE])->Fetch();
        return $iblock['ID'] ?? false;
    }


    /**
     * Кеширует результат
     * @param string $cacheKey
     * @return $this
     */
    public function cashed(string $cacheKey = ''): static
    {
        $result = [];
        $cacheKey = $cacheKey ?: uniqid();
        try {
            $obCache = Cache::createInstance();
            if ($obCache->initCache(static::TTL_CACHE, $cacheKey)) {
                $result = $obCache->getVars();
            } elseif ($obCache->startDataCache()) {
                $result = [
                    $cacheKey => $this->result,
                ];
                $obCache->endDataCache($result);
            }
        } catch (IblockException $error) {
            echo $error->getMessage();
        }
        $this->result = $result[$cacheKey] ?: $this->result;
        return $this;
    }

    /**
     * Возвращает результат
     * @return array
     */
    public function getResult(): array
    {
        $result = $this->result;
        $this->result = [];
        return $result;
    }

    /**
     * Возвращает новый экземпляр класса
     * @return static
     */
    public static function getInstance()
    {
        return new static();
    }
}
