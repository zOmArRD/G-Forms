<?php

declare(strict_types=1);

namespace ghostlymc\forms\types;

use JsonSerializable;

final class Icon implements JsonSerializable {

    public const URL = "url", PATH = "path";
    private string $type, $data;

    public function __construct(string $type, string $data) {
        $this->type = $type;
        $this->data = $data;
    }

    public function jsonSerialize(): array {
        return [
            "type" => $this->type,
            "data" => $this->data
        ];
    }
}