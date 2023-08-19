<?php

declare(strict_types=1);

namespace skyss0fly\LoginStreak;

use pocketmine\console\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class LoginStreak extends PluginBase implements Listener
{
    use SingletonTrait;

    public Config $data;

    protected function onLoad() : void
    {
        $this->saveDefaultConfig();
    }

    protected function onEnable() : void
    {
        self::setInstance($this);

        if ($this->getConfig()->get("DeleteMe", false) === true){
            $this->getLogger()->warning("It appears that you have not configured this Plugin, for the safety of your server we will automatically turn this plugin off");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }

        $this->data = new Config($this->getDataFolder() . "streaks.yml", Config::YAML);

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $event) : void
    {
        $player = $event->getPlayer();
        $login_streak_manager = new LoginStreakManager($this);
        $time = time();
        if (!$this->data->exists($player->getName() . "_streak")){
            $this->data->set($player->getName() . "_streak", 0);
            $this->data->set($player->getName() . "_timestamp", $time);
            $this->data->save();
        }
        //get streak
        $timestamp = $this->data->get($player->getName() . "_timestamp");
        $time_diff = $time - $timestamp;
        if ($time_diff <= 300){
            $login_streak_manager->addStreak($player, $time);
            $this->sendCommand($player);
        } else {
            $login_streak_manager->deductStreak($player, $time);
        }
    }

    public function sendCommand(Player $player) : void
    {
        $data = $this->getConfig()->getAll();
        $rewards = $data["StreakRewards"][1]["Reward"];
        foreach ($rewards as $rewards_data){
                $cmd_result = str_replace("{player}", $player->getName(), $rewards_data);
                $this->getServer()->dispatchCommand(new ConsoleCommandSender($this->getServer(), $this->getServer()->getLanguage()), $cmd_result);
        }
    }
}