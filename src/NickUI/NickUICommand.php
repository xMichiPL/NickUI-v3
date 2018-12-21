<?php

namespace NickUI;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\utils\TextFormat as C;

use jojoe77777\FormAPI\FormAPI;
use NickUI\Main;

class NickUICommand extends Command {
    
    public function __construct(Main $plugin){
        parent::__construct("nickui", "Changes your nickname.");
		$this->plugin = $plugin; 
	}

	public function execute(CommandSender $player, string $currentAlias, array $args){
		if(!$player->hasPermission("nickui.command")){
              $player->sendMessage(C::RED . "You do not have permission!");
                return true;
        }
	    if($player instanceof Player){
			$api = $this->plugin->getServer()->getPluginManager()->getPlugin("FormAPI");
				$form = $api->createCustomForm(function (Player $p, $data){
					if($data[1] == null or $data[2] == null){
                        $p->sendMessage(C::RED . "Please enter a valid message to send.");
                        return true;
                    }
                    if($data !== null){
						$p->setDisplayName($data[1]);
						$p->setNameTag($data[2]);
						$p->sendMessage(C::GREEN . "Successfully your nickname has been changed to " . $data[1] . " and your nametag is now " . $data[2] . ".");
                    }
				});
				$form->setTitle(C::BOLD . "NickUI");
				$form->addLabel("Please write your informations:");
				$form->addInput("Put your nickname here: ", "Steve");
				$form->addInput("Put your nametag here: ", "Steve");
				$form->sendToPlayer($player);
		} else {
			$player->sendMessage(C::GRAY . "You cannot use this command here!");
		}
	}
}