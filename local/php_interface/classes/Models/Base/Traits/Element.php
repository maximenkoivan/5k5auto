<?php

namespace classes\Models\Base\Traits;

trait Element
{

    /**
     * Получает поля элемента по его коду
     * @param string $elementId
     * @param array $code
     * @return $this
     */
    public function getFieldsById(string $elementId = '', array $code = []): static
    {
        $obElement = \CIBlockElement::GetList(false, [
            'ID' => $elementId,
            'ACTIVE' => 'Y',
            'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
            'IBLOCK_CODE' => static::IBLOCK_CODE,
        ],
            false,
            false,
            $code
        );
        if ($element = $obElement->GetNextElement()) {
            $this->result = $element->GetFields();
        }
        return $this;
    }

    /**
     * Получает элемент по его коду
     * @param string $elementCode
     * @param bool $onlyProperties
     * @param array $sort
     * @return $this
     */
    public function getElementByCode(string $elementCode, bool $onlyProperties = false, array $sort = ['SORT' => 'ASC'], bool $onlyFields = false): static
    {
        $obElement = \CIBlockElement::GetList(
            $sort,
            [
                'ACTIVE' => 'Y',
                'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
                'IBLOCK_CODE' => static::IBLOCK_CODE,
                'CODE' => $elementCode
            ]);
        if ($element = $obElement->GetNextElement()) {
            if ($onlyProperties) {
                $this->result = $element->GetProperties();
            } elseif ($onlyFields) {
                $this->result = $element->GetFields();
            } else {
                $fields = $element->GetFields();
                $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(
                    $this->getIblockId(),
                    $fields['ID']
                );
                $this->result = $fields + $ipropValues->getValues() + $element->GetProperties();
            }
        }
        return $this;
    }

    /**
     * Получает элементы по идетификаторам
     * @param string|array|null $ids
     * @param array $sort
     * @return $this
     */
    public function getElementsByIds(string|array|null $ids, array $sort = ['SORT' => 'ASC']): static
    {
        $obElement = \CIBlockElement::GetList(
            $sort,
            [
                'ACTIVE' => 'Y',
                'ID' => $ids ?: -1,
                'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
                'IBLOCK_CODE' => static::IBLOCK_CODE,
            ]);
        if ($obElement) {
            while ($element = $obElement->GetNextElement()) {
                $this->result[] = $element->GetFields() + $element->GetProperties();
            }
        }
        return $this;
    }

    /**
     * Получает заданоое количество элементов или все
     * @param int|bool $count
     * @param array $sort
     * @param $filter
     * @return $this
     */
    public function getElements(int|bool $count = false, array $sort = ['SORT' => 'ASC'], $filter = []): static
    {
        $obElement = \CIBlockElement::GetList(
            $sort,
            [
                'ACTIVE' => 'Y',
                'IBLOCK_ACTIVE' => 'Y',
                'IBLOCK_TYPE' => static::IBLOCK_TYPE_CODE,
                'IBLOCK_CODE' => static::IBLOCK_CODE,
            ] + $filter,
            false,
            !$count ?: ['nTopCount' => $count]
        );
        if ($obElement) {
            while ($element = $obElement->GetNextElement()) {
                $this->result[] = $element->GetFields() + $element->GetProperties();
            }
        }
        return $this;
    }

}