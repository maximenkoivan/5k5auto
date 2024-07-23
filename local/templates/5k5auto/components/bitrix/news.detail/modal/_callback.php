<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<div id="modal-call" class="modal-call">
    <div class="container">
        <div class="modal-call__form">
            <h2 class="modal-call__title">Заполните форму и<br> мы свяжемся с вами<br> в ближайшее время</h2>
            <form class="modal-call__select select-form" action="/callback.php" method="POST"
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
            <p class="modal-call__text modal-call__text_policy">Нажимая на данную кнопку, вы даете
                согласие на обработку персональных
                данных и подтверждает факт ознакомления с действующей <a href="#" target="_blank"
                                                                         rel="noopener noreferrer">Политикой конфиденциальности.</a></p>
        </div>
    </div>
</div>