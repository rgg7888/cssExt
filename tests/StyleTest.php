<?php

use PHPUnit\Framework\TestCase;
use App\tags\style\Style;

class StyleTest extends TestCase {

    public function test_style_tag () {

        $style = new Style([
            "css goes here"
        ],[
            'class' => 'styleTag'
        ]);

        $this->assertEquals("<style class=\"styleTag\">css goes here</style>", $style->add());

    }

}