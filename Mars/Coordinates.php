<?php
namespace Mars
{

/**
 * Класс Координаты
 *
 * @param $_startPosX начальная координата по оси X
 * @param $_startPosY начальная координата по оси Y
 * @param $_posX координата по оси X
 * @param $_posY координата по оси Y   
 *    
 **/
class Coordinates
{
  protected $_startPosX = "0";
  protected $_startPosY = "0";   
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
      if (count($coord) == 4) 
      {     
        $this->_startPosX = $coord[0];
        $this->_startPosY = $coord[1];
        $this->_posX = $coord[2];
        $this->_posY = $coord[3];
      }
       
  }
  
  public function getStartX() 
  {
      return $this->_startPosX;
  }  
  public function getStartY() 
  {
      return $this->_startPosY;
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