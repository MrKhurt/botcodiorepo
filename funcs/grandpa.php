<?php
function Proverbio($text)
{
  $response = '';
  $proverbioArray = array(1 => 'Se la lengua nn sa de vacca ..la bocca non se stracca');
  array_push($proverbioArray, 'Fidati della volpe fidati del tasso, ma mai della donna col culo basso');
  array_push($proverbioArray, 'Ne per scherzo ne per burla dentro al culo non ci voglio nulla');
  array_push($proverbioArray, 'A cazzo dritto è difficile mantenere la calma');
  array_push($proverbioArray, 'Geloso de culo frocio sicuro');
  array_push($proverbioArray, 'Le figlie di Maria son le prime a darla via');
  array_push($proverbioArray, 'Quando s\'ha ben magnà e ben bevù se zerca el buso indò nar su');
  array_push($proverbioArray, 'Ala de capon, culo de castron e tete de massara xe na roba rara');
  array_push($proverbioArray, 'Ale done, ai sassi e ai bissi, colpi ciari e fissi');
  array_push($proverbioArray, 'Co l\'età, l\'omo fa panza e la femena fa stomego');
  array_push($proverbioArray, 'Co\'l cavéjo tra al bianchin, assa la dona e tiente el vin');
  array_push($proverbioArray, 'In istà la vache va in montagna a fare le siore, e le siore va in montagna a fare le vache');
  array_push($proverbioArray, 'La mojere xe come na scoreza: o te a moli o te te sofeghi');
  array_push($proverbioArray, 'Libri, done e cavai no se inpresta mai');
  array_push($proverbioArray, 'On palo in piè, na stropa domà e na fémena colgà i porta quanto peso che te voi');
  array_push($proverbioArray, 'Ovo de on\'ora, pan de on dì, vin de on ano, dona de vinti e amigo de trenta');
  $min=1;
  $max=16;
  $randomNumber = rand($min, $max);
  shuffle($proverbioArray);
  
  $response = $proverbioArray[$randomNumber];
  return $response;
}
?>