<?php

namespace classes\Models\Base\Traits;

use CIBlockElement;

trait Property
{

    /**
     * Получает свойства по его коду
     * @param string $code
     * @return $this
     */
    public function getPropertiesByCode(string $code): static
    {
        $obElement = CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'ACTIVE' => 'Y',
                'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
                'IBLOCK_CODE' => static::IBLOCK_CODE,
            ],
            false,
            false,
            ['PROPERTY_' . $code]
        );
        if ($obElement) {
            while ($property = $obElement->GetNext()) {
                $this->result[] = $property['PROPERTY_' . $code . '_VALUE'];
            }
        }
        return $this;
    }


    /**
     * Получает свойства элемента по постфиксу
     * @param string $postfix
     * @param string $elementCode
     * @return $this
     */
    public function getPropertiesByPostfix(string $postfix, string $elementCode = ''): static
    {
        $obElement = CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'ACTIVE' => 'Y',
                'CODE' => $elementCode,
                'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
                'IBLOCK_CODE' => static::IBLOCK_CODE,
            ],
        );
        if ($element = $obElement->GetNextElement()) {
            $this->result = $element->GetProperties(
                false,
                ['CODE' => '%_' . $postfix]
            );
        }
        return $this;
    }

    /**
     * Получает свойства элемента по префиксу
     * @param string $prefix
     * @param string $elementCode
     * @return $this
     */
    public function getPropertiesByPrefix(string $prefix, string $elementCode = ''): static
    {
        $obElement = CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'ACTIVE' => 'Y',
                'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
                'IBLOCK_ID' => $this->getIblockId(),
                'CODE' => $elementCode
            ],
        );
        if ($obElement) {
            while ($element = $obElement->GetNextElement()) {
                $this->result = $element->GetProperties(
                    false,
                    ['CODE' => $prefix . '_%']
                );
            }
        }
        return $this;
    }

    public  function getPropertiesByElementId($elementId, $filter = []): array
    {
        $result = [];
        $obResult = CIBlockElement::GetProperty($this->getIblockId(), $elementId, false, false, $filter);
        if ($obResult) {
            while ($prop = $obResult->GetNext()) {
                $result[] = $prop;
            }
        }
        return $result;
    }

    /**
     * Устанавливает или обновляет свойство по id элемента
     * @param $elementId
     * @param array $propertyValues
     * @return void
     */
    public function setProperties($elementId, array $propertyValues)
    {
        CIBlockElement::SetPropertyValuesEx(
            $elementId,
            $this->getIblockId(),
            $propertyValues,
        );
    }

}