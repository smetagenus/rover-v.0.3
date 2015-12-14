<?php
namespace Mars
{

/**
 * Класс Координаты
 *
 * @param $_posX координата по оси X
 * @param $_posY координата по оси Y   
 *    
 **/
class Coordinates
{
  protected $_posX = "0";
  protected $_posY = "0";

  public function __construct($args)
  {
     $this->setCoord($args);
  }
  
  public function setCoord($args) // функция для задания координат 
  {
      if (is_array($args)) $coord = $args;
        else parse_str($args, $coord);
      if (count($coord) == 2) 
      {     
        $this->_posX = $coord[0];
        $this->_posY = $coord[1];
      }
  }
  
  public function getX() 
  {
      return $this->_posX;
  }  
  public function getY() 
  {
      return $this->_posY;
  }

}

}
?>