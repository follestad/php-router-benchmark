<?php
declare(strict_types=1);

namespace Core\Setup;

use JsonException;

final readonly class Result {

    /**
     * @param float|null $timeConsumption Time Consumption In Milliseconds
     * @param float|null $peakMemoryUsage Peak Memory Usage In MegaBytes
     * @param string $message
     */
    public function __construct(
        private ?float $timeConsumption = null,
        private ?float $peakMemoryUsage = null,
        private string $message = "",
    ) {}



    public static function unsuccessful(string $message): self {
        return new Result(null, null, $message);
    }



    public static function fromJSON(string $json): Result {
        try {
            $result = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
            return new Result($result["time"] ?? null, $result["memory"] ?? null, $result["message"] ?? '');
        } catch (JsonException) {
            return new Result(null, null, "Invalid JSON response: \"$json\"");
        }
    }



    public static function fromMeasurement(
        float $startNanoseconds,
        float $endNanoseconds,
        int $peakMemoryUsageInBytes,
    ): Result {
        return new Result(
            ($endNanoseconds - $startNanoseconds) / 1e+6,
            $peakMemoryUsageInBytes / 1024 / 1024,
        );
    }



    public static function fromValues(
        ?float $timeConsumptionInMilliseconds,
        ?float $peakMemoryUsageInMegaBytes,
    ): Result {
        return new Result($timeConsumptionInMilliseconds, $peakMemoryUsageInMegaBytes);
    }



    public function timeConsumptionInMilliSeconds(): ?float {
        return $this->timeConsumption;
    }



    public function peakMemoryUsageInMegaBytes(): ?float {
        return $this->peakMemoryUsage;
    }



    public function message(): string {
        return $this->message;
    }



    public function isSuccessful(): bool {
        return $this->timeConsumption !== null && $this->peakMemoryUsage !== null;
    }



    public function toJson(): string {
        try {
            return json_encode(
                [
                    "time"    => $this->timeConsumption,
                    "memory"  => $this->peakMemoryUsage,
                    "message" => $this->message,
                ],
                JSON_THROW_ON_ERROR,
            );
        } catch (JsonException) {

        }
    }



    public function printJsonResult(): never {
        http_response_code($this->isSuccessful() ? 200 : 500);
        header('Content-Type: application/json');
        echo $this->toJson();
        exit;
    }


}