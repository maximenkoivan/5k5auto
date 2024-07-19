<?php

namespace classes\Models\ReplaceGlazing\Feedback;

use classes\Models\Base\Iblock;

class CalculateCost extends Iblock
{
    protected const IBLOCK_TYPE_CODE = 'replace_glazing';

    private array $formFields = [
        'formName' => [
            'ru' => '""Имя"',
            'en' => 'Name',
            'rules' => 'required|min:2|max:50',
            'value' => 'Не указано',
            'property' => false,
            'store' => 'NAME'
        ],
        'formPhone' => [
            'ru' => '"Номер телефона"',
            'en' => '',
            'rules' => 'required|phone|max:50',
            'value' => '',
            'property' => true,
            'store' => 'PHONE'
        ],
        'place' => [
            'ru' => 'Место нахождения объекта',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'PLACE'
        ],
        'services' => [
            'ru' => 'Тип услуги',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'SERVICES'
        ],
        'buildingType' => [
            'ru' => 'Тип здания',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'BUILD_TYPE'
        ],
        'numberFloor' => [
            'ru' => 'Номер этажа',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'NUMBER_FLOOR'
        ],
        'totalFloor' => [
            'ru' => 'Всего этажей',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'TOTAL_FLOOR'
        ],
        'typeWork' => [
            'ru' => 'Тип работ',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'TYPE_WORK'
        ],
        'totalCount' => [
            'ru' => 'Общее количество стеклопакетов',
            'en' => '',
            'rules' => 'max:10',
            'value' => '',
            'property' => true,
            'store' => 'TOTAL_COUNT'
        ],
        'lift' => [
            'ru' => 'Подъем негабаритных грузов',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'LIFT'
        ],
        // вторая часть квиза
        'itemsNumber' => [
            'ru' => 'Количество предметов',
            'en' => '',
            'rules' => 'max:10',
            'value' => '',
            'property' => true,
            'store' => 'ITEMS_NUMBER'
        ],
        'weight' => [
            'ru' => 'Вес самого тяжелого предмета',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'WEIGHT'
        ],
        'floor' => [
            'ru' => 'Сколько этажей до крыши',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'FLOOR_COUNT'
        ],
        'cover' => [
            'ru' => 'Тип кровли дома',
            'en' => '',
            'rules' => 'max:100',
            'value' => '',
            'property' => true,
            'store' => 'COVER'
        ],

//        'recaptcha_response' => [
//            'ru' => 'recaptcha',
//            'en' => 'recaptcha',
//            'rules' => 'recaptcha',
//            'value' => ''
//        ],
    ];
    protected const IBLOCK_CODE = 'order';

    private const EVENT_NAME = 'ORDER_FORM';

    /**
     * Возвращает массив полей
     * с их свойствами и правилами валидации
     * @return array
     */
    public function getFormFields(): array
    {
        return $this->formFields;
    }

    public function setFieldValue(string $fieldName = '', $value = '')
    {
        $this->formFields[$fieldName]['value'] = $value;
    }

    /**
     * Возвращает название почтового события
     * @return string
     */
    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }

    /**
     * Получает поля для почтового отправления и формирует
     * массив для создания почтового события
     * @return array
     */
    public function getMailFields(): array
    {
        $fields = $this->getFieldsForMail();

        return [
            "EVENT_NAME" => self::EVENT_NAME,
            "LID" => SITE_ID,
            "C_FIELDS" => $fields,
        ];
    }

    /**
     * формирует массив данных для почтового шаблона
     * @return array
     */
    public function getFieldsForMail(): array
    {
        $result = [];
        foreach ($this->formFields as $field) {
            $result[$field['store']] = $field['value'];
        }
        return $result;
    }

    /**
     * Формирует массив основных полей
     * для записи
     * @return array
     */
    public function getMainFieldsForSave(): array
    {
        $formFields = $this->getFormFields();

        $result['IBLOCK_ID'] = $this->getIblockId();

        foreach ($formFields as $field) {
            if (!$field['property'] && !empty($field['store'])) {
                $result[$field['store']] = $field['value'];
            }
        }

        if (!empty($additionalFields) && is_array($additionalFields)) {
            $result = $result + $additionalFields;
        }
        return $result;
    }


    /**
     * Формирует массив свойств для записи
     * @return array
     */
    public function getPropertiesForSave(): array
    {
        $result = [];
        $formFields = $this->getFormFields();

        foreach ($formFields as $field) {
            if ($field['property'] && !empty($field['store'])) {
                $result[$field['store']] = strip_tags($field['value']);
            }
        }
        return $result;
    }
}