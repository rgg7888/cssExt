<?php

if(!function_exists('style')) {
    function style($content = null,array $atributos = []) {
        $style = new App\tags\style\Style($content,$atributos);
        return $style->add();
    }
}

if(!function_exists('sye')) {
    function sye(array $propiedades,string $selector = "",int $serie = 0,$jump = false) {
        $sye = new App\selector\Selector;
        if($jump) {
            $sye->Propiedades($propiedades);
        }else{
            $sye->setPropiedades($propiedades);
        }
        $sye->setSelector($selector);
        return $sye->getCss($serie,$jump);
    }
}

if(!function_exists('css')) {
    function css (array $selectores_propiedades) {
        return style($selectores_propiedades);
    }
}