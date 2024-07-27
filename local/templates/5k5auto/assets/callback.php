<?php
// Проверка, что данные были отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из POST запроса
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    // Имитация обработки данных
    // В реальном приложении здесь был бы ваш код обработки формы

    // Вывод данных для тестирования
    switch (true) {
        case empty($name) && $phone === '+7 (___) ___-__-__':
            echo json_encode(['name' => 'Поле "Имя" не может быть пустым', 'phone' => 'Поле "Телефон" не может быть пустым']);
            break;
        case empty($name):
            echo json_encode(['name' => 'Поле "Имя" не может быть пустым']);
            break;
        case $phone === '+7 (___) ___-__-__':
            echo json_encode(['phone' => 'Поле "Телефон" не может быть пустым']);
            break;
        default:
            echo json_encode([]);
    }
} else {
    // Если данные не были отправлены методом POST, выводим сообщение
    echo "Ошибка: данные формы не были отправлены методом POST.";
}
?>