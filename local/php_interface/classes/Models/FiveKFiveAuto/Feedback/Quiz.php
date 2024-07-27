<?php

namespace classes\Models\FiveKFiveAuto\Feedback;

use classes\Models\Base\Iblock;

class Quiz extends Iblock
{
    protected const IBLOCK_TYPE_CODE = '5k5auto';

    protected const IBLOCK_CODE = 'quiz';
    private const EVENT_NAME = '5K5_QUIZ_FORM';

    private array $formFields = [
        'name' => [
            'ru' => '""Имя"',
            'en' => 'Name',
            'rules' => 'required|min:2|max:50',
            'value' => 'Не указано',
            'property' => false,
            'store' => 'NAME'
        ],
        'phone' => [
            'ru' => '"Номер телефона"',
            'en' => '',
            'rules' => 'required|phone|max:50',
            'value' => '',
            'property' => true,
            'store' => 'PHONE'
        ],
        'auto-age' => [
            'ru' => 'Сколько лет вашему автомобилю',
            'en' => '',
            'rules' => 'max:50',
            'value' => '',
            'property' => true,
            'store' => 'AGE'
        ],
        'auto-price' => [
            'ru' => 'Какова стоимость вашего автомобиля',
            'en' => '',
            'rules' => 'max:50',
            'value' => '',
            'property' => true,
            'store' => 'PRICE'
        ],
        'auto-use' => [
            'ru' => 'Как часто вы ездите на машине',
            'en' => '',
            'rules' => 'max:50',
            'value' => '',
            'property' => true,
            'store' => 'USE'
        ],
        'auto-sell' => [
            'ru' => 'Вы планируете продать свой автомобиль максимально выгодно',
            'en' => '',
            'rules' => 'max:50',
            'value' => '',
            'property' => true,
            'store' => 'SELL'
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
    public function getMailFields($elementId): array
    {
        $fields = $this->getFieldsForMail();

        $files = $this->getPropertiesByElementId($elementId, ['PROPERTY_TYPE' => 'F']);

        return [
            "EVENT_NAME" => self::EVENT_NAME,
            "LID" => SITE_ID,
            "C_FIELDS" => $fields,
            "FILE" => array_column($files, 'VALUE')
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
            if (is_array($field['value']) && $field['type'] != ['file']) {
                $text = '<br>';
                foreach ($field['value'] as $key => $value) {
                    $postfix = array_key_last($field['value']) == $key ? '' : ' <br> ';
                    $text .= $value . $postfix;
                }
                $field['value'] = $text;
            }
            $result[$field['store']] = $field['type'] !== 'file' ? $field['value'] : '';
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