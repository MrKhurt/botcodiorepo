<?php
// recupero il contenuto inviato da Telegram
$content = file_get_contents("php://input");
// converto il contenuto da JSON ad array PHP
$update = json_decode($content, true);
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
$response = $text;
if(strpos($text, 'nonno fiorucci') !== false)
{
  $fiorucci01 = 'dio tubercoloso fracio';
  $fiorucci02 = 'dio serpente avvelenato';
  $fiorucci03 = 'madonna sta troia sta zzingara';
  $fiorucci04 = 'scemo! scemo! scemo!';
  $fiorucci05 = 'dio serpente bove';
  $fiorucci06 = 'io te porto a Villa Candida punto, e basta!';
  $fiorucci07 = 'sta stu stronzo!';
  $fiorucci08 = 'noooooooddiocane!';
  $min=1;
  $max=8;
  $randomNumber = rand($min, $max);
  
  
  $parameters = array('chat_id' => $chatId, "text" => $randomNumber);
  // method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
  $parameters["method"] = "sendMessage";
  // salvo l'ultimo messaggio ricevuto così al prossimo giro ho il messaggio precedente 
  $GLOBALS['previous'] = $text;
  // converto e stampo l'array JSON sulla response
  echo json_encode($parameters);
  
  switch($randomNumber)
  {
    case 1:
      $response = $fiorucci1;
      break;
    case 2:
      $response = $fiorucci2;
      break;
    case 3:
      $response = $fiorucci3;
      break;
    case 4:
      $response = $fiorucci4;
      break;
    case 5:
      $response = $fiorucci5;
      break;
    case 6:
      $response = $fiorucci6;
      break;
    case 7:
      $response = $fiorucci7;
      break;
    case 8:
      $response = $fiorucci8;
      break;
    default:
      $response = 'Dio tubercoloso fraacio!';
      break;
  }
}
if(strpos($text, 'saluta') !== false)
{
  $response = 'Sai chi ti saluta?';
}
if(strpos($text, 'chi?') !== false)
{
  if(strpos($previous, 'saluta') != false)
    $response = 'Stocazzo!';
}

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
