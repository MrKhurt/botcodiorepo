<?php
function Meteo($text)
{
  $response = '';
  $localita = $text;
  $localita = str_replace('meteo', '', $localita);
  $localita = str_replace('che tempo fa a', '', $localita);
  $localita = trim($localita);
  $response = $localita;
  
  if($localita === '')
  {
    $response = 'https://www.ilmeteo.it/meteo/Verona';
  }
  else
  {
    $localita = str_replace(' ', '%20', $localita);
    $response = 'https://www.ilmeteo.it/meteo/' . $localita;
  }
  return $response;
}
?>