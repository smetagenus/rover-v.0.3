<?php
/**
 * Mars Rover 
 * 
 * Реализация программы-марсохода
 * Версия 0.3
 *     
 * @author Belyaev Mihail
*/
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'Autoloader.php';
use Autoloader as Autoloader;
use Mars\Coordinates as Coordinates;
use Mars\Polygon as Polygon;
use Mars\Orientation as Orientation;
use Mars\Rover as Rover;
use Mars\Moving as Moving;
use Mars\Parser as Parser;

//====================

// Входные параметры
$_GET['textarea']="5 5
1 2 N
LMLMLMLMM
4 3 E
MMRMMRMRRM";

// Сама программа
$input = new Parser;
if ($input->parsInput($_GET['textarea'])) // парсим входные данные и исполняем команды
{
  $lines = $input->getLinesArray();
  if ($input->parsPolygon($lines[0]))
  {
     $polygonSize = new Coordinates($input->getPolygonSize());
     $polygon = new Polygon($polygonSize);
     echo "Размер полигона ".$polygon->getSizeX()."x".$polygon->getSizeY()."<br>";

     for ($n = 1; $n <= $input->getRoverCnt(); $n++) {
        
            if ($input->parsPosition($lines[$n*2-1],$n))   // Координаты n-го ровера
              { 
                $coord = new Coordinates($input->getCoord());
                $orient = new Orientation($input->getOrient());
                $rover[$n] = new Rover($coord, $orient);

              } else break;
            if ($input->parsMoving($lines[$n*2],$n))     // Команды для n-го ровера
              {
                $coord = new Coordinates($input->getCoord());
                $orient = new Orientation($input->getOrient());
                $rover[$n]->setPosition($coord, $orient);
              } else break;
              
        echo "Начальная позиция ровера №".$n.": ". $rover[$n]->getStartX()  . " " . $rover[$n]->getStartY() . " " . $rover[$n]->getStartSide() ."<br>";
        echo "Измененная позиция ровера №".$n.": ". $rover[$n]->getPosX()  . " " . $rover[$n]->getPosY() . " " . $rover[$n]->getSide() ."<br>";    
    } 
  } 

}

?>