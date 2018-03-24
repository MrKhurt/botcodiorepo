<?php
//include 'imagesearch.php';

function CercaFoto($text)
{
	$response = '';	  
	// cerco foto con chiave = resto del messaggio dopo 'cerca foto'
	$split = 'cerca foto ';
	$arr = explode($split, $text);
	$resto = $arr[1];
	// termina con ' gif'? allora cerco una gif
	$length = strlen($resto);
	if(length !== 0)
	{
	  if (strpos($resto, 'gif') !== false)
	  {
		$arr2 = explode(' gif', $resto);
		$resto = $arr2[0];
		$response = imagesearch(str_replace('gif', '', $resto), true);
	  }
	  else
	  {
		$response = imagesearch($resto, false);
	  }
	}
	return $response;
}
?>