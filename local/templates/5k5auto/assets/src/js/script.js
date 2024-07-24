import $ from 'jquery';
import IMask from 'imask';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

// Слайдер главного экрана

let hero_swiper = new Swiper(".hero-slider", {
  loop: false,
  direction: "vertical",
  mousewheel: false,
  autoHeight: true,
  allowTouchMove: false, // Отключаем свайпы для смены слайдов
  on: {
    slideChange: function (instance) {
      document.querySelectorAll('.hero-navigation__step').forEach(item => item.classList.remove('active'));
      document.querySelectorAll('.hero-navigation__step')[instance.realIndex].classList.add('active');
    },
    init: function () {
      this.updateAutoHeight(0);
    }
  },
  autoplay: {
    delay: 8000,
    disableOnInteraction: false,
  },
});

document.querySelectorAll('.hero-navigation__step').forEach((item, i) => item.addEventListener('click', function () {
  hero_swiper.slideTo(i);
}));

function scrollToNextSection() {
  const nextSection = document.querySelector('.next-section'); // Класс следующего блока
  if (nextSection) {
    setTimeout(() => {
      nextSection.scrollIntoView({ behavior: 'smooth' });
    }, 300); // Немного задерживаем скролл, чтобы было плавно
  }
}

// Обработка свайпов на мобильных устройствах
if (window.innerWidth <= 768) {
  let touchStartY = 0;
  let touchEndY = 0;

  document.querySelector('.hero-slider').addEventListener('touchstart', function (e) {
    touchStartY = e.changedTouches[0].screenY;
  });

  document.querySelector('.hero-slider').addEventListener('touchend', function (e) {
    touchEndY = e.changedTouches[0].screenY;
    handleSwipe();
  });

  function handleSwipe() {
    if (touchStartY > touchEndY + 50) {
      // Swipe up
      scrollToNextSection();
    }
  }
}

// Кнопка навверх
let buttonUp = document.querySelector(".button-up");
let informationSection = document.querySelector(".information");

window.addEventListener("scroll", function () {
  let scrollPosition = window.scrollY;
  let informationSectionBottom = informationSection.offsetTop + informationSection.offsetHeight;

  if (scrollPosition > informationSectionBottom) {
    buttonUp.classList.add("shownBtnUp");
  } else {
    buttonUp.classList.remove("shownBtnUp");
  }
});

buttonUp.addEventListener("click", function (e) {
  e.preventDefault();
  window.scrollTo({ top: 0, behavior: 'smooth' });
});


// Блок с цифрами
function animateValue(id, start, end, duration) {
  let endNum = parseFloat(end);
  if (end.length > 0 && endNum) {
    let postfix = end.replace(endNum, '');
    let range = endNum - start;
    let current = start;
    let increment = endNum > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let obj = document.getElementById(id);
    let timer = setInterval(function () {
      current += increment;
      obj.textContent = current.toString() + postfix;
      if (current === endNum) {
        clearInterval(timer);
      }
    }, stepTime);
  }
}

let options = {
  root: null,
  rootMargin: '0px',
  threshold: 0.1
};

let observer = new IntersectionObserver(function (entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        animateValue("card-years", 1, $('#card-years')?.text(), 2000);
        animateValue("card-projects", 1, $('#card-projects')?.text(), 2500);
        animateValue("card-specialists", 1, $('#card-specialists')?.text(), 2000);
      }, 500);
      observer.unobserve(entry.target);
    }
  });
}, options);

let target = document.querySelector('.information__cards');
observer.observe(target);

// Вызов Fancy
document.querySelectorAll('[data-video]').forEach(item => {
  item.addEventListener('click', () => {
    Fancybox.show([{ src: item.getAttribute('data-video') }], {
      trapFocus: false,
      scrolling: false,
    });
  });
});

// Инициализация Fancybox
Fancybox.bind('[data-fancybox]', {
  trapFocus: false,
  scrolling: false,
});

// Фиксим баги открытия модалки с модалки
function openModal(modalId) {
  Fancybox.show([{ src: modalId, type: 'inline' }]);
}

document.querySelector('.modal-promotion__btn').addEventListener('click', function () {
  const targetModalId = this.getAttribute('data-src');

  Fancybox.close();
  Fancybox.on('afterClose', function () {
    openModal(targetModalId);
  });
});

// Слайдеры
function initializeSwiper(selector, parentSelector) {
  const swiperContainer = document.querySelector(selector);
  const swiperParent = swiperContainer.closest(parentSelector);
  const nextButton = swiperParent.querySelector('.swiper-button-next');
  const prevButton = swiperParent.querySelector('.swiper-button-prev');

  const swiper = new Swiper(swiperContainer, {
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 20,
    breakpoints: {
      991.98: { slidesPerView: 2 },
      0: { slidesPerView: 1 },
    },
    navigation: {
      nextEl: nextButton,
      prevEl: prevButton,
    },
    on: {
      init: function () {
        adjustSlideHeight();
        this.update();
      },
      resize: function () {
        adjustSlideHeight();
        this.update();
      },
    },
  });
}

initializeSwiper('.portfolio-slider', '.portfolio');
initializeSwiper('.reviews-slider', '.reviews__slider');

function adjustSlideHeight() {
  const sliders = document.querySelectorAll('.swiper');
  sliders.forEach(slider => {
    let maxHeight = 0;
    const slides = slider.querySelectorAll('.swiper-slide');
    slides.forEach(slide => {
      slide.style.height = 'auto';
      const slideHeight = slide.offsetHeight;
      if (slideHeight > maxHeight) {
        maxHeight = slideHeight;
      }
    });
    slides.forEach(slide => {
      slide.style.height = `${maxHeight}px`;
    });
  });
}

// Квиз

const quizForm = document.querySelector('.quiz-form');
const quizSteps = document.querySelectorAll('.modal-quiz__item');
const nextButtons = document.querySelectorAll('.modal-quiz__btn');
const finishTitle = document.getElementById('quiz-finish-title');
const finishText = document.getElementById('quiz-finish-text');
const quizStart = document.querySelector('.quiz-start');
let currentStep = 0;

const finishData = {
  "quiz-1": {
    title: "Владельцам новых автомобилей мы однозначно рекомендуем<br> восспользоваться услугами оклейки.",
    text: "Это позволит сохранить блеск и новизну вашего автомобиля на долгие годы, а также защитит лакокрасочное покрытие от сколов и царапин.Заполните данную форму, и мы перезвоним вам в ближайшее время."
  },
  "quiz-2": {
    title: "Владельцам дорогостоящих автомобилей мы однозначно рекомендуем восспользоваться услугами оклейки.",
    text: "Это позволит сохранить блеск и новизну вашего автомобиля на долгие годы, а также защитит лакокрасочное покрытие от сколов и царапин.Заполните данную форму, и мы перезвоним вам в ближайшее время."
  },
  "quiz-3": {
    title: "Автовладельцам, активно эксплуатирующим свой автомобиль, мы рекомендуем восспользоваться нашими услугами.",
    text: "Возможно, стоит ограничится только оклейкой зон риска, но для максимально выгодной продажи в будущем мы, однозначно, рекомендуем воспользоваться нашими услугами.Заполните данную форму, и мы перезвоним вам в ближайшее время."
  },
  "quiz-4": {
    title: "Возможно, услуги оклейки<br> автомобиля вам менее<br> необходимы.",
    text: "Все-таки для сохранения лакокрасочного покрытия в зонах риска мы рекомендовали бы вам воспользоваться нашими услугами.Заполните данную форму, и мы перезвоним вам в ближайшее время."
  }
};

let autoUse;  // Глобальная переменная для хранения значения из quiz-3
let autoSell; // Глобальная переменная для хранения значения из quiz-4

// Перезапускаем функцию goToNextStep
const restartQuiz = () => {
  // Сброс currentStep на 0
  currentStep = 0;

  // Показываем элемент quiz-start
  const quizStartBlock = document.querySelector('.quiz-start');
  if (quizStartBlock) {
    quizStartBlock.style.display = ''; // Сбрасываем display
    quizStartBlock.classList.add('quiz-active'); // Добавляем класс quiz-active
  }

  // Скрываем блок quiz-finish
  const quizFinishBlock = document.querySelector('.quiz-finish');
  if (quizFinishBlock) {
    quizFinishBlock.style.display = 'none'; // Скрываем блок quiz-finish
    quizFinishBlock.classList.remove('quiz-active'); // Удаляем класс quiz-active, если он был
  }

  // Удаляем класс quiz-active у всех шагов
  quizSteps.forEach(step => {
    step.classList.remove('quiz-active');
    step.style.display = 'none'; // Скрываем все шаги
  });

  // Показываем первый шаг
  if (quizSteps[currentStep]) {
    quizSteps[currentStep].style.display = ''; // Показываем первый шаг
    quizSteps[currentStep].classList.add('quiz-active'); // Добавляем класс quiz-active
  }
};

// Обновляем функцию goToNextStep для поддержки перезапуска
const goToNextStep = () => {
  if (currentStep < quizSteps.length - 1) {
    // Скрыть блок quiz-start при первом переходе
    if (currentStep === 0) {
      document.querySelector('.quiz-start').style.display = 'none';
    }

    if (quizSteps[currentStep]) {
      quizSteps[currentStep].classList.remove('quiz-active');
      quizSteps[currentStep].style.display = 'none'; // Скрываем текущий шаг
    }

    currentStep++;

    if (quizSteps[currentStep]) {
      quizSteps[currentStep].classList.add('quiz-active');
      quizSteps[currentStep].style.display = ''; // Показываем следующий шаг
    }

    // Если достигнут последний шаг
    if (currentStep === quizSteps.length - 1) {
      updateFinishContent();
    }
  }
};

// Модальные окна
document.addEventListener('DOMContentLoaded', function () {
  let modals = document.querySelectorAll('button[data-src]');

  modals.forEach(function (button) {
    button.addEventListener('click', function () {
      let src = button.getAttribute('data-src');
      Fancybox.show([{ src: src, type: "inline" }],
        {
          on: {
            close: () => {
              // Удаляем все сообщения об ошибках
              document.querySelectorAll('.error-message').forEach((element) => {
                element.remove();
              });

              // Перезапускаем квиз
              restartQuiz();
            }
          },
        }
      );
    });
  });
});


const goToFinishStep = (step) => {
  quizSteps[currentStep].classList.remove('quiz-active');
  quizSteps[currentStep].style.display = 'none';
  const finishStep = document.querySelector('.quiz-finish');
  finishStep.style.display = 'block';
  finishStep.classList.add('quiz-active');
  updateFinishContent(step);
};

const updateFinishContent = (step) => {
  finishTitle.innerHTML = finishData[step].title;
  finishText.innerHTML = finishData[step].text;
};

nextButtons.forEach(button => {
  button.addEventListener('click', () => {
    const currentQuiz = quizSteps[currentStep];

    if (currentQuiz.classList.contains('quiz-3')) {
      // Получаем выбранное значение в quiz-3
      autoUse = document.querySelector('input[name="auto-use"]:checked')?.value;

      // Переход к quiz-4
      goToNextStep();
    } else if (currentQuiz.classList.contains('quiz-4')) {
      // Получаем выбранное значение в quiz-4
      autoSell = document.querySelector('input[name="auto-sell"]:checked')?.value;

      // Логика для определения финального экрана
      if (autoUse === "Каждый день" || autoUse === "1-2 раза в неделю") {
        if (autoSell === "Да") {
          goToFinishStep('quiz-3');
        } else if (autoSell === "Нет") {
          goToFinishStep('quiz-4');
        }
      } else if (autoUse === "Редко") {
        if (autoSell === "Да") {
          goToFinishStep('quiz-3');
        } else if (autoSell === "Нет") {
          goToFinishStep('quiz-4');
        }
      }
    } else if (currentQuiz.classList.contains('quiz-1')) {
      const selectedValue = document.querySelector('input[name="auto-age"]:checked')?.value;
      if (selectedValue === 'Менее 1 года') {
        goToFinishStep('quiz-1');
      } else {
        goToNextStep();
      }
    } else if (currentQuiz.classList.contains('quiz-2')) {
      const selectedValue = document.querySelector('input[name="auto-price"]:checked')?.value;
      if (selectedValue === 'Более 4 млн.') {
        goToFinishStep('quiz-2');
      } else {
        goToNextStep();
      }
    } else {
      goToNextStep();
    }
  });
});


quizSteps.forEach(item => {
  item.addEventListener('change', function (event) {
    if (event.target.type === 'radio') {
      const btn = item.querySelector('.modal-quiz__btn');
      btn.classList.remove('disabled');
    }
  });
});

// Faq
const accordionButtons = document.querySelectorAll(".accordion__button");
let currentActiveButton = null;

accordionButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    const currentButton = event.target.closest(".accordion__button");
    const currentContent = currentButton.nextElementSibling;

    if (currentActiveButton && currentActiveButton !== currentButton) {
      const previousContent = currentActiveButton.nextElementSibling;
      previousContent.style.maxHeight = 0;
      previousContent.style.borderColor = "transparent";
      previousContent.style.backgroundColor = "transparent";
      currentActiveButton.classList.remove("active");
    }

    const isActive = currentButton.classList.toggle("active");
    currentContent.style.maxHeight = isActive ? `${currentContent.scrollHeight}px` : 0;
    currentContent.style.borderColor = isActive ? "#ffffff80" : "transparent";
    currentContent.style.backgroundColor = isActive ? "#010101" : "transparent";

    if (isActive) {
      currentActiveButton = currentButton;
    } else {
      currentActiveButton = null;
    }
  });
});


// Валидация формы

// Маска для ввода телефона
function applyPhoneMask() {
  $('input[type="tel"]').each(function () {
    if (this.maskRef) {
      this.maskRef.destroy();
    }
    var maskOptions = {
      mask: '+7 (000) 000-00-00',
      lazy: false
    };
    this.maskRef = IMask(this, maskOptions);
  });
}

// Применение маски для телефонов при загрузке страницы
applyPhoneMask();

// Обработчик изменений ввода для полей ввода формы
$(document).on('input', 'form input', function () {
  const input = $(this);
  const inputParent = input.parent();
  clearErrorMessage(inputParent);
});

// Обработчик отправки формы
$(document).on('submit', 'form', function (event) {
  event.preventDefault(); // Предотвращение стандартного поведения отправки формы
  const form = $(this);
  let isValidForm = true;

  // Проверяем, что это финальная форма
  if (form.find('button[type="submit"]').length === 0) {
    return; // Если это не финальная форма, выходим
  }

  // form.find('input').each(function () {
  //   const input = $(this);
  //   const inputParent = input.parent();
  //   const inputValue = input.val().trim();
  //
  //   clearErrorMessage(inputParent); // Очистка старых сообщений об ошибках
  //
  //   if (!inputValue) {
  //     showErrorMessage(inputParent, `Введите ${input.attr('placeholder').toLowerCase()}`);
  //     isValidForm = false;
  //   } else if (input.attr('name') === 'phone' && inputValue.replace(/\D/g, '').length !== 11) {
  //     showErrorMessage(inputParent, 'Введите корректный номер телефона');
  //     isValidForm = false;
  //   } else if (input.attr('name') === 'name' && !/^[A-Za-zА-Яа-я\s"']+$/.test(inputValue)) {
  //     showErrorMessage(inputParent, 'Введите корректное имя');
  //     isValidForm = false;
  //   }
  // });

  if (isValidForm) {
    const formData = form.serialize(); // Сериализация данных формы для отправки

    // AJAX запрос для отправки данных формы на сервер
    $.ajax({
      url: form.attr('action'),
      type: 'POST',
      data: formData,
      success: function (response) {
        const data = JSON.parse(response);
        form.find('.error-message').remove();
        if (data.name) {
          showErrorMessage(form.find('[name="name"]').parent(), data.name);
        }
        if (data.phone) {
          showErrorMessage(form.find('[name="phone"]').parent(), data.phone);
        }
        if (data?.length === 0) {
          // alert(form.data('success-header')); // Заголовок успешного отправления
          // alert(form.data('success-message')); // Сообщение успешного отправления
          Fancybox.close(); // Закрытие текущего модального окна (если открыто)
          openModal('#modal-thnx'); // Открытие модального окна с id "modal-thnx"
          form[0].reset();
          applyPhoneMask();
        }
      },
      error: function () {
        form.find('.error-message').remove(); // Удаление существующих сообщений об ошибках
        if (!form.find('.server-error').length) {
          form.find('[type="submit"]').before('<div class="error-message server-error">Произошла ошибка сервера</div>');
        }
      }
    });
  }
});

// Функция для удаления сообщения об ошибке
function clearErrorMessage(inputParent) {
  inputParent.removeClass('has-error');
  inputParent.next('.error-message').remove();
}

// Функция для отображения сообщения об ошибке
function showErrorMessage(inputParent, message) {
  inputParent.addClass('has-error');
  if (!inputParent.next('.error-message').length) {
    inputParent.after('<div class="error-message">' + message + '</div>');
  }
}