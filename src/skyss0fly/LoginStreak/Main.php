<?php

namespace skyss0fly\LoginStreak;

use pocketmine\{plugin\PluginBase, event\Listener, event\player\PlayerJoinEvent};
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
  public function onJoin($event PlayerJoinEvent) {
$player = $event->getPlayer();
    $change = $cfg->get("StreakRewards")->str_replace({player}, $player);
    
  
  }
}
