<?php

namespace Mars
{

// Класс Ориентация
class Orientation
{
  protected $_startSide = "N";
  protected $_side = "N";

  public function __construct($s)
  {
     if ($this->checkSide($s))
     {
        $this->_startSide = $s;
        $this->_side = $s;
     }
  }
  
  public function checkSide($s) // функция для проверки правильности направления
  {
      if ($s == "N" || $s == "S" || $s == "E" || $s == "W") 
        return true; 
      else 
        return false;
  }
  
  public function setSide($s) // функция для задания направления
  {
      if ($this->checkSide($s))
        $this->_side = $s;
  }
  
  public function getSide() 
  {
      return $this->_side;
  }
  
  public function getStartSide() 
  {
      return $this->_startSide;
  }   
}

}

?>