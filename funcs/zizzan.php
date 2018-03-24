<?php
function Zizzania($text)
{
  $response = '';
  if($usersCount < 2)
  {
    $response = 'troppo pochi utenti';
  }
  else
  {
    foreach($users as $value)
     array_push($usersCopy, $value);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    $randomNumber = rand($min, $max);
    shuffle($usersCopy);
    $user1 = $usersCopy[$randomNumber];
    if (($key = array_search($user1, $usersCopy)) !== false)
      unset($usersCopy[$key]);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    $randomNumber = rand($min, $max);
    shuffle($usersCopy);
    $user2 = $usersCopy[$randomNumber];
    
    $zizzaniaArray = array(1 => $user1 . ' ha detto al Bek che ' . $user2 . ' ha fatto un gruppo segreto di Whatsapp senza di lui');
    array_push($zizzaniaArray, $user1 . ' mi ha detto che a ' . $user2 . ' gli puzza il pisello da distante 2 metri');
    array_push($zizzaniaArray, $user1 . ' va in giro a dire che ' . $user2 . ' va a transoni');
    array_push($zizzaniaArray, $user1 . ' mi ha detto che a ' . $user2 . ' piace rasare le palle ai negri');
    array_push($zizzaniaArray, $user1 . ' dice in giro che ' . $user2 . ' ne prende in culo due alla volta');
    array_push($zizzaniaArray, $user1 . ' va in giro a dire che ' . $user2 . ' va a transoni');
    array_push($zizzaniaArray, $user1 . ' tira le loffe e da la colpa a ' . $user2);
    array_push($zizzaniaArray, $user1 . ' mi dice sempre che a ' . $user2 . ' piace il cazzo');
    $min=1;
    $max=8;
    $randomNumber = rand($min, $max);
    shuffle($zizzaniaArray);
    $response = $zizzaniaArray[$randomNumber];
  }
  return $response;
}
?>