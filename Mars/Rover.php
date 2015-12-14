<?php

namespace Mars
{

// Класс Ровер
class Rover
{
  protected $_currentPos;
  protected $_currentSide;
  protected $_startPos;
  protected $_startSide;
  
  public function __construct(Coordinates $coord, Orientation $orient)
  {
     $this->_currentPos = $this->_startPos = $coord;
     $this->_currentSide = $this->_startSide = $orient;
  }
  
  public function setPosition(Coordinates $coord, Orientation $orient)
  {
     $this->_currentPos = $coord;
     $this->_currentSide = $orient;
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
      $sizeX = $polygon->getSize()->getX();
      $sizeY = $polygon->getSize()->getY();
      $posX = $coord->getX();
      $posY = $coord->getY();
      
      if ($posX > $sizeX or $posX < 0 or $posY > $sizeY or $posY < 0)
        return false;
      else
        return true;
  } 
  
  public function getCurrentPos()
  {
    return $this->_currentPos;
  }
  public function getCurrentSide()
  {
    return $this->_currentSide;
  } 
  
  public function getStartPos()
  {
    return $this->_startPos;
  }
  public function getStartSide()
  {
    return $this->_startSide;
  }   
}

}

?>