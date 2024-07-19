<?php

namespace Sprint\Migration;


class Version20240415144408 extends Version
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
  'DESCRIPTION' => '#AUTHOR# - Автор сообщения
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
 Автор: #AUTHOR#<br>
 Телефон автора: #PHONE#<br>
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
        }

    public function down()
    {
        //your code ...
    }
}
