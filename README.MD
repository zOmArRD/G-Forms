# G-Forms ![visitors](https://visitor-badge.glitch.me/badge?page_id=G-Forms)

A simple Form API for GhostlyMC Network.

Very helpful for make Forms in PocketMine-MP.

### Features

- Simple API
- Fast and Secure
- A good documentation

## Get Started

### Install the API

Open your CLI and execute this command:

```bash
composer require ghostlymc/g-forms
```

### Using the API

#### 1 - Create a Simple Form.

```php
namespace yourpath\here;

use ghostlymc\forms\SimpleForm;
use pocketmine\Server;
use ghostlymc\forms\entries\simple\Button;
use ghostlymc\forms\types\Icon;
use pocketmine\player\Player;

class CustomSimpleForm extends SimpleForm {
    public function __construct() {
        parent::__construct('Player Teleport');
        
        foreach (Server::getInstance()->getOnlinePlayers() as $onlinePlayer) {
            $this->addButton(new Button($onlinePlayer->getName()), 
            function(Player $player, int $buttonIndex) use ($onlinePlayer): void {
                $player->teleport($onlinePlayer->getPosition());
                $player->sendMessage("You were teleported to {$onlinePlayer->getName()}");
            });
        }
    }
}
```

#### 2 - Create a Modal Form.

```php
namespace yourpath\here;

use pocketmine\player\Player;
use ghostlymc\forms\ModalForm;

class CustomModalForm extends ModalForm {
    public function __construct() {
        parent::__construct('Modal Form', 'Do you want co continue?');
        $this->setFirstButton('Yes');
        $this->setSecondButton('No');
    }
    
    protected function onAccept(Player $player) : void{
        // YOUR CODE HERE
    }
    
    protected function onClose(Player $player) : void{
        // YOUR CODE HERE
    }
}
```

#### 3 - Create a Custom Form.

##### Available Entries

- DropdownEntry
- InputEntry
- LabelEntry
- SliderEntry
- StepSliderEntry
- ToggleEntry

```php
namespace yourpath\here;

use pocketmine\player\Player;
use ghostlymc\forms\CustomForm;use ghostlymc\forms\entries\custom\InputEntry;

class ACustomForm extends CustomForm {
    public function __construct() {
        parent::__construct('Custom Form');
        $this->addEntry(new InputEntry('Name', 'Enter your name'), function(Player $player, $key, $value) : void{
             var_dump($key, $value);
        });
    }
}
```

#### 4 - Sending the form

```php
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use yourpath\here\CustomSimpleForm;

class ExampleClass implements Listener {
    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $player->sendForm(new CustomSimpleForm);
    }
}
```

## Support

If you have a problem with the API, please contact create an issue.

This project was created by github public code, it is not my property, I only translated it to make it easier to
understand and use.
