<?php
require_once 'vendor/autoload.php';
use \Statickidz\GoogleTranslate;
include 'funcs/imagesearch.php';
include 'funcs/debug.php';
include 'funcs/nondef.php';
include 'funcs/def.php';
include 'funcs/price.php';
include 'funcs/imgranwkey.php';
include 'funcs/ass.php';
include 'funcs/pus.php';
include 'funcs/goodmor.php';
include 'funcs/commands.php';
include 'funcs/tits.php';
include 'funcs/milf.php';
include 'funcs/millenniummilf.php';
include 'funcs/fiorucci.php';
include 'funcs/zizzan.php';
include 'funcs/secret.php';
include 'funcs/bek.php';
include 'funcs/grandpa.php';
include 'funcs/insult.php';
include 'funcs/blasf.php';
include 'funcs/weather.php';

// recupero il contenuto inviato da Telegram
$content = file_get_contents("php://input");
// converto il contenuto da JSON ad array PHP
$update = json_decode($content, true);

// debug
// echo json_encode($update, true);

// se la richiesta è null interrompo lo script
if(!$update)
{
  exit;
}
// assegno alle seguenti variabili il contenuto ricevuto da Telegram
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
// pulisco il messaggio ricevuto togliendo eventuali spazi prima e dopo il testo
$text = trim($text);
// converto tutti i caratteri alfanumerici del messaggio in minuscolo
$text = strtolower($text);
$response = '';

// USERS
$file = 'funcs/users.txt';
//Use the function is_file to check if the file already exists or not.
if(!is_file($file)){
    //Some simple example content.
    $contents = '';
    //Save our content to the file.
    file_put_contents($file, $contents);
}
$file = file_get_contents('users.txt', true);
$users = explode(',', $file);
if(!in_array($firstname, $users, true))
{
  // l'utente corrente non c'é nella lista, lo aggiungo e salvo
  array_push($users, $firstname);
  $usersCount = 0;
  foreach($users as $value)
  {
    if($value !== '')
    {
      file_put_contents('funcs/users.txt', $value . ',' , FILE_APPEND | LOCK_EX);
      //fwrite('./funcs/users.txt', $value . ',');
      $usersCount = $usersCount + 1;
    }
  }
}

// ESCAPE PER BYPASSARE IL BOT: "... "
if(substr($text, 0, 4) === '... ')
{
  exit(0);
}

// INIZIO: COMANDI
if(strpos($text, 'comandi') !== false)
{
	$response = Comandi($text);
}

// DEBUG
else if(substr($text, 0, 6) === 'debug ')
{
  $response = Debug($text);
}

// CINA
else if($text === 'cina')
{
  if(date('D') === 'Sat' || date('D') === 'Fri')
    $response = 'Sarà in divano che dorme el mona!';
}

// TRADUCI
else if(substr($text, 0, 8) === 'traduci ')
{
  $arr = explode('traduci ', $text);
  $source = 'null';
  $target = 'it';
  $texttr = $arr[1];

  $trans = new \Statickidz\GoogleTranslate\GoogleTranslate();
  $result = $trans->translate($source, $target, $texttr) + '  ciao';
}

// NONDEFINIZIONE
else if(substr($text, 0, 15) === 'nondefinizione ')
{
  $response = Nondefinizione($text);
}

// DEFINIZIONE
else if(substr($text, 0, 12) === 'definizione ')
{
  $response = Definizione($text);
}

// PREZZO
else if(substr($text, 0, 7) === 'prezzo ')
{
  $response = Prezzo($text);
}

// CERCA FOTO
else if(substr($text, 0, 11) === 'cerca foto ')
{
	$response = CercaFoto($text);
}

// CULO
else if(strpos($text, 'culo') !== false)
{
	$response = Culo($text);
}

// FIGA
else if(strpos($text, 'figa') !== false || 
   strpos($text, 'fica') !== false || 
   strpos($text, 'gnocca') !== false || 
   strpos($text, 'gnagna') !== false ||
   strpos($text, 'zozzerellona') !== false || 
   strpos($text, 'zozza') !== false)
{
	$response = Figa($text);
}

// BUONGIORNO
else if(strpos($text, 'buongiorno') !== false)
{
	$response = Buongiorno($text);
}

// TETTE
else if(strpos($text, 'tette') !== false || 
   strpos($text, 'poppe') !== false || 
   strpos($text, 'zinne') !== false || 
   strpos($text, 'tettona') !== false ||
   strpos($text, 'mammelle') !== false || 
   strpos($text, 'capezzoli') !== false || 
   strpos($text, 'capezzolo') !== false || 
   strpos($text, 'zizze') !== false)
{
	$response = Tette($text);
}

// MILF DEL MILLENNIO
else if(strpos($text, 'milf del millennio') !== false)
{
	$response = MilfDelMillennio($text);
}

// MILF
else if(strpos($text, 'milf') !== false || 
   strpos($text, 'milfona') !== false)
{
	$response = Milf($text);
}

// GILF
else if(strpos($text, 'gilf') !== false)
{
  $response = 'C\'è un limite a tutto butei';
}

// RATAJKOWSKI SBAGLIATO
else if(strpos($text, 'ratajkovski') !== false || 
   strpos($text, 'ratajkovsky') !== false ||
   strpos($text, 'ratajkowsky') !== false ||
   strpos($text, 'rataykowsky') !== false ||
   strpos($text, 'rataykovski') !== false ||
   strpos($text, 'rataykovsky') !== false)
{
  $response = 'Si scrive Ratajkowski, cane!';
}

// PAZZO
else if(strpos($text, 'pazzo') !== false || strpos($text, 'pazza') !== false)
{
  $response = 'Aaaah sono pazzaaa!';
}

// SCOPARE
else if(strpos($text, 'scopare') !== false || 
        strpos($text, 'bombare') !== false || 
        strpos($text, 'trombare') !== false || 
        strpos($text, 'scoparti') !== false || 
        strpos($text, 'scoparvi') !== false || 
        strpos($text, 'trombarti') !== false || 
        strpos($text, 'trombarvi') !== false || 
        strpos($text, 'bombarvi') !== false || 
        strpos($text, 'bombarti') !== false)
{
  $response = 'io porto frustino e manette!';
}

// RATAJKOWSKI
else if(strpos($text, 'ratajkowski') !== false)
{
    if(strpos($text, 'gif') !== false)
      $response = imagesearch('emily ratajkowski nude', true);
    else
      $response = imagesearch('emily ratajkowski nude', false);
}

// NARGI
else if(strpos($text, 'nargi') !== false)
{   
    if(strpos($text, 'gif') !== false)
      $response = imagesearch('nargi nude', true);
    else
      $response = imagesearch('nargi nude', false);
}

// DECKER
else if(strpos($text, 'decker') !== false)
{
    if(strpos($text, 'gif') !== false)
      $response = imagesearch('leanna decker nude', true);
    else
      $response = imagesearch('leanna decker nude', false);
}

// EMMA WATSON
else if(strpos($text, 'emma watson') !== false)
{
    if(strpos($text, 'gif') !== false)
      $response = imagesearch('emma watson hot', true);
    else
      $response = imagesearch('emma watson hot', false);
}

// KATIE PERRY
else if(strpos($text, 'katie perry') !== false)
{
    if(strpos($text, 'gif') !== false)
      $response = imagesearch('katie perry hot', true);
    else
      $response = imagesearch('katie perry hot', false);
}

// NONNO FIORUCCI
else if(strpos($text, 'nonno fiorucci') !== false)
{
	$response = NonnoFiorucci($text);
}

// ZIZZANIA
else if(strpos($text, 'zizzania') !== false)
{
	$response = Zizzania($text);
}

// SEGRETO
else if(strpos($text, 'segreto') !== false)
{
	$response = Segreto($text);
}

// BEK
else if(strpos($text, 'bek') !== false || strpos($text, 'beck') !== false)
{
	$response = Bek($text);
}

// BESTEMMIA
else if(strpos($text, 'bestemmia') !== false || 
           strpos($text, 'bestemmione') !== false || 
           strpos($text, 'blasfemia') !== false)
{
	$response = Bestemmia($text);
}

// NONNO
else if(strpos($text, 'nonno') !== false || 
          strpos($text, 'proverbio') !== false || 
          strpos($text, 'poesia') !== false)
{
	$response = Proverbio($text);
}

// SALUTA
else if(strpos($text, 'saluta') !== false)
{
  $response = 'Sai chi ti saluta?';
}

// CHI?
else if(strpos($text, 'chi?') !== false)
{
  $response = 'Stocazzo!';
}

// COME STAI?
else if(strpos($text, 'come stai botcodio?') !== false
       || strpos($text, 'botcodio come stai?') !== false)
{
  $response = 'Alla grande dio bestia!';
}

// GAY
else if(strpos($text, 'gay') !== false || 
        strpos($text, 'froci') !== false ||
        strpos($text, 'frocio') !== false)
{
  $response = 'se vuoi il mio pisellone meccanico sai dove trovarmi!';
}

// VIBRATORE
else if(strpos($text, 'vibratore') !== false || 
        strpos($text, 'dildo') !== false)
{
  $response = 'quando tremo non é mai per paura 8===D';
}

// PIOVE?
else if(strpos($text, 'piove') !== false || strpos($text, 'pioggia') !== false)
{
  $response = 'https://i.pinimg.com/736x/35/6e/95/356e954c36268ae6caa5700251932891--wet-t-shirt-wet-wet-wet.jpg governo ladro!';
}

// METEO
else if(strpos($text, 'meteo') !== false || 
        strpos($text, 'che tempo fa a') !== false)
{
	$response = Meteo($text);
}

// BUONANOTTE
else if(strpos($text, 'buonanotte') !== false)
{
  $response = '...al cazzo!';
}

// INSULTA BOT
else if(strpos($text, 'insulta botcodio') !== false || 
          strpos($text, 'offendi botcodio') !== false)
{
  $response = 'Chi é che vuoi offendere eh frocetto? Ti schiaffeggio con il cazzo!';
}

// INSULTA
else if(strpos($text, 'insulta') !== false || 
          strpos($text, 'offendi') !== false)
{
	$response = Insulta($text);
}


// INVIO RISPOSTA
if($response != '')
{
  // mi preparo a restitutire al chiamante la mia risposta che è un oggetto JSON
  // imposto l'header della risposta
  header("Content-Type: application/json");
  // la mia risposta è un array JSON composto da chat_id, text, method
  // chat_id mi consente di rispondere allo specifico utente che ha scritto al bot
  // text è il testo della risposta
  $parameters = array('chat_id' => $chatId, "text" => $response);
  // method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
  $parameters["method"] = "sendMessage";
  // salvo l'ultimo messaggio ricevuto così al prossimo giro ho il messaggio precedente 
  $GLOBALS['previous'] = $text;
  // converto e stampo l'array JSON sulla response
  echo json_encode($parameters);
}

