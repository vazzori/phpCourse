<?php 

class Config{
    public static function get_config( $config_name, $key = ''){
        $config = $_SERVER['DOCUMENT_ROOT'].'/configs/'.$config_name .'.php';
        if(file_exists($config)){
            include $config;
        
            if(array_key_exists($key, $layout_config)){
                
                
                if(is_array($layout_config[$key])){
                   
                    
                    return implode(';', $layout_config[$key]);
                }else{
                
                    return $layout_config[$key];
                }
                
            }
            else{
               
                return  $layout_config;
            }
        }
        else{
            return null;
        }
        
    }

    
}
// echo Config::get_config('layout', 'font');
// echo Config::get_config('layout', 'width');