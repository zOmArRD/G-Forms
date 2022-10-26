<?php

declare(strict_types=1);

namespace ghostlymc\forms\entries;

use InvalidArgumentException;

interface ModifiableEntry {

    public function getValue();

    public function setValue($value): void;

    /**
     * @param mixed $input
     *
     * @throws InvalidArgumentException
     */
    public function validateUserInput($input): void;
}