<?php
namespace Mars
{

/**
 * Класс Полигон
 *
 * @param $_startX начальная координата по оси X
 * @param $_startY начальная координата по оси Y
 * @param $_endX конечная координата по оси X
 * @param $_endY конечная координата по оси Y   
 *    
 **/
class Polygon
{
  protected $_startX = "0";
  protected $_startY = "0";
  protected $_endX = "10";
  protected $_endY = "10";
    
  public function __construct(Coordinates $coord)
  {
     $this->setCoord($coord);
  }
  
  public function setCoord(Coordinates $coord) // функция для задания размеров полигона
  {
     $this->_startX = $coord->getStartX();
     $this->_startY = $coord->getStartY();
     $this->_endX = $coord->getX();
     $this->_endY = $coord->getY();
  }
    
  public function getSizeX() // функция для получения размеров полигона
  {
      return $this->_endX - $this->_startX;
  }
      
  public function getSizeY() // функция для получения размеров полигона
  {
      return $this->_endY - $this->_startY;
  }

}

}
?>