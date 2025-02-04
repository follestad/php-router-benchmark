<?php

namespace Core\Utilities;

class Color {

    const string RESET = "\e[0m";
    const string NORMAL = "\e[0m";

    const string BOLD = "\e[1m";
    const string UN_BOLD = "\e[21m";
    const string DIM = "\e[2m";
    const string UN_DIM = "\e[22m";
    const string UNDERLINED = "\e[4m";
    const string UN_UNDERLINED = "\e[24m";
    const string BLINK = "\e[5m";
    const string UN_BLINK = "\e[25m";
    const string REVERSE = "\e[7m";
    const string UN_REVERSE = "\e[27m";
    const string HIDDEN = "\e[8m";
    const string UN_HIDDEN = "\e[28m";

    const string BLACK = "\033[0;30m";
    const string DARK_GRAY = "\033[1;30m";
    const string RED = "\033[0;31m";
    const string LIGHT_RED = "\033[1;31m";
    const string GREEN = "\033[0;32m";
    const string LIGHT_GREEN = "\033[1;32m";
    const string BROWN = "\033[0;33m";
    const string YELLOW = "\033[0;33m";
    const string BLUE = "\033[0;34m";
    const string LIGHT_BLUE = "\033[1;34m";
    const string MAGENTA = "\033[0;35m";
    const string PURPLE = "\033[2;35m";
    const string LIGHT_MAGENTA = "\033[1;35m";
    const string LIGHT_PURPLE = "\033[1;35m";
    const string CYAN = "\033[0;36m";
    const string LIGHT_CYAN = "\033[1;36m";
    const string LIGHT_GRAY = "\033[2;37m";
    const string BOLD_WHITE = "\033[1;38m";
    const string LIGHT_WHITE = "\033[1;38m";
    const string WHITE = "\033[0;38m";
    const string FG_DEFAULT = "\033[39m";
    const string GRAY = "\033[0;90m";
    const string LIGHT_RED_ALT = "\033[91m";
    const string LIGHT_GREEN_ALT = "\033[92m";
    const string LIGHT_YELLOW_ALT = "\033[93m";
    const string LIGHT_YELLOW = "\033[1;93m";
    const string LIGHT_BLUE_ALT = "\033[94m";
    const string LIGHT_MAGENTA_ALT = "\033[95m";
    const string LIGHT_CYAN_ALT = "\033[96m";
    const string LIGHT_WHITE_ALT = "\033[97m";

    const string BG_BLACK = "\033[40m";
    const string BG_RED = "\033[41m";
    const string BG_GREEN = "\033[42m";
    const string BG_YELLOW = "\033[43m";
    const string BG_BLUE = "\033[44m";
    const string BG_MAGENTA = "\033[45m";
    const string BG_CYAN = "\033[46m";
    const string BG_LIGHT_GRAY = "\033[47m";
    const string BG_DEFAULT = "\033[49m";
    const string BG_DARK_GRAY = "\e[100m";
    const string BG_LIGHT_RED = "\e[101m";
    const string BG_LIGHT_GREEN = "\e[102m";
    const string BG_LIGHT_YELLOW = "\e[103m";
    const string BG_LIGHT_BLUE = "\e[104m";
    const string BG_LIGHT_MAGENTA = "\e[105m";
    const string BG_LIGHT_CYAN = "\e[106m";
    const string BG_WHITE = "\e[107m";



    public static function print(string $text, string|array $styles = []): void {
        if (is_array($styles)) {
            $styles = implode(' ', $styles);
        }
        echo $styles, $text, self::RESET, PHP_EOL;
    }



}