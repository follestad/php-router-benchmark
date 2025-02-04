<?php /** @noinspection PhpUndefinedFieldInspection */

namespace Benchmark\Routers\Klein;

use Klein\Request;

class KleinSimpleClass {

    public static function twoHome(Request $request): string {
        return $request->one . $request->two;
    }



    public static function twoAbout(Request $request): string {
        return $request->one . $request->two;
    }



    public static function twoContact(Request $request): string {
        return $request->one . $request->two;
    }


}