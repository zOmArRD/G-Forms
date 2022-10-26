<?php

declare(strict_types=1);

namespace ghostlymc\forms;

use Closure;
use Exception;
use pocketmine\player\Player;
use ghostlymc\forms\types\Icon;
use pocketmine\form\FormValidationException;
use ghostlymc\forms\entries\ModifiableEntry;
use ghostlymc\forms\entries\custom\CustomFormEntry;

abstract class CustomForm implements Form {

    private string $title;

    private ?Icon $icon;

    /** @var CustomFormEntry[] */
    private array $entries = [];

    /** @var Closure[] */
    private array $entry_listeners = [];

    public function __construct(string $title) {
        $this->title = $title;
    }

    final public function setIcon(?Icon $icon): void {
        $this->icon = $icon;
    }

    /**
     * @param CustomFormEntry $entry
     * @param Closure|null $listener
     *
     * Listener parameters:
     *  * Player $player
     *  * InputEntry $entry
     *  * mixed $value [NOT NULL]
     */
    final public function addEntry(CustomFormEntry $entry, Closure $listener = null): void {
        $this->entries[] = $entry;
        if ($listener !== null) {
            $this->entry_listeners[array_key_last($this->entries)] = $listener;
        }
    }

    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            $this->onClose($player);
        } else {
            try {
                foreach ($data as $key => $value) {
                    if (isset($this->entry_listeners[$key])) {
                        $entry = $this->entries[$key];
                        if ($entry instanceof ModifiableEntry) {
                            $entry->validateUserInput($value);
                        }
                        $this->entry_listeners[$key]($player, $this->entries[$key], $value);
                    }
                }
            } catch (Exception $e) {
                throw new FormValidationException($e->getMessage());
            }
        }
    }

    public function onClose(Player $player): void {}

    final public function jsonSerialize(): array {
        return [
            "type" => "custom_form",
            "title" => $this->title,
            "icon" => $this->icon,
            "content" => $this->entries
        ];
    }
}