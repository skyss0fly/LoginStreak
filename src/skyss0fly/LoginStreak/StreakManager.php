<?php

namespace skyss0fly\LoginStreak;
use skyss0fly\LoginStreak\Main;
use pocketmine\plugin\PluginBase;
use DateTime;
class StreakManager extends PluginBase {

public function addStreak(Main $main, DateTime $time) {
$player = $main->onJoin();
 $pdata = $this->getData($pdata); # set default if any.

if (!$pdata->get($player->getName())){
    $this->getLogger()->info($player->getName . " data not found, creating one");
  $timenow = $time->getTimestamp();
  
  $pdatatoadd = $player->getName() . $timenow;

  $this->getData($pdata->file_put_contents($pdatatoadd));

}
else {
$player = $main->onJoin();
 $pdata = $this->getData()->getNested("", ""); # set default if any.
  $timenow = $time->getTimestamp();
 $streak = $this->getData($pdata)->$player->getName()->get("Streak");
 $streakadd = $streak + 1;
  $pdatatatoadd = $player->getName() . $timenow . $streakadd;

  $this->getData($pdata->file_put_contents($pdatatoadd));

}
}

public function deductStreak(Main $main, DateTime $time) {
$player = $main->onJoin();
 $pdata = $this->getData($pdata); # set default if any.
  if (!$pdata->get($player->getName())) {
    $this->getLogger()->info($player->getName . " data not found, creating one");
  $timenow = $time->getTimestamp();
  $pdatatoadd = $player->getName() . $timenow;
  $this->getData($pdata->file_put_contents($pdatatoadd));
  }
  else{
$player = $main->onJoin($player);
 $pdata = $this->getData()->getNested("", ""); # set default if any.
  $timenow = $time->getTimestamp();
  $streak = $this->getData($pdata)->$player->getName()->get("Streak");
  $pdatatoadd = $player->getName() . $timenow . $streak = 0;

  $this->getData($pdata->file_put_contents($pdatatoadd));

  }
}
public function getData(Main $main) {
$player = $main->onJoin();
$filePath = $this->getDataFolder("PlayerData");
  $pdata = file_get_contents($filePath);
}
}
