<?php
function Bek($text)
{
  $response = '';
  $beckArray = array(1 => 'prlrlrendo lo stegagno!!');
  array_push($beckArray, 'sbobdadgli dentbdooo..');
  array_push($beckArray, 'io ci sarlrloooooo');
  array_push($beckArray, '..e la lasci piena iihiihiihh');
  array_push($beckArray, 'meto in leto la tigrbdee');
  array_push($beckArray, 'e quell\'altrlra trlrloia che da in girlro la carlblta igienicaaa!');
  array_push($beckArray, 'cosa fai mangi la pancetta con le mani come i marbrlrocchini!?!');
  array_push($beckArray, 'tanti augubrlrlri anche alle donne brlrutte!');
  array_push($beckArray, 'io posso!!!');
  array_push($beckArray, '..madonna inviperlbdritaaa!!!');
  $min=1;
  $max=10;
  $randomNumber = rand($min, $max);
  shuffle($beckArray);
  
  $response = $beckArray[$randomNumber];
  return $response;
}
?>