<?php

namespace Mars
{

// Класс Парсер
class Parser
{
  protected $_roverCnt = 0;
  protected $_linesArray = array();
  protected $_polygonSize = array();
  protected $_coord = array();
  protected $_orient = "N";
  
  public function getRoverCnt()
  {
    return $this->_roverCnt;
  }

  public function getLinesArray()
  {
    return $this->_linesArray;
  }
  
  public function getPolygonSize()
  {
    return $this->_polygonSize;
  }
  
  public function getCoord()
  {
    return $this->_coord;
  }
  
  public function getOrient()
  {
    return $this->_orient;
  }
  
  public function checkSide($s) // функция для проверки правильности направления
  {
      if ($s == "N" || $s == "S" || $s == "E" || $s == "W") 
        return true; 
      else 
        return false;
  }
  
  public function checkMove($x)  // функция проверки команд
  {
    if ($x == "L" || $x == "R" || $x == "M")
      return true;
    else
      return false;
  }
    
  public function parsInput($s) // Парсер входных параметров
  {
    $error = "Неверный ввод данных!<br>";
    $success = true; // По умолчанию надеемся, что ф-ция отбработает успешно 
    $this->_linesArray = $lines = explode("\n", $s); // Получаем массив строк
    if (count($lines) % 2 == 1 && count($lines) > 2)  // Проверяем нечетность
    {
      $this->_roverCnt = (count($lines)-1)/2; // Количество роверов
    } 
    else 
    {
      echo $error;
      $success = false;
    }
    return $success;
  }
  
  public function parsPolygon($s) // Парсер размеров полигона
  {
    $error = "Неверно заданы размеры полигона!<br>";
    $success = true; // По умолчанию надеемся, что ф-ция отбработает успешно 
    $s = trim($s);
    $size = explode(" ", $s); // получаем массив параметров полигона
    if (count($size) == 2)
    {
      $x = $size[0];
      $y = $size[1];
      if (is_numeric($x) && is_numeric($y))
        {
          $this->_polygonSize = $size;
        }
      else
        { 
          echo $error;
          $success = false;
        }  
    } 
    else
    { 
      echo $error;
      $success = false;
    }
    return $success;
  }
  
  public function parsPosition($s,$n) // Парсер координат ровера
  {
    $error = "Неверно заданы координаты ровера №".$n."!<br>";
    $success = true; // По умолчанию надеемся, что ф-ция отбработает успешно 
    $s = strtoupper(trim($s));
    $pos = explode(" ", $s); // получаем массив параметров ровера 
    if (count($pos) == 3)
    {
      $posX = $pos[0];
      $posY = $pos[1];
      $side = $pos[2];
      if (is_numeric($posX) && is_numeric($posY) && $this->checkSide($side))
      {
        $this->_coord = array($posX,$posY);
        $this->_orient = $side;
      }
      else
      { 
        echo $error;
        $success = false;
      }
    }
    else
    { 
      echo $error;
      $success = false;
    }
    return $success;  
  }
  
  public function parsMoving($s,$n) // Парсер команд движения ровера
  {
    $error = "Неверно заданы команды для ровера №".$n."!<br>";
    $success = true; // По умолчанию надеемся, что ф-ция отбработает успешно 
    $s = strtoupper(trim($s));
    $commands = str_split($s); // получаем массив команд
    //$move = new Moving;
    //$polygon = new Polygon; 
    foreach ($commands as $value) {
      if ($this->checkMove($value))
        {
          /*$move->moveTo($value);
          if (Position->checkPos($polygon->getSizeX(),$polygon->getSizeY(),Position->getPosX(),Position->getPosY()) == false)
            {
              echo "Ровер ".$n." выехал за пределы полигона! (". Position->getPosX()  . " " . Position->getPosY() . " " . Orientation->getSide() .")<br>";
              break;
            }*/
        }
      else 
        {
          echo $error;
          $success = false;
          break;
        }
    }
    return $success;
  }
}

}

?>