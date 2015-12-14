<?php
namespace Mars
{

/**
 * Класс Полигон
 *
 * @param $_size размер полигона
 *    
 **/
class Polygon
{
  protected $_size;
    
  public function __construct(Coordinates $coord)
  {
     $this->setCoord($coord);
  }
  
  public function setCoord(Coordinates $coord) // функция для задания размеров полигона
  {
     $this->_size = $coord;
  }
    
  public function getSize() // функция для получения размеров полигона
  {
      return $this->_size;
  }

}

}
?>