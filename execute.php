<?php
require_once 'vendor/autoload.php';
include 'imagesearch.php';

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

// INIZIO
if(strpos($text, 'comandi') !== false)
{
    $response = 'Comandi BotCodio:'.chr(10).'culo '.chr(10).'figa '
      .chr(10).'fica '.chr(10).'gnagna '.chr(10).'gnocca '.chr(10).
      'zozzerellona '.chr(10).'zozza '.chr(10).'buongiorno '.chr(10).
      'tette '.chr(10).'poppe '.chr(10).'zinne '.chr(10).'tettona '
      .chr(10).'mammelle '.chr(10).'capezzoli '.chr(10).'capezzolo '
      .chr(10).'ratajkowski '.chr(10).'nargi '.chr(10).'decker '.chr(10).
      'nonno fiorucci '.chr(10).'bek '.chr(10).'beck '.chr(10).
      'bestemmia '.chr(10).'bestemmione '.chr(10).'blasfemia '.chr(10).
      'nonno '.chr(10).'proverbio '.chr(10).'poesia '.chr(10).'saluta '
      .chr(10).'chi? '.chr(10).'insulta '.chr(10).'offendi';
}

// DEBUG
else if(substr($text, 0, 6) === 'debug ')
{
  if(strpos($text, 'message') !== false)
  {
    var_dump($update);
    $response = ob_get_clean();
  }
}

// CERCA FOTO
else if(substr($text, 0, 11) === 'cerca foto ')
{
    // cerco foto con chiave = resto del messaggio dopo 'cerca foto'
    $split = 'cerca foto ';
    $arr = explode($split, $text);
    $resto = $arr[1];
    // termina con ' gif'? allora cerco una gif
    $length = strlen($resto);
    if(length !== 0)
    {
      if (substr($resto, -4) === ' gif')
      {
        $arr2 = explode(' gif', $resto);
        $resto = $arr2[0];
        $response = imagesearch($resto, true);
      }
      else
      {
        $response = imagesearch($resto, false);
      }
    }
}

// CULO
else if(strpos($text, 'culo') !== false)
{
  $culo01 = 'ass model girl';
  $culo02 = 'lingerie model ass';
  $culo03 = 'bonjourmadame ass';
  $culo04 = 'non nude model sexy ass';
  $culo05 = 'sexy bottom girl';
  $culo06 = 'bikini model ass';
  $culo07 = 'hottest ass girl';
  $culo08 = 'underwear model sexy ass girl';
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
  
  $isGif = '';
  $arr = explode('culo', $text);
  $isGif = $arr[1];
  trim($isGif);
  $isGif = strtolower($isGif);
  if(substr( $isGif, 0, 4 ) === " gif")
    $response = imagesearch($searchKey, true);
  else
    $response = imagesearch($searchKey, false);
}

// FIGA
else if(strpos($text, 'figa') !== false || 
   strpos($text, 'fica') !== false || 
   strpos($text, 'gnocca') !== false || 
   strpos($text, 'gnagna') !== false ||
   strpos($text, 'zozzerellona') !== false || 
   strpos($text, 'zozza') !== false)
{
  $figa01 = 'lingerie model';
  $figa02 = 'little caprice non nude sexy';
  $figa03 = 'nude sexy cosplay girl';
  $figa04 = 'suicide girl sexy shot';
  $figa05 = 'katie jordan hot';
  $figa06 = 'sexy underwear model ass girl';
  $figa07 = 'mia khalifa sexy non nude';
  $figa08 = 'leanna decker hot';
  $figa09 = 'lexi belle non nude sexy';
  $figa10 = 'katie fey hot';
  $figa11 = 'faye reagan sexy';
  $figa12 = 'piper fawn sexy';
  $figa13 = 'jessica nigri hot';
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
  else if($randomNumber == 13)
    $searchKey = $figa13;
  // devo cercare una gif?
  if(strpos($text, 'figa') !== false)
    $split = 'figa';
  else if(strpos($text, 'fica') !== false)
    $split = 'fica';
  else if(strpos($text, 'gnocca') !== false)
    $split = 'gnocca';
  else if(strpos($text, 'gnagna') !== false)
    $split = 'gnagna';
  else if(strpos($text, 'zozzerellona') !== false)
    $split = 'zozzerellona';
  else if(strpos($text, 'zozza') !== false)
    $split = 'zozza';
  $isGif = '';
  $arr = explode($split, $text);
  $isGif = $arr[1];
  trim($isGif);
  $isGif = strtolower($isGif);
  if(substr( $isGif, 0, 4 ) === " gif")
    $response = imagesearch($searchKey, true);
  else
    $response = imagesearch($searchKey, false);
}

// BUONGIORNO
else if(strpos($text, 'buongiorno') !== false)
{
  $figa01 = 'lingerie model';
  $figa02 = 'little caprice non nude sexy';
  $figa03 = 'nude sexy cosplay girl';
  $figa04 = 'suicide girl sexy shot';
  $figa05 = 'katie jordan hot';
  $figa06 = 'sexy underwear model ass girl';
  $figa07 = 'mia khalifa sexy non nude';
  $figa08 = 'leanna decker hot';
  $figa09 = 'lexi belle non nude sexy';
  $figa10 = 'katie fey hot';
  $figa11 = 'faye reagan sexy';
  $figa12 = 'piper fawn sexy';
  $figa13 = 'jessica nigri hot';
  $min=1;
  $max=10;
  srand(mktime(0, 0, 0));
  $randomNumber = rand(0, 10);
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
  else if($randomNumber == 13)
    $searchKey = $figa13;
    
  $response = imagesearch($searchKey, false);
  
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
    $response = $response . '  ' . $resto;
    // oggi è sabato o domenica?
    if(date('D') === 'Sat' || date('D') === 'Sun') 
      $response = $response . ' Fatto merdon ieri sera? Caccagialla?';
}

// TETTE
else if(strpos($text, 'tette') !== false || 
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
  $tette10 = 'bouncing tits sexy solo';
  $tette11 = 'tits topless model';
  $tette12 = 'boobs topless sexy girl';
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

  if(strpos($text, 'tette') !== false)
    $split = 'tette';
  else if(strpos($text, 'poppe') !== false)
    $split = 'poppe';
  else if(strpos($text, 'zinne') !== false)
    $split = 'zinne';
  else if(strpos($text, 'tettona') !== false)
    $split = 'tettona';
  else if(strpos($text, 'mammelle') !== false)
    $split = 'mammelle';
  else if(strpos($text, 'capezzoli') !== false)
    $split = 'capezzoli';
  else if(strpos($text, 'capezzolo') !== false)
    $split = 'capezzolo';
  $isGif = '';
  $arr = explode($split, $text);
  $isGif = $arr[1];
  trim($isGif);
  $isGif = strtolower($isGif);
  if(substr( $isGif, 0, 4 ) === " gif")
    $response = imagesearch($searchKey, true);
  else
    $response = imagesearch($searchKey, false);
}

// MILF DEL MILLENNIO
else if(strpos($text, 'milf del millennio') !== false)
{
    $response = imagesearch('cristina d\'avena hot sexy', false) . ' ebeh!';
}

// MILF
else if(strpos($text, 'milf') !== false || 
   strpos($text, 'milfona') !== false)
{
  $milf01 = 'sexy hot cougar posing';
  $milf02 = 'topless sexy cougar';
  $milf03 = 'hot cougar model posing';
  $milf04 = 'esperanza gomez posing';
  $milf05 = 'raylene sexy posing';
  $milf06 = 'austin kincaid sexy';
  $milf07 = 'angelina valentine sexy';
  $milf08 = 'angelica raven sexy';
  $min=1;
  $max=12;
  $randomNumber = rand($min, $max);
  if($randomNumber == 1)
    $searchKey = $milf01;
  else if($randomNumber == 2)
    $searchKey = $milf02;
  else if($randomNumber == 3)
    $searchKey = $milf03;
  else if($randomNumber == 4)
    $searchKey = $milf04;
  else if($randomNumber == 5)
    $searchKey = $milf05;
  else if($randomNumber == 6)
    $searchKey = $milf06;
  else if($randomNumber == 7)
    $searchKey = $milf07;
  else if($randomNumber == 8)
    $searchKey = $milf08;

  if(strpos($text, 'milf') !== false)
    $split = 'milf';
  else if(strpos($text, 'milfona') !== false)
    $split = 'milfona';
  $isGif = '';
  $arr = explode($split, $text);
  $isGif = $arr[1];
  trim($isGif);
  $isGif = strtolower($isGif);
  if(substr( $isGif, 0, 4 ) === " gif")
    $response = imagesearch($searchKey, true);
  else
    $response = imagesearch($searchKey, false);
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

// RATAJKOWSKI
else if(strpos($text, 'ratajkowski') !== false)
{
    $split = 'ratajkowski';
    $isGif = '';
    $arr = explode($split, $text);
    $isGif = $arr[1];
    trim($isGif);
    $isGif = strtolower($isGif);
    if(substr( $isGif, 0, 4 ) === " gif")
      $response = imagesearch('emily ratajkowski nude', true);
    else
      $response = imagesearch('emily ratajkowski nude', false);
}

// NARGI
else if(strpos($text, 'nargi') !== false)
{   
    $split = 'nargi';
    $isGif = '';
    $arr = explode($split, $text);
    $isGif = $arr[1];
    trim($isGif);
    $isGif = strtolower($isGif);
    if(substr( $isGif, 0, 4 ) === " gif")
      $response = imagesearch('nargi nude', true);
    else
      $response = imagesearch('nargi nude', false);
}

// DECKER
else if(strpos($text, 'decker') !== false)
{
    $split = 'decker';
    $isGif = '';
    $arr = explode($split, $text);
    $isGif = $arr[1];
    trim($isGif);
    $isGif = strtolower($isGif);
    if(substr( $isGif, 0, 4 ) === " gif")
      $response = imagesearch('leanna decker nude', true);
    else
      $response = imagesearch('leanna decker nude', false);
}

// EMMA WATSON
else if(strpos($text, 'emma watson') !== false)
{
    $split = 'emma watson';
    $isGif = '';
    $arr = explode($split, $text);
    $isGif = $arr[1];
    trim($isGif);
    $isGif = strtolower($isGif);
    if(substr( $isGif, 0, 4 ) === " gif")
      $response = imagesearch('emma watson hot', true);
    else
      $response = imagesearch('emma watson hot', false);
}

// KATIE PERRY
else if(strpos($text, 'katie perry') !== false)
{
    $split = 'katie perry';
    $isGif = '';
    $arr = explode($split, $text);
    $isGif = $arr[1];
    trim($isGif);
    $isGif = strtolower($isGif);
    if(substr( $isGif, 0, 4 ) === " gif")
      $response = imagesearch('katie perry hot', true);
    else
      $response = imagesearch('katie perry hot', false);
}

// NONNO FIORUCCI
else if(strpos($text, 'nonno fiorucci') !== false)
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

// BEK
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

// BESTEMMIA
else if(strpos($text, 'bestemmia') !== false || 
           strpos($text, 'bestemmione') !== false || 
           strpos($text, 'blasfemia') !== false)
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

// NONNO
else if(strpos($text, 'nonno') !== false || 
          strpos($text, 'proverbio') !== false || 
          strpos($text, 'poesia') !== false)
{
  $proverbio01 = 'Se la lengua nn sa de vacca ..la bocca non se stracca';
  $proverbio02 = 'Fidati della volpe fidati del tasso, ma mai della donna col culo basso';
  $proverbio03 = 'Ne per scherzo ne per burla dentro al culo non ci voglio nulla';
  $proverbio04 = 'A cazzo dritto è difficile mantenere la calma';
  $proverbio05 = 'Geloso de culo frocio sicuro';
  $proverbio06 = 'Le figlie di Maria son le prime a darla via';
  $proverbio07 = 'Quando s\'ha ben magnà e ben bevù se zerca el buso indò nar su';
  $proverbio08 = 'Ala de capon, culo de castron e tete de massara xe na roba rara';
  $proverbio09 = 'Ale done, ai sassi e ai bissi, colpi ciari e fissi';
  $proverbio10 = 'Co l\'età, l\'omo fa panza e la femena fa stomego';
  $proverbio11 = 'Co\'l cavéjo tra al bianchin, assa la dona e tiente el vin';
  $proverbio12 = 'In istà la vache va in montagna a fare le siore, e le siore va in montagna a fare le vache';
  $proverbio13 = 'La mojere xe come na scoreza: o te a moli o te te sofeghi';
  $proverbio14 = 'Libri, done e cavai no se inpresta mai';
  $proverbio15 = 'On palo in piè, na stropa domà e na fémena colgà i porta quanto peso che te voi';
  $proverbio16 = 'Ovo de on\'ora, pan de on dì, vin de on ano, dona de vinti e amigo de trenta';
  $min=1;
  $max=16;
  $randomNumber = rand($min, $max);
  
  if($randomNumber == 1)
    $response = $proverbio01;
  else if($randomNumber == 2)
    $response = $proverbio02;
  else if($randomNumber == 3)
    $response = $proverbio03;
  else if($randomNumber == 4)
    $response = $proverbio04;
  else if($randomNumber == 5)
    $response = $proverbio05;
  else if($randomNumber == 6)
    $response = $proverbio06;
  else if($randomNumber == 7)
    $response = $proverbio07;
  else if($randomNumber == 8)
    $response = $proverbio08;
  else if($randomNumber == 9)
    $response = $proverbio09;
  else if($randomNumber == 10)
    $response = $proverbio10;
  else if($randomNumber == 11)
    $response = $proverbio11;
  else if($randomNumber ==12)
    $response = $proverbio12;
  else if($randomNumber == 13)
    $response = $proverbio13;
  else if($randomNumber == 14)
    $response = $proverbio14;
  else if($randomNumber == 15)
    $response = $proverbio15;
  else if($randomNumber == 16)
    $response = $proverbio16;
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

// PIOVE?
else if(strpos($text, 'piove') !== false || strpos($text, 'pioggia') !== false)
{
  $response = 'https://i.pinimg.com/736x/35/6e/95/356e954c36268ae6caa5700251932891--wet-t-shirt-wet-wet-wet.jpg governo ladro!';
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

