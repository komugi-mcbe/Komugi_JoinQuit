<?php

/* 
すーもちゃんまじ感謝
このプラグインはすーもさんのJoinプラグインを参考しました
*/

namespace komugidev\komugijq;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;

class Join implements Listener 
{

    /** @var string */
    public const PREFIX_Join = '§a >> [§eJoin§a]§r ';

    /** @var string */
    public const PREFIX_NewJoin = '§a >> [§eNew§6Join§a]§r ';

    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onJoin(PlayerJoinEvent $event)
    {
        $prefix = Join::PREFIX_Join;
        $prefix2 = Join::PREFIX_NewJoin;
        $player = $event->getPlayer();
        $name = $player->getName();
        if(!$event->getPlayer()->hasPlayedBefore()){
            $event->setJoinMessage($prefix2.$name."さんが初めて鯖に来ました\nみなさん！挨拶をしましょう！");
            if ($player->isOP()){
                switch ($name){
                    case 'xtakumatutix':
                    $event->setJoinMessage($prefix."鯖主のxtakumatutixさんが鯖に来ました");
                    break;

                    case 'default':
                    $event->setJoinMessage($prefix."開発者の".$name."さんが鯖に来ました");
                    break;
                }
            }
        }else{
            $event->setJoinMessage($prefix.$name."さんが鯖に来ました");
            return true;
        }
    }
}