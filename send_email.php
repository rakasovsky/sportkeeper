<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Отправка письма на почту
    $to = "rakasovsky1@gmail.com";
    $subject = "Новое сообщение с формы";
    $body = "Имя: $name\nEmail: $email\nСообщение: $message";
    $headers = "From: $email";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
      // Отправка сообщения в Telegram
      $telegramToken = '5826283743:AAGx1DcnX-ERPAJK6qgUWbxmjXaY-FhVvIw'; // Замените на свой токен Telegram
      $chatId = '162265239'; // Замените на ID вашего чата в Telegram
      $telegramMessage = "Новое сообщение с формы\n\nИмя: $name\nEmail: $email\nСообщение: $message";
      file_get_contents("https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=".urlencode($telegramMessage));

      http_response_code(200);
    } else {
      http_response_code(500);
    }
  }
?>