<?php
function Insulta($text)
{
  $response = '';
  $offeso = '';
  if(strpos($text, 'insulta') !== false)
  {
    $arr = explode('insulta', $text);
    $offeso = $arr[1];
  }
  else 
  {
    $arr = explode('offendi', $text);
    $offeso = $arr[1];
  }
  
  $offesaArray = array(1 => ' chissá che ti cadano le braccia e inizi a pruderti il culo nello stesso istante');
  array_push($offesaArray, ' non capisci un cazzo neanche se ne ingoi un mazzo');
  array_push($offesaArray, ' sei come la minchia sempre tra le palle');
  array_push($offesaArray, ' perché mi fai porcodiare?');
  array_push($offesaArray, ' sei un diomas\'cio');
  array_push($offesaArray, ' sei così brutto che quando sei nato tua mamma ha inviato i biglietti di scuse a tutti');
  array_push($offesaArray, ' si fa prima a finire un cubo di rubik che a trovarti il cazzo tanto é piccolo');
  array_push($offesaArray, ' darti dello stupido è oltraggiare gli stupidi, perciò per offenderti è urgente cercare una nuova parola');
  array_push($offesaArray, ' che cos\'è una disgrazia? Conoscerti e incontrarti hahaha ..diocan');
  array_push($offesaArray, ' sei come una nuvola, se ti levi dalle palle diventa una bella giornata');
  array_push($offesaArray, ' sei così brutto che se i testimoni di geova vengono a casa tua, si chiudono la porta in faccia da soli');
  array_push($offesaArray, ' sei così brutto che se qualcuno ti guarda il culo ti chiede perchè stai facendo la verticale');
  array_push($offesaArray, ' sei così brutto che quando preghi Gesù si mette su invisibile');
  array_push($offesaArray, ' sei falso come i soldi del monopoli');
  
  $min=1;
  $max=14;
  $randomNumber = rand($min, $max);
  shuffle($offesaArray);
  $response = $offeso . $offesaArray[$randomNumber];
  return $response;
}
?>