<?php

declare(strict_types=1);

namespace skyss0fly\LoginStreak;

use pocketmine\player\Player;

class LoginStreakManager
{
    public function __construct(private LoginStreak $plugin)
    {
        //NOOP
    }

    public function addStreak(Player $player, int $time) : void
    {
        $this->plugin->data->set($player->getName() . "_streak", +1);
        $this->plugin->data->set($player->getName() . "_timestamp", +$time);
        $this->plugin->data->save();
    }

    public function deductStreak(Player $player, int $time) : void
    {
        $this->plugin->data->set($player->getName() . "_streak", 0);
        $this->plugin->data->set($player->getName() . "_timestamp", $time);
        $this->plugin->data->save();
    }
}