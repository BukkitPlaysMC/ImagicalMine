<?php

/*
 *
 *  _                       _           _ __  __ _             
 * (_)                     (_)         | |  \/  (_)            
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___  
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \ 
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/ 
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___| 
 *                     __/ |                                   
 *                    |___/                                                                     
 * 
 * This program is a third party build by ImagicalMine.
 * 
 * PocketMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.ml/
 * 
 *
*/

namespace pocketmine\block;




use pocketmine\item\Item;
use pocketmine\Player;
abstract class RailBlock extends Flowable{

	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null){
		$down = $this->getSide(0);
		$blockNorth = $this->getSide(2); //Gets the blocks around them
		$blockSouth = $this->getSide(3);
		$blockEast = $this->getSide(5);
		$blockWest = $this->getSide(4);
		if($down->isTransparent() === false){
			$this->getLevel()->setBlock($block, $this->id(), true, true);
			if($blockNorth->getId() === $this->id){
				$block-setDamage(0);
				$blockNorth->setDamage(0);
			}
			if($blockSouth->getId() === $this->id){
				$block->setDamage(0);
				$blockSouth->setDamage(0);
			}
			if($blockEast->getId() === $this->id){
				$block->setDamage(1);
				$blockEast->setDamage(1);
			}
			if($blockWest->getId() === $this->id){
				$block->setDamage(1);
				$blockWest->setDamage(1);
			}
			//TODO: Add support for Curved and Sloped rails.
			return true;
			}
		return false;
	}
}