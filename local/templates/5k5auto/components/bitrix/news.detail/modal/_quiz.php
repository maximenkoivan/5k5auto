<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var $arResult
 * @var $request
 * @global CMain $APPLICATION
 */
?>
<div id="modal-quiz" class="modal-quiz">
    <div class="modal-quiz__wrapper">
        <form class="quiz-form" action="/request/feedback.php" method="POST">
            <div class="container">
                <div class="modal-quiz__item quiz-start quiz-active">
                    <div class="modal-quiz__left">
                        <div class="modal-quiz__top">
                            <div class="modal-quiz__logo">
                                <a href="#" target="_blank" rel="noopener noreferrer"><img src="images/modal-form-logo.png"
                                                                                           width="111" height="86" alt="Логотип"></a>
                            </div>
                            <p class="modal-quiz__adress">
                                <span>Москва, 6-Я Радиальная, 5к5<br> Режим работы: пн-вс 09:00-21:00</span>
                            </p>
                        </div>
                        <ul class="modal-quiz__contacts">
                            <li><a href="tel:+79774841544" target="_blank" rel="noopener noreferrer">+7(977) 484-15-44</a></li>
                            <li><a href="mailto:info@auto5k5.ru" target="_blank" rel="noopener noreferrer">info@auto5k5.ru</a></li>
                        </ul>
                        <h2 class="modal-quiz__title">Пройдите тест, чтобы<br> узнать целесообразность<br> оклейки вашего авто
                        </h2>
                        <p class="modal-quiz__text">После прохождения теста, вы в кратчайшие сроки получите информацию о сроках,
                            стоимости и целесообразности оклейки.</p>
                        <div class="modal-quiz__btn">Пройти</div>
                    </div>
                    <div class="modal-quiz__right">
                        <img width="480" height="680" src="images/modal-quiz-img.jpg" alt="Клейщик">
                    </div>
                </div>
                <div class="modal-quiz__item quiz-1">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title">Сколько лет вашему автомобилю?</h2>
                        <div class="modal-quiz__questions">
                            <label class="checkbox-element">Менее 1 года <input type="radio" value="Менее 1 года" name="auto-age">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">От 1 до 3 лет <input type="radio" value="От 1 до 3 лет" name="auto-age">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">Больше 3 лет <input type="radio" value="Больше 3 лет" name="auto-age">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled">Далее</div>
                        <img src="images/modal_car.png" width="760" height="430" alt="Машина">
                    </div>
                </div>
                <div class="modal-quiz__item quiz-2">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title">Какова стоимость вашего автомобиля?</h2>
                        <div class="modal-quiz__questions">
                            <label class="checkbox-element">Менее 2 млн. <input type="radio" value="Менее 2 млн." name="auto-price">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">От 2 до 4 млн. <input type="radio" value="От 2 до 4 млн."
                                                                                  name="auto-price">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">Более 4 млн. <input type="radio" value="Более 4 млн." name="auto-price">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled">Далее</div>
                        <img src="images/modal_car.png" width="760" height="430" alt="Машина">
                    </div>
                </div>
                <div class="modal-quiz__item quiz-3">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title">Как часто вы ездите на машине?</h2>
                        <div class="modal-quiz__questions">
                            <label class="checkbox-element">Каждый день <input type="radio" value="Каждый день" name="auto-use">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">1-2 раза в неделю <input type="radio" value="1-2 раза в неделю"
                                                                                     name="auto-use">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">Редко <input type="radio" value="Редко" name="auto-use">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled">Далее</div>
                        <img src="images/modal_car.png" width="760" height="430" alt="Машина">
                    </div>
                </div>
                <div class="modal-quiz__item quiz-4">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title">Вы планируете продать свой автомобиль максимально выгодно?</h2>
                        <div class="modal-quiz__questions">
                            <label class="checkbox-element">ДА <input type="radio" value="Да" name="auto-sell">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-element">НЕТ <input type="radio" value="Нет" name="auto-sell">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-quiz__bottom">
                        <div class="modal-quiz__btn disabled">Далее</div>
                        <img src="images/modal_car.png" width="760" height="430" alt="Машина">
                    </div>
                </div>
                <div class="modal-quiz__item quiz-finish">
                    <div class="modal-quiz__content">
                        <div class="modal-quiz__progress">
                            <div class="progress-line"></div>
                        </div>
                        <h2 class="modal-quiz__title" id="quiz-finish-title"></h2>
                        <p class="modal-quiz__text" id="quiz-finish-text"></p>
                        <div class="modal-quiz__form form-quiz">
                            <div class="form-quiz__inputs">
                                <div class="form-quiz__inputs-w">
                                    <div class="form-quiz__input form-quiz__input_name">
                                        <input type="text" id="name" name="name" placeholder="Имя">
                                    </div>
                                </div>
                                <div class="form-quiz__inputs-w">
                                    <div class="form-quiz__input form-quiz__input_phone">
                                        <input type="tel" id="phone" name="phone" placeholder="+7 (000) 000 00 00">
                                    </div>
                                </div>
                            </div>
                            <div style="display: none">
                                <input name="form" value="<?= $arResult['PROPERTIES']['FORM_NAME_QUIZ']['~VALUE'] ?>">
                                <input name="utm_source" value="<?= $request->get('utm_source') ?>">
                                <input name="utm_medium" value="<?= $request->get('utm_medium') ?>">
                                <input name="utm_campaign" value="<?= $request->get('utm_campaign') ?>">
                                <input name="utm_term" value="<?= $request->get('utm_term') ?>">
                                <input name="utm_content" value="<?= $request->get('utm_content') ?>">
                            </div>
                            <div class="form-quiz__select">
                                <button class="form-quiz__btn" type="submit">Рассчитать стоимость</button>
                                <p class="form-quiz__text">Нажимая на данную кнопку, вы даете
                                    согласие на обработку персональных
                                    данных и подтверждает факт ознакомления с действующей <a href="#" target="_blank"
                                                                                             rel="noopener noreferrer">Политикой
                                        конфиденциальности.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
