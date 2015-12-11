<?php

namespace Mars
{

// Класс Движение
class Moving
{
  public function checkMove($x)  // функция проверки команд
  {
    if ($x == "L" || $x == "R" || $x == "M")
      return true;
    else
      return false;
  }
  
  public function moveTo($x)  // функция движения: определяет команду, и вызывает соответствующий обработчик
  {
    if ($x == "L") $this->goLeft();
    if ($x == "R") $this->goRight();
    if ($x == "M") $this->goForward();
  }

  public function goLeft()
  {
    $side = Orientation->getSide();
    if ($side == "N") $newSide = "W";
    if ($side == "W") $newSide = "S";
    if ($side == "S") $newSide = "E";
    if ($side == "E") $newSide = "N";
    Orientation->setSide($newSide);
  }
  
  public function goRight()
  {
    $side = Orientation->getSide();
    if ($side == "N") $newSide = "E";
    if ($side == "W") $newSide = "N";
    if ($side == "S") $newSide = "W";
    if ($side == "E") $newSide = "W";
    Orientation->setSide($newSide); 
  }
  
  public function goForward()
  {
    $side = Orientation->getSide();
    $x = $newX = Position->getPosX();
    $y = $newY = Position->getPosY();
    if ($side == "N") $newY = $y + 1;
    if ($side == "S") $newY = $y - 1;
    if ($side == "E") $newX = $x + 1;
    if ($side == "W") $newX = $x - 1;
    Position->setPos($newX,$newY);
  }
}


}

?>