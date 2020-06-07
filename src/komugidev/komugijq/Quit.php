<?php

declare(strict_types=1);

namespace komugidev\komugijq;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class Quit implements Listener
{

    /** @var string */
    public const PREFIX_QUIT = '§8 >> [§7Quit§8]§r ';

    /** @var Main */
    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onQuit(PlayerQuitEvent $event)
    {
        $prefix = Quit::PREFIX_QUIT;
        $player = $event->getPlayer();
        $name = $player->getName();
        $reason = $event->getQuitReason();
        switch ($reason) {
            case 'client disconnect':
                $event->setQuitMessage($prefix . $name . "さんがサーバーを去りました");
                break;

            case 'timeout':
                $event->setQuitMessage($prefix . $name . "さんがサーバーを去りました <timeout>");
                break;

            default:
                $event->setQuitMessage($prefix . $name . "さんがサーバーを去りました <その他>");
                break;
        }
    }
}
