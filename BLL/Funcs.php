<?php

namespace BLL;

class Funcs {
    
    function changeDate($date, $target){
        // == 0  print on browser
        // >= 1  save in data base
        if($target == 0 || empty($target)){
            if(empty($date)){
                return '';
            }else{
                return date("d-m-Y", strtotime($date));
            }            
        }else{
            if(empty($date)){
                return 'NULL';
            }else{
                return date("Ymd", strtotime($date));
            }            
        }
    }
    
    function changeNull($data){
        if(empty($data)){
            return 'NULL';
        }
    }
}
