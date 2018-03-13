<?php
// includo il file imagessearch.php per la ricerca immagini da google images
include 'searchimages/ImageSearch.php';
//use searchimages/ImageSearch;
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
$response = '';


if(strpos($text, 'culo') !== false)
{
    ImageSearch::config()->apiKey('AIzaSyChwnAsJAEgWgbj06tNHIa54KgC95n5O_Y');
    ImageSearch::config()->cx('016485041220097449938:ox4wv57es20');
    $images = ImageSearch::search('hot ass girl', ['imgSize' => 'large']);
    //$min=1;
    //$max=8;
    //$randomNumber = rand($min, $max);
    $response = ' seh ciao';
}
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
  
  if($randomNumber == 1)
    $response = $fiorucci01;
  else if($randomNumber == 2)
    $response = $fiorucci02;
  else if($randomNumber == 3)
    $response = $fiorucci03;
  else if($randomNumber == 4)
    $response = $fiorucci04;
  else if($randomNumber == 5)
    $response = $fiorucci05;
  else if($randomNumber == 6)
    $response = $fiorucci06;
  else if($randomNumber == 7)
    $response = $fiorucci07;
  else if($randomNumber == 8)
    $response = $fiorucci08;
}
else if(strpos($text, 'bek') !== false || strpos($text, 'beck') !== false)
{
  $beck01 = 'prlrlrendo lo stegagno!!';
  $beck02 = 'sbobdadgli dentbdooo..';
  $beck03 = 'io ci sarlrloooooo';
  $beck04 = '..e la lasci piena iihiihiihh';
  $beck05 = 'meto in leto la tigrbdee';
  $beck06 = 'e quell\'altrlra trlrloia che da in girlro la carlblta igienicaaa!';
  $beck07 = 'cosa fai mangi la pancetta con le mani come i marbrlrocchini!?!';
  $beck08 = 'tanti augubrlrlri anche alle donne brlrutte!';
  $min=1;
  $max=8;
  $randomNumber = rand($min, $max);
  
  if($randomNumber == 1)
    $response = $beck01;
  else if($randomNumber == 2)
    $response = $beck02;
  else if($randomNumber == 3)
    $response = $beck03;
  else if($randomNumber == 4)
    $response = $beck04;
  else if($randomNumber == 5)
    $response = $beck05;
  else if($randomNumber == 6)
    $response = $beck06;
  else if($randomNumber == 7)
    $response = $beck07;
  else if($randomNumber == 8)
    $response = $beck08;
}
else if(strpos($text, 'bestemmia') !== false || strpos($text, 'bestemmione') !== false || strpos($text, 'blasfemia') !== false)
{
  $bestemmia01 = 'dio scappato di casa';
  $bestemmia02 = 'dio cane abbandonato in autostrada';
  $bestemmia03 = 'madonna scalza in un paese di puntine';
  $bestemmia04 = 'dio camion di ghiaia e per ogni sasso un porco';
  $bestemmia05 = 'madonna porcodiona';
  $bestemmia06 = 'dio sushi nella valle dei giapponesi a dieta';
  $bestemmia07 = 'gesù pecora nella valle dei sardi arrapati';
  $bestemmia08 = 'gesù spazzino nelle valli partenopee';
  $bestemmia09 = 'gesù paglia nella valle degli incendi spontanei';
  $bestemmia10 = 'dio cucitore di scarpe della Nike sottopagato';
  $bestemmia11 = 'gesù bagno nella valle dell\'influenza intestinale';
  $bestemmia12 = 'gesù donna nella valle dei benzinai self-service';
  $bestemmia13 = 'madonna extravergine d\'oliva';
  $bestemmia14 = 'dio mondial casa';
  $bestemmia15 = 'cristo imbianchino';
  $bestemmia16 = 'CristoMcBacon';
  $min=1;
  $max=16;
  $randomNumber = rand($min, $max);
  
  if($randomNumber == 1)
    $response = $bestemmia01;
  else if($randomNumber == 2)
    $response = $bestemmia02;
  else if($randomNumber == 3)
    $response = $bestemmia03;
  else if($randomNumber == 4)
    $response = $bestemmia04;
  else if($randomNumber == 5)
    $response = $bestemmia05;
  else if($randomNumber == 6)
    $response = $bestemmia06;
  else if($randomNumber == 7)
    $response = $bestemmia07;
  else if($randomNumber == 8)
    $response = $bestemmia08;
  else if($randomNumber == 9)
    $response = $bestemmia09;
  else if($randomNumber == 10)
    $response = $bestemmia10;
  else if($randomNumber == 11)
    $response = $bestemmia11;
  else if($randomNumber ==12)
    $response = $bestemmia12;
  else if($randomNumber == 13)
    $response = $bestemmia13;
  else if($randomNumber == 14)
    $response = $bestemmia14;
  else if($randomNumber == 15)
    $response = $bestemmia15;
  else if($randomNumber == 16)
    $response = $bestemmia16;
}
else if(strpos($text, 'saluta') !== false)
{
  $response = 'Sai chi ti saluta?';
}
else if(strpos($text, 'chi?') !== false)
{
  $response = 'Stocazzo!';
}
else if(strpos($text, 'insulta') !== false || strpos($text, 'offendi') !== false)
{
  $offeso = '';
  if(strpos($text, 'insulta') !== false)
  {
    $arr = explode('insulta', $text);
    $offeso = $arr[1];
  }
  else 
  {
    $arr = explode('offendi', $text);
    $offeso = $arr[1];
  }
  $offesa01 = ' chissá che ti cadano le braccia e inizi a pruderti il culo nello stesso istante';
  $offesa02 = ' non capisci un cazzo neanche se ne ingoi un mazzo';
  $offesa03 = ' sei come la minchia sempre tra le palle';
  $offesa04 = ' perché mi fai porcodiare?';
  $offesa05 = ' sei un diomas\'cio';
  $offesa06 = ' sei così brutto che quando sei nato tua mamma ha inviato i biglietti di scuse a tutti';
  $offesa07 = ' si fa prima a finire un cubo di rubik che a trovarti il cazzo tanto é piccolo';
  $offesa08 = ' darti dello stupido è oltraggiare gli stupidi, perciò per offenderti è urgente cercare una nuova parola';
  $offesa09 = ' che cos\'è una disgrazia? Conoscerti e incontrarti hahaha ..diocan';
  $offesa10 = ' sei come una nuvola, se ti levi dalle palle diventa una bella giornata';
  $offesa11 = ' sei così brutto che se i testimoni di geova vengono a casa tua, si chiudono la porta in faccia da soli';
  $offesa12 = ' sei così brutto che se qualcuno ti guarda il culo ti chiede perchè stai facendo la verticale';
  $offesa13 = ' sei così brutto che quando preghi Gesù si mette su invisibile';
  $offesa14 = ' sei falso come i soldi del monopoli';
  
  $min=1;
  $max=14;
  $randomNumber = rand($min, $max);
  if($randomNumber == 1)
    $response = $offeso . $offesa01;
  else if($randomNumber == 2)
    $response = $offeso . $offesa02;
  else if($randomNumber == 3)
    $response = $offeso . $offesa03;
  else if($randomNumber == 4)
    $response = $offeso . $offesa04;
  else if($randomNumber == 5)
    $response = $offeso . $offesa05;
  else if($randomNumber == 6)
    $response = $offeso . $offesa06;
  else if($randomNumber == 7)
    $response = $offeso . $offesa07;
  else if($randomNumber == 8)
    $response = $offeso . $offesa08;
  else if($randomNumber == 9)
    $response = $offeso . $offesa09;
  else if($randomNumber == 10)
    $response = $offeso . $offesa10;
  else if($randomNumber == 11)
    $response = $offeso . $offesa11;
  else if($randomNumber ==12)
    $response = $offeso . $offesa12;
  else if($randomNumber == 13)
    $response = $offeso . $offesa13;
  else if($randomNumber == 14)
    $response = $offeso . $offesa14;
}

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

