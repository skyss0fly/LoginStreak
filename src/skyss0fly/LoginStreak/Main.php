<?php

namespace skyss0fly\LoginStreak;

use pocketmine\{plugin\PluginBase, event\Listener, player\Player, console\ConsoleCommandSender, event\player\PlayerJoinEvent};
use skyss0fly\LoginStreak\StreakManager;

class Main extends PluginBase implements Listener {

  public function onLoad(): void {
$this->saveDefaultConfig();
    $this->getServer()->getPluginManager()->registerEvents($this, $this);

    

  }
  public function onEnable(): void{
$cfg = $this->getConfig();

    if (!$cfg->get("DeleteMe")){
      // null
  }
    else {
      $this->getLogger()->warning("It appears that you have not configured this Plugin, for the safety of your server we will automatically turn this plugin off");
      $this->getServer()->getPluginManager()->disablePlugin($this);
      
    }
    
}
  public function onJoin(PlayerJoinEvent $event) {
$player = $event->getPlayer();

    $cfg = $this->getConfig();

    $change = $cfg->get("StreakRewards")->str_replace("{player}", $player);
return $player;
  }

public function sendCommand(Player $player) {
  $server = $this->getServer();
  $cfg = $this->getConfig();

  $cmd = $cfg->getNested("Rewards.1", ""); # set default if any.
  $cmd_result = str_replace("{player}", $player->getName(), $cmd);
  $dispatch = $server->dispatchCommand(new ConsoleCommandSender($server, $server->getLanguage()), $cmd_result);
  
  }
}
