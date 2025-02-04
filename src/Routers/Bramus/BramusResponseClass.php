<?php

namespace Benchmark\Routers\Bramus;

class BramusResponseClass {

    private static ?BramusResponseClass $instance = null;
    private string $content = '';



    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }



    public function setContent(string $content): void {
        $this->content = $content;
    }



    public function getContent(): string {
        return $this->content;
    }


}