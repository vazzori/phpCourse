<?php 
// функция autoload 
spl_autoload_register(function($class_name){
    $path = __DIR__.'/classes/'.strtolower($class_name).'.php'; // переменная путь принимает директорию файла через волшебную константу __DIR__ с последующим путем
    if( file_exists($path)){ // проверка на существование файла
        include_once "$path"; // если данный файл существует, то он подключается 
    }
});
