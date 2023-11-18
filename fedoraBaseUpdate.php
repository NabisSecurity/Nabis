<?php
$url = "https://feodotracker.abuse.ch/downloads/ipblocklist_recommended.json";

// Получение JSON-данных
$jsonData = file_get_contents($url);

// Преобразование JSON в массив или объект
$data = json_decode($jsonData, true); // обратите внимание на второй аргумент true для преобразования в массив

$fileName = "example.txt";  // Имя файла

// Открываем файл в режиме записи
$file = fopen($fileName, "w");
// Проверяем, удалось ли открыть файл
    // Записываем данные в файл
  foreach ($data as $value) {
    echo $value["ip_address"];
    echo "\n";
    fwrite($file, $value["ip_address"]);
    fwrite($file, "\n");
    
  }
    // Закрываем файл
fclose($file);

echo "Файл успешно создан и данные записаны.";




?>