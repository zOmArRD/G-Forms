<?php

declare(strict_types=1);

namespace ghostlymc\forms\entries\custom;

final class LabelEntry implements CustomFormEntry {

    private string $title;

    public function __construct(string $title) {
        $this->title = $title;
    }

    public function jsonSerialize(): array {
        return [
            "type" => "label",
            "text" => $this->title
        ];
    }
}