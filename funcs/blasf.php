<?php 
function Bestemmia($text)
{
  $response = '';
  $bestemmiaArray = array(1 => 'dio scappato di casa');
  array_push($bestemmiaArray, 'dio cane abbandonato in autostrada');
  array_push($bestemmiaArray, 'madonna scalza in un paese di puntine');
  array_push($bestemmiaArray, 'dio camion di ghiaia e per ogni sasso un porco');
  array_push($bestemmiaArray, 'madonna porcodiona');
  array_push($bestemmiaArray, 'dio sushi nella valle dei giapponesi a dieta');
  array_push($bestemmiaArray, 'gesù pecora nella valle dei sardi arrapati');
  array_push($bestemmiaArray, 'gesù spazzino nelle valli partenopee');
  array_push($bestemmiaArray, 'gesù paglia nella valle degli incendi spontanei');
  array_push($bestemmiaArray, 'dio cucitore di scarpe della Nike sottopagato');
  array_push($bestemmiaArray, 'gesù bagno nella valle dell\'influenza intestinale');
  array_push($bestemmiaArray, 'gesù donna nella valle dei benzinai self-service');
  array_push($bestemmiaArray, 'madonna extravergine d\'oliva');
  array_push($bestemmiaArray, 'dio mondial casa');
  array_push($bestemmiaArray, 'cristo imbianchino');
  array_push($bestemmiaArray, 'CristoMcBacon');
  array_push($bestemmiaArray, 'dio lampione nella valle dei guasti dell\'enel');
  array_push($bestemmiaArray, 'dio maiale a Montagnana a fine dicembre');
  
  $min=1;
  $max=18;
  $randomNumber = rand($min, $max);
  shuffle($bestemmiaArray);
  
  $response = $bestemmiaArray[$randomNumber];
  return $response;
}
?>