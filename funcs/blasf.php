<?php 
function Bestemmia($text)
{
  $response = '';
  $bestemmiaArray = array(1 => 'dio scappato di casa');
  array_push($bestemmiaArray, 'dio cane abbandonato in autostrada');
  array_push($bestemmiaArray, 'madonna scalza in un paese di puntine');
  array_push($bestemmiaArray, 'dio camion di ghiaia e per ogni sasso un porco');
  array_push($bestemmiaArray, 'dio travestito');
  array_push($bestemmiaArray, 'dio sushi nella valle dei giapponesi a dieta');
  array_push($bestemmiaArray, 'gesù pecora nella valle dei sardi arrapati');
  array_push($bestemmiaArray, 'il signore è il mio pastore ...maremmano');
  array_push($bestemmiaArray, 'Dio cane in un ristorante cinese');
  array_push($bestemmiaArray, 'Dio caccola del laso col pelo dentro');
  array_push($bestemmiaArray, 'Dio malmignatta');
  array_push($bestemmiaArray, 'madonna schittona');
  array_push($bestemmiaArray, 'dio toy boy');
  array_push($bestemmiaArray, 'gesù paglia nella valle degli incendi spontanei');
  array_push($bestemmiaArray, 'Dio bastardo che nel culo c\'ha un petardo');
  array_push($bestemmiaArray, 'gesù bagno nella valle dell\'influenza intestinale');
  array_push($bestemmiaArray, 'gesù donna nella valle dei benzinai self-service');
  array_push($bestemmiaArray, 'madonna extravergine d\'oliva');
  array_push($bestemmiaArray, 'dio sedotto e abbandonato');
  array_push($bestemmiaArray, 'cristo imbianchino');
  array_push($bestemmiaArray, 'CristoMcBacon');
  array_push($bestemmiaArray, 'dio lampione nella valle dei guasti dell\'enel');
  array_push($bestemmiaArray, 'dio fa el pan Ferigato can');
  
  $min=1;
  $max=23;
  $randomNumber = rand($min, $max);
  shuffle($bestemmiaArray);
  
  $response = $bestemmiaArray[$randomNumber];
  return $response;
}
?>