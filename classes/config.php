<?php 

class Config{
    public static function get_config( $config_name, $key = ''){
        $config = $_SERVER['DOCUMENT_ROOT'].'/configs/'.$config_name .'.php';
        if(file_exists($config)){
            include $config;
        
            if(array_key_exists($key, $config_data)){
                
                
                if(is_array($config_data[$key])){
                   
                    
                    return implode(';', $config_data[$key]);
                }else{
                
                    return $config_data[$key];
                }
                
            }
            else{
               
                return  $config_data;
            }
        }
        else{
            return null;
        }
        
    }

    
}
