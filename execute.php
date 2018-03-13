<?php
// includo il file imagessearch.php per la ricerca immagini da google images
require_once 'vendor/autoload.php';
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
// inizializzo il motore di ricerca
\odannyc\GoogleImageSearch\ImageSearch::config()->apiKey('AIzaSyChwnAsJAEgWgbj06tNHIa54KgC95n5O_Y');
\odannyc\GoogleImageSearch\ImageSearch::config()->cx('016485041220097449938:ox4wv57es20');


if(strpos($text, 'culo') !== false)
{
  $culo01 = 'ass model girl';
  $culo02 = 'lingerie model ass';
  $culo03 = 'bonjourmadame ass';
  $culo04 = 'non nude ass';
  $culo05 = 'sexy bottom girl';
  $culo06 = 'bikini model ass';
  $culo07 = 'hottest ass girl';
  $culo08 = 'tanga girl bum';
  $min=1;
  $max=8;
  $randomNumber = rand($min, $max);
  if($randomNumber == 1)
    $searchKey = $culo01;
  else if($randomNumber == 2)
    $searchKey = $culo02;
  else if($randomNumber == 3)
    $searchKey = $culo03;
  else if($randomNumber == 4)
    $searchKey = $culo04;
  else if($randomNumber == 5)
    $searchKey = $culo05;
  else if($randomNumber == 6)
    $searchKey = $culo06;
  else if($randomNumber == 7)
    $searchKey = $culo07;
  else if($randomNumber == 8)
    $searchKey = $culo08;
  
  $images = \odannyc\GoogleImageSearch\ImageSearch::search($searchKey, ['imgSize' => 'large']);
  $min=1;
  $max=10;
  $randomNumber = rand($min, $max);
  $response = $images["items"][$randomNumber]["link"];
}
if(strpos($text, 'figa') !== false || 
   strpos($text, 'fica') !== false || 
   strpos($text, 'gnocca') !== false || 
   strpos($text, 'gnagna') !== false ||
   strpos($text, 'zozzerellona') !== false || 
   strpos($text, 'zozza') !== false || 
   strpos($text, 'buongiorno') !== false)
{
  $figa01 = 'lingerie model';
  $figa02 = 'hot bikini models';
  $figa03 = 'stunning non nude girls';
  $figa04 = 'suicide girl sexy shot';
  $figa05 = 'sexy model';
  $figa06 = 'beach bikini hot';
  $figa07 = 'mia khalifa sexy non nude';
  $figa08 = 'leanna decker hot';
  $figa09 = 'lexi belle non nude sexy';
  $figa10 = 'katie fey hot';
  $figa11 = 'faye reagan sexy';
  $figa12 = 'piper fawn sexy';
  $min=1;
  $max=12;
  $randomNumber = rand($min, $max);
  if($randomNumber == 1)
    $searchKey = $figa01;
  else if($randomNumber == 2)
    $searchKey = $figa02;
  else if($randomNumber == 3)
    $searchKey = $figa03;
  else if($randomNumber == 4)
    $searchKey = $figa04;
  else if($randomNumber == 5)
    $searchKey = $figa05;
  else if($randomNumber == 6)
    $searchKey = $figa06;
  else if($randomNumber == 7)
    $searchKey = $figa07;
  else if($randomNumber == 8)
    $searchKey = $figa08;
  else if($randomNumber == 9)
    $searchKey = $figa09;
  else if($randomNumber == 10)
    $searchKey = $figa10;
  else if($randomNumber == 11)
    $searchKey = $figa11;
  else if($randomNumber == 12)
    $searchKey = $figa12;
  
  $images = \odannyc\GoogleImageSearch\ImageSearch::search($searchKey, ['imgSize' => 'large']);
  $min=1;
  $max=10;
  $randomNumber = rand($min, $max);
  $response = $images["items"][$randomNumber]["link"];
  
  if(strpos($text, 'buongiorno') !== false)
  {
    $buongiorno01 = 'buongiorno cani!';
    $buongiorno02 = 'buongiorno morti de figa!';
    $buongiorno03 = 'buongiorno froci!';
    $buongiorno04 = 'buongiorno merdacce!';
    $min=1;
    $max=4;
    $randomNumber = rand($min, $max);
    if($randomNumber == 1)
      $resto = $buongiorno01;
    else if($randomNumber == 2)
      $resto = $buongiorno02;
    else if($randomNumber == 3)
      $resto = $buongiorno03;
    else if($randomNumber == 4)
      $resto = $buongiorno04;
      $response = $response . $resto;
    }
}
if(strpos($text, 'tette') !== false || 
   strpos($text, 'poppe') !== false || 
   strpos($text, 'zinne') !== false || 
   strpos($text, 'tettona') !== false ||
   strpos($text, 'mammelle') !== false || 
   strpos($text, 'capezzoli') !== false || 
   strpos($text, 'capezzolo') !== false)
{
  $tette01 = 'topless lexi belle';
  $tette02 = 'topless jenya d';
  $tette03 = 'topless ratajkovsky';
  $tette04 = 'topless denise milani';
  $tette05 = 'piper fawn tits';
  $tette06 = 'topless playmate';
  $tette07 = 'topless hot girl';
  $tette08 = 'leanna decker topless';
  $tette09 = 'katie fey tits';
  $tette10 = 'tits sexy girl';
  $tette11 = 'tits topless model';
  $tette12 = 'mia khalifa hot';
  $min=1;
  $max=12;
  $randomNumber = rand($min, $max);
  if($randomNumber == 1)
    $searchKey = $tette01;
  else if($randomNumber == 2)
    $searchKey = $tette02;
  else if($randomNumber == 3)
    $searchKey = $tette03;
  else if($randomNumber == 4)
    $searchKey = $tette04;
  else if($randomNumber == 5)
    $searchKey = $tette05;
  else if($randomNumber == 6)
    $searchKey = $tette06;
  else if($randomNumber == 7)
    $searchKey = $tette07;
  else if($randomNumber == 8)
    $searchKey = $tette08;
  else if($randomNumber == 9)
    $searchKey = $tette09;
  else if($randomNumber == 10)
    $searchKey = $tette10;
  else if($randomNumber == 11)
    $searchKey = $tette11;
  else if($randomNumber == 12)
    $searchKey = $tette12;
  
  $images = \odannyc\GoogleImageSearch\ImageSearch::search($searchKey, ['imgSize' => 'large']);
  $min=1;
  $max=10;
  $randomNumber = rand($min, $max);
  $response = $images["items"][$randomNumber]["link"];
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

