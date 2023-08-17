<?php

namespace skyss0fly\LoginStreak;
use skyss0fly\LoginStreak\Main;
use DateTime;
class StreakManager extends Main {

public function addStreak(): void {
$player = $this->Main()->onJoin($player);
 $pdata = $this->getData()->getNested("", ""); # set default if any.
if (!$pdata->get($player->getName())){
    $this->getLogger($player->getName . " data not found, creating one");
  $timenow = $this->DateTime()->getTimestamp();
  
  $pdatatatoadd = $player->getName() . $timenow;

  $this->getData($data->file_put_contents($pdatatoadd));

}
else {
$player = $this->Main()->onJoin($player);
 $pdata = $this->getData()->getNested("", ""); # set default if any.
  $timenow = $this->DateTime()->getTimestamp();
  $streak = $this->getData($pdata)->$player->getName()->get("Streak");
  $pdatatatoadd = $player->getName() . $timenow . $streak + 1;

  $this->getData($data->file_put_contents($pdatatoadd));

}

public function deductStreak():void {
$player = $this->Main()->onJoin($player);
 $pdata = $this->getData()->getNested("", ""); # set default if any.
  if (!$pdata->get($player->getName())) {
    $this->getLogger($player->getName . " data not found, creating one");
  $timenow = $this->DateTime()->getTimestamp();
  $pdatatatoadd = $player->getName() . $timenow;
  $this->getData($data->file_put_contents($pdatatoadd));
  }
  else{
$player = $this->Main()->onJoin($player);
 $pdata = $this->getData()->getNested("", ""); # set default if any.
  $timenow = $this->DateTime()->getTimestamp();
  $streak = $this->getData($pdata)->$player->getName()->get("Streak");
  $pdatatatoadd = $player->getName() . $timenow . $streak = 0;

  $this->getData($data->file_put_contents($pdatatoadd));

  }
}
public function getData():void {
$player = $this->Main()->onJoin($player);
$filepath = $this->getDataFolder("PlayerData")->get("data");
  $data = file_get_contents($filePath);
}
