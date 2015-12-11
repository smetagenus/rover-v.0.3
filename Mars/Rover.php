<?php

namespace Mars
{

// Класс Ровер
class Rover
{
  protected $_posX = "0";
  protected $_posY = "0";
  protected $_side = "N";
  protected $_startPosX = "0";
  protected $_startPosY = "0";
  protected $_startSide = "N";
  
  public function __construct(Coordinates $coord, Orientation $orient)
  {
     $this->_posX = $this->_startPosX = $coord->getX();
     $this->_posY = $this->_startPosY = $coord->getY();
     $this->_side = $this->_startSide = $orient->getSide();
  }
  
  public function setPosition(Coordinates $coord, Orientation $orient)
  {
     $this->_posX = $coord->getX();
     $this->_posY = $coord->getY();
     $this->_side = $orient->getSide();
  }
  
 /**
  * Проверка, находится ли ровер в пределах полигона
  *
  * @param int $sizeX размер полигона по оси X
  * @param int $sizeY размер полигона по оси Y
  * @param int $posX позиция ровера по оси X
  * @param int $posY позиция ровера по оси Y      
  * @return bool      
  **/           
  public function checkPos(Polygon $polygon, Coordinates $coord)
  {
      $sizeX = $polygon->getSizeX();
      $sizeY = $polygon->getSizeY();
      $posX = $coord->getX();
      $posY = $coord->getY();
      
      if ($posX > $sizeX or $posX < 0 or $posY > $sizeY or $posY < 0)
        return false;
      else
        return true;
  } 
  
  public function getPosX()
  {
    return $this->_posX;
  }
  public function getPosY()
  {
    return $this->_posY;
  }
  public function getSide()
  {
    return $this->_side;
  } 
  
  public function getStartX()
  {
    return $this->_startPosX;
  }
  public function getStartY()
  {
    return $this->_startPosY;
  }
  public function getStartSide()
  {
    return $this->_startSide;
  }   
}

}

?>