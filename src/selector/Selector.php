<?php

namespace App\selector;

class Selector {

    private array $modelo = [
        'propiedades' => null,
        'selector' => null,
        'css' => null
    ];

    public function __construct(){}

    public function setPropiedades(array $_propiedades) {
        $propiedades = '';
        
        foreach($_propiedades as $key => $value) {
            if($key === 'import') {
                $propiedades .= '@'.$key.' url("'.$value.'");';
            }else{
                $propiedades .= $key.': '.$value.';';
            }
        }
        
        $this->modelo['propiedades'] = $propiedades;
    }

    public function Propiedades(array $_propiedades) {
        $this->modelo['propiedades'] = $_propiedades;
    }

    public function getPropiedades() {
        return $this->modelo['propiedades'];
    }

    public function setSelector(string $selector) {
        $this->modelo['selector'] = $selector;
    }

    public function getSelector() {
        return $this->modelo['selector'];
    }

    public function setCss(string $css) {
        $this->modelo['css'] = $css;
    }

    public function make (int $serie = 0,$jump = false) {
        if($this->getSelector() !== null) {
            $selector = '';
            if($serie > 0) {
                if($jump === false){
                    $selector = $this->getSelector();
                    for($i = 1; $i < $serie; $i++) {
                        $selector .= ' ,' . $this->getSelector().$i;
                    }
                    $selector .= ' { ' . $this->getPropiedades() . ' }';
                }else{
                    $selectores = [];
                    for($i = 1; $i < $serie; $i++) {
                        array_push($selectores,$this->getSelector().$i);
                    }
                    $propiedades = $this->getPropiedades();
                    $longCssString = '';
                    for($y = 0; $y < count($selectores); $y++) {
                        $longCssString .= $selectores[$y] . ' { ' . $propiedades[0] . ': ' . $propiedades[$y+1] . '; }';
                    }
                    $selector = $longCssString;
                }
            }else{
                $selector = $this->getSelector() . ' { ' . $this->getPropiedades() . ' }';
            }
            $this->setCss($selector);
        }else{
            $css = $this->getPropiedades();
            $this->setCss($css);
        }
    }

    public function getCss(int $serie = 0,$jump = false) {
        $this->make($serie,$jump);
        return $this->modelo['css'];
    }

}