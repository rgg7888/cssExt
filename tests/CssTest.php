<?php

use PHPUnit\Framework\TestCase;
use App\css\Css;

class Csstest extends TestCase {

    public function test_css_multiple_selectors (): void {

        $cssObject = Css::instancia();
        /**
         * Este metodo sera un poco restrictivo 
         * ala hora de querer crear multiples
         * media queries , ya que tendremos como
         * base tres break poins solamente y 
         * estan optimizados para mobile first
         */
        $cssObject->setCss([
            '480' => [
                '.brand' => [
                    'background: #cbb09c !important;'
                ]
            ]
        ]);

        $this->assertEquals("@media screen and (min-width: 480px){.brand {background: #cbb09c !important;}}", 
        $cssObject->insertStyle($cssObject->getCss()));

        $cssObject->setCss([
            '480' => [
                '.brand' => [
                    'background: #cbb09c !important;'
                ]
            ],
            '768' => [
                '.brand-text' => [
                    "color: #cbb09c !important;"
                ]
            ]
        ]);

        $this->assertEquals("@media screen and (min-width: 480px){.brand {background: #cbb09c !important;}}@media screen and (min-width: 768px){.brand-text {color: #cbb09c !important;}}", 
        $cssObject->insertStyle($cssObject->getCss()));

        $cssObject->setCss([
            '480' => [
                '.brand' => [
                    'background: #cbb09c !important;'
                ]
            ],
            '768' => [
                '.brand-text' => [
                    "color: #cbb09c !important;"
                ]
            ],
            '1024' => [
                'form' => [
                    "max-width: 460px;",
                    "margin: 20px auto;",
                    "padding: 20px;"
                ]
            ]
        ]);

        $this->assertEquals("@media screen and (min-width: 480px){.brand {background: #cbb09c !important;}}@media screen and (min-width: 768px){.brand-text {color: #cbb09c !important;}}@media screen and (min-width: 1024px){form {max-width: 460px;margin: 20px auto;padding: 20px;}}", 
        $cssObject->insertStyle($cssObject->getCss()));

        
        $cssObject->setCss([
            ".brand" => [
                "background: #cbb09c !important;"
            ],
            ".brand-text" => [
                "color: #cbb09c !important;"
            ],
            "form" => [
                "max-width: 460px;",
                "margin: 20px auto;",
                "padding: 20px;"
            ]
        ]);
        

        
        $this->assertEquals( 
            ".brand {background: #cbb09c !important;}.brand-text {color: #cbb09c !important;}form {max-width: 460px;margin: 20px auto;padding: 20px;}" 
        , $cssObject->insertStyle(
            $cssObject->getCss()
        ));

    }


}