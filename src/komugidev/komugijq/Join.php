<?php

declare(strict_types=1);

/* すーもちゃんまじ感謝。このプラグインはすーもさんのJoinプラグインを参考しました */

namespace komugidev\komugijq;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Join implements Listener
{

    /** @var string */
    public const PREFIX_JOIN = '§a >> [§eJoin§a]§r ';

    /** @var string */
    public const PREFIX_JOIN_FOR_NEWCOMERS = '§a >> [§eNew§6Join§a]§r ';

    /** @var Main */
    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onJoin(PlayerJoinEvent $event)
    {
        $prefix = Join::PREFIX_JOIN;
        $prefix2 = Join::PREFIX_JOIN_FOR_NEWCOMERS;
        $player = $event->getPlayer();
        $name = $player->getName();
        if ($event->getPlayer()->hasPlayedBefore()) {
            if ($player->isOP()) {
                switch ($name) {
                    case 'xtakumatutix':
                        $event->setJoinMessage($prefix . "鯖主のxtakumatutixさんが鯖に来ました");
                        break;

                    default:
                        $event->setJoinMessage($prefix . "開発者の" . $name . "さんが鯖に来ました");
                        break;
                }
            } else {
                $event->setJoinMessage($prefix . $name . "さんが鯖に来ました");
            }
        } else {
            $event->setJoinMessage($prefix2 . $name . "さんが初めて鯖に来ました\nみなさん！挨拶をしましょう！");
        }
    }
}