<?php

namespace Sprint\Migration;


class Version20240415163712 extends Version
{
    protected $description = "Почтовые события";

    protected $moduleVersion = "4.6.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Event()->saveEventType('CALLBACK_FORM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заявка на обратный звонок',
  'DESCRIPTION' => '#NAME# - Автор сообщения
#PHONE# - Номер телефона',
  'SORT' => '150',
));
            $helper->Event()->saveEventType('CALLBACK_FORM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => '',
  'DESCRIPTION' => '',
  'SORT' => '150',
));
            $helper->Event()->saveEventMessage('CALLBACK_FORM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
  'SUBJECT' => '#SITE_NAME#: Заявка на обратный звонок',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#<br>
 ------------------------------------------<br>
 <br>
 Вам было отправлено сообщение через форму обратной связи<br>
 <br>
 Имя: #NAME#<br>
 Телефон: #PHONE#<br>
 <br>
Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'html',
  'BCC' => '',
  'REPLY_TO' => '',
  'CC' => '',
  'IN_REPLY_TO' => '',
  'PRIORITY' => '',
  'FIELD1_NAME' => '',
  'FIELD1_VALUE' => '',
  'FIELD2_NAME' => '',
  'FIELD2_VALUE' => '',
  'SITE_TEMPLATE_ID' => 'email_templates',
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ CALLBACK_FORM ] Заявка на обратный звонок',
));
            $helper->Event()->saveEventType('ORDER_FORM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Заявка на услугу',
  'DESCRIPTION' => '#NAME# - Имя отправителя
#PHONE# - Номер телефона
#TEXT# - Текст сообщения
#PLACE# - Место нахождения объекта
#SERVICES# - Тип услуги
#BUILD_TYPE# - Тип здания
#NUMBER_FLOOR# - Номер этажа
#TOTAL_FLOOR# - Всего этажей
#TYPE_WORK# - Тип работ
#TOTAL_COUNT# - Общее количество стеклопакетов
#LIFT# - Подъем негабаритных грузов
#ITEMS_NUMBER# - Количество предметов
#WEIGHT# - Вес самого тяжелого предмета
#FLOOR_COUNT# - Сколько этажей до крыши
#COVER# - Тип кровли дома
',
  'SORT' => '150',
));
            $helper->Event()->saveEventType('ORDER_FORM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => '',
  'DESCRIPTION' => '',
  'SORT' => '150',
));
            $helper->Event()->saveEventMessage('ORDER_FORM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
  'SUBJECT' => '#SERVER_NAME#: Новая заявка на услугу',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#<br>
 ------------------------------------------<br>
 <br>
 Вам было отправлено сообщение через форму обратной связи<br>
 <br>
 Имя: #NAME#<br>
 Телефон: #PHONE#<br>
 Место нахождения объекта:&nbsp;#PLACE#<br>
 Тип услуги:&nbsp;#SERVICES#<br>
 Тип здания:&nbsp;#BUILD_TYPE#<br>
 Номер этажа:&nbsp;#NUMBER_FLOOR#<br>
 Всего этажей:&nbsp;#TOTAL_FLOOR#<br>
 Тип работ:&nbsp;#TYPE_WORK#<br>
 Общее количество стеклопакетов:#TOTAL_COUNT#<br>
 Подъем негабаритных грузов:&nbsp;#LIFT#<br>
 Количество предметов:&nbsp;#ITEMS_NUMBER#<br>
 Вес самого тяжелого предмета:&nbsp;#WEIGHT#<br>
 Сколько этажей до крыши:&nbsp;#FLOOR_COUNT#<br>
 Тип кровли дома:&nbsp;#COVER#<br>
 <br>
Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'html',
  'BCC' => '',
  'REPLY_TO' => '',
  'CC' => '',
  'IN_REPLY_TO' => '',
  'PRIORITY' => '',
  'FIELD1_NAME' => '',
  'FIELD1_VALUE' => '',
  'FIELD2_NAME' => '',
  'FIELD2_VALUE' => '',
  'SITE_TEMPLATE_ID' => 'email_templates',
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ ORDER_FORM ] Заявка на услугу',
));
        }

    public function down()
    {
        //your code ...
    }
}
