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
use pocketmine\player\Player;
use GhostlyMC\Forms\GForms;
use pocketmine\Server;

public function simpleForm(Player $player): void
{
    $form = GForms::createSimpleForm(function(Player $player, Player $data) {
        $player->teleport($data->getPosition())
        $player->sendMessage("you were teleported to {$data->getName()}");
    });
    
    $form->setTitle('Player Teleport');
    $form->setContent('Select a player to teleport');
    foreach (Server::getInstance()->getOnlinePlayers() as $p) {
        $form->addButton($p->getName(), $form::IMAGE_TYPE_NONE, '', $p);
    }
    $player->sendForm($form);
}
```
#### 2 - Create a Modal Form.

```php
use pocketmine\player\Player;
use GhostlyMC\Forms\GForms;

public function modalForm(Player $player): void
{
    $form = GForms::createModalForm(function(Player $player, bool $data) {
        if ($data) {
            $player->sendMessage('You clicked yes');
        } else {
            $player->sendMessage('You clicked no');
        }
    });
    $form->setTitle('Modal Form');
    $form->setContent('Do you want to continue?');
    $form->addButton('Yes');
    $form->addButton('No');
    $player->sendForm($form);
}
```

#### 3 - Create a Custom Form.

```php
use pocketmine\player\Player;
use GhostlyMC\Forms\CustomForm;

public function customForm(Player $player): void
{
    $form = new CustomForm(function(Player $player, array $data) {
        $player->sendMessage("Your username is {$data['username']}");
    });
    $form->setTitle('Title of the form');
    $form->addInput('Name', 'Enter your username', null, 'label-username');
    # Labels are optional
    $form->addInput('Password', 'Enter your password', 'default password', 'label-password');
    $form->addLabel('This is a label');
    $form->addToggle('Milk Enabled', $player->isMilkEnabled(), 'label-milk');
    $form->addDropdown('Choose', ['Option 1', 'Option 2', 'Option 3'], 0, 'label-dropdown');
    $player->sendForm($form);
}
```

## Support
If you have a problem with the API, please contact create an issue.

This is an open source project, so if you want to help, please help us.

Forked from [Link](https://github.com/jojoe77777/FormAPI)