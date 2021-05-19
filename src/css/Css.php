<?php

namespace App\css;

class Css {

    private array $css;

    public static function instancia () {
        return new self;
    }

    public function setCss (array $css) {
        $this->css = $css;
    }

    public function getCss () {
        return $this->css;
    }

    public function __construct($css = []){
        if(!empty($css)) {
            $this->setCss($css);
        }else{
            $this->css = [];
        }
    }
    
    public function insertStyle (array $css) {
        if(array_key_exists('480',$css) || array_key_exists('768',$css) || array_key_exists('1024',$css)) {
            $breakPoins = [];
            foreach($css as $key => $value) {
                foreach($value as $key2 => $value2){
                    array_push($breakPoins, "@media screen and (min-width: ".$key."px){".$key2." {".implode("",$value2)."}}");
                }
            }
            $breakString = '';
            foreach($breakPoins as $breakPoin) {
                $breakString .= $breakPoin;
            }
            return $breakString;
        }else{
            $breakString = '';
            foreach($css as $key => $value) {
                $breakString .= $key." {".implode("",$value)."}";
            }
            return $breakString;
        }
    }

}