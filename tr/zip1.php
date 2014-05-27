<?php
 

  $zip = new ZipArchive(); //Создаём объект для работы с ZIP-архивами
  $zip->open("archive.zip", ZIPARCHIVE::CREATE); //Открываем (создаём) архив archive.zip
  $zip->addFile("tr.php"); //Добавляем в архив файл index.php
  $zip->addFile("tr_1.php"); //Добавляем в архив файл styles/style.css

?>
