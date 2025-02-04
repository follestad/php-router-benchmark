<?php

namespace Benchmark\Routers\Bramus;

readonly class BramusClassSimple {

    public static function twoHome(string $one, string $two): void {
        BramusResponseClass::getInstance()->setContent($one . $two);
    }



    public static function twoAbout(string $one, string $two): void {
        BramusResponseClass::getInstance()->setContent($one . $two);
    }



    public static function twoContact(string $one, string $two): void {
        BramusResponseClass::getInstance()->setContent($one . $two);
    }


}