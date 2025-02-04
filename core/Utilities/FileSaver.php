<?php

namespace Core\Utilities;

class FileSaver {

    public static function path(string $fileName): string {
        return PROJECT_ROOT . 'src/TestData/' . $fileName;
    }



    public static function exist(string $filePath): bool {
        return is_file(self::path($filePath));
    }



    public static function createDirectory(string $dir): void {
        if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $dir));
        }
    }



    public static function save(string $fileName, array $data): void {
        $filePath = self::path($fileName);
        $dir = dirname($filePath);
        self::createDirectory($dir);
        try {
            file_put_contents($filePath, json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));
        } catch (\JsonException $e) {
            throw new \RuntimeException('Could not save file: ' . $e->getMessage());
        }
        if (!is_file($filePath)) {
            throw new \RuntimeException(sprintf('File "%s" was not created', $filePath));
        }
    }



    public static function load(string $fileName): array {
        $filePath = self::path($fileName);
        if (!is_file($filePath)) {
            throw new \RuntimeException(sprintf('File "%s" does not exist', $filePath));
        }
        $data = file_get_contents($filePath);
        if ($data === false) {
            throw new \RuntimeException(sprintf('Could not read file "%s"', $filePath));
        }
        try {
            return json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new \RuntimeException('Could not load file: ' . $e->getMessage());
        }
    }


}