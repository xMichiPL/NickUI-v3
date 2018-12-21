<?php

namespace NickUI;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat as C;

use jojoe77777\FormAPI\FormAPI;

use NickUI\NickUICommand;
use NickUI\Main;


class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getLogger()->info(C::GREEN . "Plugin NickUI has been enabled by Lover_BOY636!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getCommandMap()->register("nickui", new NickUICommand($this));
	}

	public function onDisable(){
		$this->getLogger()->info(C::RED . "Plugin NickUI has been disabled!");
	}
}
		