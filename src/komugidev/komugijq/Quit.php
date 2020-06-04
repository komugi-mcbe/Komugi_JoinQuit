<?php

namespace komugidev\komugijq;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;

class Quit implements Listener 
{

    /** @var string */
    public const PREFIX_Quit = '§8 >> [§7Quit§8]§r ';

    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onQuit(PlayerQuitEvent $event)
    {
        $prefix = Quit::PREFIX_Quit;
        $player = $event->getPlayer();
        $name = $player->getName();
        $reason = $event->getQuitReason();
        switch ($reason){
            case 'client disconnect':
            $event->setQuitMessage($prefix.$name."さんがサーバーを去りました");
            break;

            case 'timeout':
            $event->setQuitMessage($prefix.$name."さんがサーバーを去りました <timeout>");
            break;

            case 'default':
            $event->setQuitMessage($prefix.$name."さんがサーバーを去りました <その他>");
            break;
        }
    }
}
