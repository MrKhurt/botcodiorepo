<?php
function Segreto($text)
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
    shuffle($usersCopy);
    $randomNumber = rand($min, $max);
    $user1 = $usersCopy[$randomNumber];
    if (($key = array_search($user1, $usersCopy)) !== false)
      unset($usersCopy[$key]);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    $randomNumber = rand($min, $max);
    shuffle($usersCopy);
    $user2 = $usersCopy[$randomNumber];
    
    $segretoArray = array(1 => $user1 . ' vuole portare ' . $user2 . ' alle terme per scopare in acqua');
    array_push($segretoArray, 'a ' . $user1 . ' piacerebbe leccare i piedi di ' . $user2);
    array_push($segretoArray, $user1 . ' ha una malsana ossessione per i capezzoli di ' . $user2);
    array_push($segretoArray, $user1 . ' ha rubato un paio di mutande usate di ' . $user2 . ' per annusarsele');
    array_push($segretoArray, $user1 . ' vorrebbe andare al pride village con ' . $user2);
    array_push($segretoArray, 'a ' . $user1 . ' piace l\'odore delle scoregge di ' . $user2);
    array_push($segretoArray, $user1 . ' vorrebbe essere frustato da ' . $user2);
    array_push($segretoArray, 'a ' . $user1 . ' piacerebbe essere posseduto da ' . $user2);
    $min=1;
    $max=8;
    $randomNumber = rand($min, $max);
    shuffle($segretoArray);
    
    $response = $segretoArray[$randomNumber];
  }
  return $response;
}
?>