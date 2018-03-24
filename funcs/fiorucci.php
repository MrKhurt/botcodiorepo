<?php
function NonnoFiorucci($text)
{
  $response = '';
  $fiorucciArray = array(1 => 'dio tubercoloso fracio');
  array_push($fiorucciArray, 'dio serpente avvelenato');
  array_push($fiorucciArray, 'madonna sta troia sta zzingara');
  array_push($fiorucciArray, 'scemo! scemo! scemo!');
  array_push($fiorucciArray, 'dio serpente bove');
  array_push($fiorucciArray, 'io te porto a Villa Candida punto, e basta!');
  array_push($fiorucciArray, 'sta stu stronzo!');
  array_push($fiorucciArray, 'noooooooddiocane!');
  array_push($fiorucciArray, '\'staccio ladro naltra volta!');
  $min=1;
  $max=9;
  $randomNumber = rand($min, $max);
  shuffle($fiorucciArray);
  $response = $fiorucciArray[$randomNumber];
  return $response;
}
?>