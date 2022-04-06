<?php
class Layout
{
    // массив для хранения статики
    private $static = [];

    private static $instances = [];
    
    // одиночки не должны быть клонируемыми
    protected function __clone() { }

    // одиночки не должны быть восстанавливаемыми из строк
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a Layout.");
    }

    // метод для подключения статики
    public function add_static($static_name){
        $static_type = pathinfo($static_name, PATHINFO_EXTENSION); // узнаем тип принимаемой статики
        if($static_type == 'css'){ // проверка на тип статики, если это css то добавляется в соответствующий массив
            $this->static['css'][] = $static_name;
        }elseif($static_type == 'js') // по аналогии, только с js
        {
            $this->static['js'][] = $static_name;
        }else{ // если никуда не подходит, то записывается в css
            $this->static['css'][] = $static_name;
        }
    }

    // подключение css файлов к странице
    public function include_css(){
        foreach ($this->static['css'] as $style){
            $path = '/static/css/'.$style;
            if( file_exists($_SERVER['DOCUMENT_ROOT'].'/static/css/'.$style) ) {
                echo "<link rel='stylesheet' href='{$path}'>";
            }
        }
    }
    // подключение js файлов к странице
    public function include_scripts(){
        foreach ($this->static['js'] as $script){
            $path = '/static/js/'.$script;
            if( file_exists($_SERVER['DOCUMENT_ROOT'].'/static/js/'.$script) ) {
                echo "<script defer src='{$path}'></script>";
            }
        }
    }

    // подключение шрифта
    public function include_font($font){
        $font_replace = str_replace(' ', '+', $font);
        echo "<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        <link href=\"https://fonts.googleapis.com/css2?family={$font_replace}:wght@300;500;600;700;800&display=swap\" rel=\"stylesheet\">
        <style>
            :root {
                font-family: '{$font}', sans-serif;
            }
        </style>";
    }

    //подключение файла bootstrap.css
    private function include_bootstrap(){
        $this->add_static('bootstrap.css');
    }

    // при первом запуске, он создаёт экземпляр одиночки и помещает его в статическое поле. При последующих запусках, он возвращает клиенту объект,  хранящийся в статическом поле
    public static function getInstance(): Layout
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }

    // конструктор Одиночки всегда должен быть скрытым, чтобы предотвратить создание объекта через оператор new, задает настройки при создании экземпляра класса
    protected function __construct() {
        $this->include_bootstrap();
    }
   
}


