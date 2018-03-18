<?php 
require_once 'vendor/autoload.php';
use FilippoToso\QwantUnofficialAPI\Client as QwantClient;

function imagesearch($key, $gif)
{
	$min=1;
    $max=3;
    $randomNumber = rand($min, $max);
    if($randomNumber === 1)
    {
      \odannyc\GoogleImageSearch\ImageSearch::config()->apiKey('AIzaSyChwnAsJAEgWgbj06tNHIa54KgC95n5O_Y');
      \odannyc\GoogleImageSearch\ImageSearch::config()->cx('016485041220097449938:ox4wv57es20');
      if($gif === true)
      	$images = \odannyc\GoogleImageSearch\ImageSearch::search($key, [fileType => 'gif']);
      else
        $images = \odannyc\GoogleImageSearch\ImageSearch::search($key, [fileType => 'png,jpg']);
      $min=1;
      $max=10;
      $randomNumber = rand($min, $max);
      return $images["items"][$randomNumber]["link"];
    }
    else if($randomNumber === 2)
    {
      \odannyc\GoogleImageSearch\ImageSearch::config()->apiKey('AIzaSyCAYtdoL8_dUauZHusuqaLdJIiwyAHxlzM');
      \odannyc\GoogleImageSearch\ImageSearch::config()->cx('016485041220097449938:iw7k0abtlsc');
      if($gif === true)
      	$images = \odannyc\GoogleImageSearch\ImageSearch::search($key, [fileType => 'gif']);
      else
        $images = \odannyc\GoogleImageSearch\ImageSearch::search($key, [fileType => 'png,jpg']);
      $min=1;
      $max=10;
      $randomNumber = rand($min, $max);
      return $images["items"][$randomNumber]["link"];
    }
    else
    {  
      // ricerca immagini Qwant
      // Create the client
      $client = new QwantClient('en_US');
      // Get all the images about the provided query
      if($gif === true)
        $images = $client->images($key . ' gif');
      else
        $images = $client->images($key);
      $min=1;
      $max=10;
      $randomNumber = rand($min, $max);
      return $images["items"][$randomNumber]["link"] . '  qwant';
    }
}
?>