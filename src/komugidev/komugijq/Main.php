<?php


namespace komugidev\komugijq;

use pocketmine\plugin\PluginBase;

Class Main extends PluginBase 
{

    public function onEnable() 
    {
        $this->getServer()->getPluginManager()->registerEvents(new Join($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new Quit($this), $this);
        $this->getLogger()->notice("読み込み完了 - ver.".$this->getDescription()->getVersion());
    }
}