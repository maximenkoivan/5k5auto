<?php

namespace classes\Models\FiveKFiveAuto\Feedback;

use classes\Models\Base\Iblock;

class Feedback extends Iblock
{
    protected const IBLOCK_TYPE_CODE = '5k5auto';

    protected const IBLOCK_CODE = 'feedback';
    private const EVENT_NAME = '5K5_CALLBACK_FORM';

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
//        'recaptcha_response' => [
//            'ru' => 'recaptcha',
//            'en' => 'recaptcha',
//            'rules' => 'recaptcha',
//            'value' => ''
//        ],
    ];

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
     * Формирует массив данных для почтового шаблона
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
            if(!$field['property'] && !empty($field['store'])) {
                $result[$field['store']] = $field['value'];
            }
        }

        if(!empty($additionalFields) && is_array($additionalFields)) {
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
            if($field['property'] && !empty($field['store'])) {
                $result[$field['store']] = strip_tags($field['value']);
            }
        }
        return $result;
    }
}