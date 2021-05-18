<?php

use PHPUnit\Framework\TestCase;
use App\selector\Selector;

class SelectorTest extends TestCase {

    public function test_propiedades () {

        $propiedades = new Selector;

        $propiedades->setPropiedades([
            'margin' => ''
        ]);

        $this->assertEquals("margin: ;", $propiedades->getCss());

        $propiedades->setPropiedades([
            'import' => 'https://fonts.googleapis.com/css2?family=Lato&display=swap'
        ]);

        $this->assertEquals('@import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");', 
        $propiedades->getCss());

    }

    public function test_selector() {
        $selector = new Selector();
        $selector->setSelector(".element");
        $this->assertEquals(".element ,.element1 ,.element2 ,.element3 ,.element4 ,.element5 ,.element6 ,.element7 ,.element8 ,.element9 {  }",
        $selector->getCss(10));
    }

    public function test_jump () {
        $selector = new Selector();
        $selector->setSelector(".element");
        $selector->Propiedades([
            'background',
            'papayawhip',
            'papayawhip',
            'papayawhip',
            'pink',
            'pink',
            'pink',
            'lightcyan',
            'lightcyan',
            'lightcyan'
        ]);
        $this->assertEquals(".element1 { background: papayawhip; }.element2 { background: papayawhip; }.element3 { background: papayawhip; }.element4 { background: pink; }.element5 { background: pink; }.element6 { background: pink; }.element7 { background: lightcyan; }.element8 { background: lightcyan; }.element9 { background: lightcyan; }",
        $selector->getCss(10,true));
    }

}