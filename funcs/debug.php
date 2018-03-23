<?php
function Debug($text)
{
  $response = '';
  if(strpos($text, 'message') !== false)
  {
    var_dump($update);
    $response = ob_get_clean();
  }
  else if(strpos($text, 'users') !== false)
  {
    $file = file_get_contents('users.txt', true);
    $users = explode(',', $file);
    foreach($users as $value)
      $response = $response . $value . ' ';
    $response = $response . ' BASTA';
  }
  else if(strpos($text, 'user') !== false)
  {
    $response = 'current user = ' . $firstname;
  }	
  return $response;
}
?>