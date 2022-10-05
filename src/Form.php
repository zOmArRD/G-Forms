<?php
declare(strict_types=1);

namespace ghostlymc\forms;

use pocketmine\player\Player;
use pocketmine\form\Form as IForm;

abstract class Form implements IForm {
    protected array $data = [];

    /** @var callable|null */
    private $callable;

    public function __construct(?callable $callable) {
        $this->callable = $callable;
    }

    public function handleResponse(Player $player, $data): void {
        $this->processData($data);
        $callable = $this->getCallable();
        if ($callable !== null) {
            $callable($player, $data);
        }
    }

    public function processData(&$data): void {}

    public function getCallable(): ?callable {
        return $this->callable;
    }

    public function setCallable(?callable $callable): void {
        $this->callable = $callable;
    }

    public function jsonSerialize() {
        return $this->data;
    }
}