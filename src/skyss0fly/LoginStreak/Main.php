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

    if {!$cfg->get
  }
}
