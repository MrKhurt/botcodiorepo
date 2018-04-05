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
	$oDB = new \LibPostgres\LibPostgresDriver(array(
		'host' => 'ec2-54-195-246-59.eu-west-1.compute.amazonaws.com',
		'port' => 5432,
		'user_name' => 'gitlnvpllfgmfw',
		'user_password' => '9ae32b181501db8396e04a062c2403085329eb2e11e29c03eff5681c961a9c2e',
		'db_name' => 'da0sfabjj8slkn',
	));

	// se non esiste giá creo la tabella utenti nel db
	$oDB->startTransaction();
	$oDB->query("
		CREATE TABLE IF NOT EXISTS users (
			id bigserial NOT NULL,
			name varchar(255) NOT NULL,
			CONSTRAINT users_pkey PRIMARY KEY (id)
		);
	");
	$oDB->commit();
	
    $users = $oDB->selectColumn("
		SELECT name
			FROM users
			LIMIT 3;
	");
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