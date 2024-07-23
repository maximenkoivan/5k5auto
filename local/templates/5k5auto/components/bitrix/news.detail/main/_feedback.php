<?php

use classes\Models\FiveKFiveAuto\Common\CommonData;
use classes\Models\FiveKFiveAuto\Feedback\FormSettings;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @global CMain $APPLICATION
 */
?>
<section class="application">
    <div class="container">
        <h2 class="application__title">Оставьте заявку</h2>
        <div class="application-order">
            <div class="application-order__form">
                <h3 class="application-order__title">Сделай шаг на встречу автомобилю своей мечты!</h3>
                <p class="application-order__text">Остальное мы возьмем на себя. Заполни данную форму, и мы перезвоним тебе
                    в ближайшее время.</p>
                <form class="application-order__select select-form" action="/callback.php" method="POST"
                      data-success-header="Заявка отправлена"
                      data-success-message="Спасибо за заполнение данной формы. Мы свяжется с вами в ближайшее время.">
                    <div id="orderForm" class="select-form__input select-form__input_name">
                        <input type="text" id="name" name="name" placeholder="Имя">
                    </div>
                    <div class="select-form__input select-form__input_phone">
                        <input type="tel" id="phone" name="phone" placeholder="+7 (000) 000 00 00">
                    </div>
                    <button class="select-form__btn" type="submit">Отправить заявку</button>
                </form>
                <p class="application-order__text application-order__text_policy">Нажимая на данную кнопку, вы даете
                    согласие на обработку персональных
                    данных и подтверждает факт ознакомления с действующей <a href="#" target="_blank"
                                                                             rel="noopener noreferrer">Политикой конфиденциальности.</a></p>
            </div>
            <div class="application-order__img">
                <img width="480" height="740" src="images/application_img.jpg" alt="Изображение">
            </div>
        </div>
    </div>
</section>
