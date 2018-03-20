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

// USERS
$file = file_get_contents('./users.txt', true);
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
      fwrite('./users.txt', $value . ',');
      $usersCount = $usersCount + 1;
    }
  }
}

// ESCAPE PER BYPASSARE IL BOT: "... "
if(substr($text, 0, 4) === '... ')
{
  exit(0);
}

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
  else if(strpos($text, 'users') !== false)
  {
    foreach($users as $value)
      $response = $response . $value . ' ';
    $response = $response . ' BASTA';
  }
  else if(strpos($text, 'user') !== false)
  {
    $response = 'current user = ' . $firstname;
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
  $culoArray = array(1 => 'ass model girl');
  array_push($culoArray, 'lingerie model ass');
  array_push($culoArray, 'bonjourmadame ass');
  array_push($culoArray, 'non nude model sexy ass');
  array_push($culoArray, 'sexy bottom girl');
  array_push($culoArray, 'bikini model ass');
  array_push($culoArray, 'hottest ass girl');
  array_push($culoArray, 'underwear model sexy ass girl');
  $min=1;
  $max=8;
  $randomNumber = rand($min, $max);
  $searchKey = $culoArray[$randomNumber];
  
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
  $figaArray = array(1 => 'lingerie model');
  array_push($figaArray, 'little caprice non nude sexy');
  array_push($figaArray, 'nude sexy cosplay girl');
  array_push($figaArray, 'suicide girl sexy shot');
  array_push($figaArray, 'katie jordan hot');
  array_push($figaArray, 'sexy underwear model ass girl');
  array_push($figaArray, 'mia khalifa sexy non nude');
  array_push($figaArray, 'leanna decker hot');
  array_push($figaArray, 'lexi belle non nude sexy');
  array_push($figaArray, 'katie fey hot');
  array_push($figaArray, 'faye reagan sexy');
  array_push($figaArray, 'piper fawn sexy');
  array_push($figaArray, 'jessica nigri hot');
  $min=1;
  $max=12;
  $randomNumber = rand($min, $max);
  $searchKey = $figaArray[$randomNumber];
  
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
  $figaArray = array(1 => 'lingerie model');
  array_push($figaArray, 'little caprice non nude sexy');
  array_push($figaArray, 'nude sexy cosplay girl');
  array_push($figaArray, 'suicide girl sexy shot');
  array_push($figaArray, 'katie jordan hot');
  array_push($figaArray, 'sexy underwear model ass girl');
  array_push($figaArray, 'mia khalifa sexy non nude');
  array_push($figaArray, 'leanna decker hot');
  array_push($figaArray, 'lexi belle non nude sexy');
  array_push($figaArray, 'katie fey hot');
  array_push($figaArray, 'faye reagan sexy');
  array_push($figaArray, 'piper fawn sexy');
  array_push($figaArray, 'jessica nigri hot');
  $min=1;
  $max=12;
  $randomNumber = rand($min, $max);
  $searchKey = $figaArray[$randomNumber];    
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
  $tetteArray = array(1 => 'https://i.pinimg.com/originals/df/b1/53/dfb153a926acbaee97a6c7aba8247db1.jpg');
  array_push($tetteArray, 'https://i.pinimg.com/originals/df/b1/53/dfb153a926acbaee97a6c7aba8247db1.jpg');
  array_push($tetteArray, 'http://www.juggsjoy.com/promo/brittney_white_btra.jpg');
  array_push($tetteArray, 'https://img2.3movs.com/contents/videos_screenshots/32000/32982/preview.mp4.jpg');
  array_push($tetteArray, 'https://i.pinimg.com/474x/ce/88/3d/ce883ded5627d491e713508ceb8afc45--exotic-women-sexy-poses.jpg');
  array_push($tetteArray, 'https://i.pinimg.com/originals/5a/5e/0e/5a5e0e8e511bcc8b00ccc8bb7344a297.jpg');
  array_push($tetteArray, 'http://content.erooups.com/img3/20101022/24/hot_model_with_nice_tits_5.jpg?1288325820');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQugyxNiM3WRMKl_Aym2ACY7FSV1WbIHG_OdAPNGBUvck5GDwdZKQ');
  array_push($tetteArray, 'https://ftopx.com/images/201403/ftop.ru_93132.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1NmXZ36OK0fAyEt8ujNV43cJscTRZwcMkSeSmif2nflQ4DeU2');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQigkwpPVLa6C3zmZWMNanxKXftO-VA5Vi4jIO9LgwYb8o3O6ZT');
  array_push($tetteArray, 'http://content4.novojoy.com/upload/main/4/2911824.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOz615ht5dZLK5ge3Ago7oYWoWasQHKdbhajMG6mPDfr6pkibGvQ');
  array_push($tetteArray, 'https://ftopx.com/large/201106/21531.jpg');
  array_push($tetteArray, 'https://hugetits.win/pics/e4/23902.jpg');
  array_push($tetteArray, 'https://y2.pichunter.com/2935017_4_o.jpg');
  array_push($tetteArray, 'https://i0-hw.twistyscontent.com/models/1586/m250x400.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSt6whGkgaldVoJvKACzSsF0TYcGwuNZ7xTifO4FtC6CWdthO_T');
  array_push($tetteArray, 'http://timdir.com/brea_lynn_hold_up_stockings/brea_lynn_17.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTntLE-n8ldcr5MzzX78ruy7USxPrH_X76-IHbBBg-9nFXXMP2u');
  array_push($tetteArray, 'http://www.tobeporn.com/wp-content/uploads/2015/10/super-hot-teen-naked-big-boobs.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBCPht5rTIhSbMvG0R-hoLmOXqk-vV2AF_k-amZblastBE61ya');
  array_push($tetteArray, 'http://www.big-teen-tits.com/wp-content/uploads/sites/17/2018/02/bigteentits-jade-ftvgirls.jpg');
  array_push($tetteArray, 'https://hottieoftheday.files.wordpress.com/2013/08/tumblr_mor7v4efil1qh0a33o1_5002.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHS8Occ3HhuwQfNeFv9iF27snWiMw7f2A8t-CmfcBzxredf5LC');
  array_push($tetteArray, 'https://i.pinimg.com/236x/c3/b4/12/c3b4129d4d39d724412b6ef5db4e4c25--sexy-red-head-faye-valentine.jpg');
  array_push($tetteArray, 'https://files.sexyandfunny.com/img_disp/img50bc25627c7ac.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROacT_SqfGycx39vTOyGuvTuzJ0AGOthCNq40S2UE39q06dxPf');
  array_push($tetteArray, 'http://images.luscious.net/30/cute_scene_girl_with_huge_boobs_1248412003.png');
  array_push($tetteArray, 'https://img-hw.xvideos-cdn.com/videos/thumbslll/23/b1/61/23b161c012f5a8e5563d3647c29f2cbd/23b161c012f5a8e5563d3647c29f2cbd.3.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy8AffoTsERyZSKsNuJ1yeucowcpd7jrHZUCK129Aw8aYjCQrg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSotsuPbxujr6dLVUoKXxfN3Kk-b5zpbwVbZunNNe62oaLzU1crPg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPps9j4yc7UnwRcP2vpmqu-yixDoreWbUWquvCYPdV13SS0ghA');
  array_push($tetteArray, 'https://www.freesexyindians.com/wp-content/uploads/2016/04/060416_14.jpg');
  array_push($tetteArray, 'https://cdnio.luscious.net/470/lusciousnet_suicide_girls_have_the__1729812036.jpg');
  array_push($tetteArray, 'http://redbust.com/stuff/suicide-girls-vol-7/suicide-girls-tattoos-naked-vol7-45-800x1200.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYOz2JuGSh1Od6skhY8-_2y26csvL75m2R3Jja2QMCJIhTCe1O');
  array_push($tetteArray, 'http://redbust.com/stuff/suicide-girls-vol-6/suicide-girls-tattoos-nude-vol6-35-boobs-800x1200.jpg');
  array_push($tetteArray, 'http://cdn-so.fantasti.cc/big/s/t/u/stubob72556/stubob72556_02f345.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToY-9VGItfjz4WR9qyOi6SBO1V8Id0mZBDBTljEgW272qwLtX4AA');
  array_push($tetteArray, 'http://www.boobpedia.com/wiki/images/thumb/a/a1/Milou_%28SuicideGirls%29_01.jpg/240px-Milou_%28SuicideGirls%29_01.jpg');
  array_push($tetteArray, 'http://cdn-so.fantasti.cc/big/e/l/s/elstiffler/elstiffler_ef9c84.jpg');
  array_push($tetteArray, 'https://files.sexyandfunny.com/img_disp/img50bc25631483b.jpg');
  array_push($tetteArray, 'https://i4.fuskator.com/large/nGKHHEZL0DM/Busty-Shaved-Brunette-Babe-Katie-Fey-with-Inverted-Nipples-4.jpg');
  array_push($tetteArray, 'http://www.rhinosgirls.com/wp-content/uploads/2013/08/12.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScntUJr-lUL2Z07l9MPt9_lnkmRy_TJwri4Ez1O-UYOFSaAngbFg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0I36wmw3r7iT19qHhi1pxbHVINC9l5hhf72Ml4x7wo0uSB3FE');
  array_push($tetteArray, 'https://thechive.files.wordpress.com/2017/10/boobs-bad-ideas-fubar-10_13_17-600-12.jpg?quality=85&strip=info&w=600');
  array_push($tetteArray, 'https://ci.phncdn.com/videos/201611/18/96538231/original/(m=eaf8Ggaaaa)(mh=ZfwIOQ4yTo__Xb0L)10.jpg');
  array_push($tetteArray, 'https://i.pinimg.com/originals/52/54/d8/5254d80385fabe399e635261b74e4a2c.jpg');
  array_push($tetteArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1tHbcVf_aVuMSDxoUg1ALQqqoK_FP9SQUuiZtVY8Q02lz1Roaqg');
  $min=1;
  $max=50;
  $randomNumber = rand($min, $max);
  
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
    ; //$response = imagesearch($searchKey, true);
  else
    $response = $tetteArray[$randomNumber];
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
  $milfArray = array(1 => 'sexy hot cougar posing');
  array_push($milfArray, 'topless sexy cougar');
  array_push($milfArray, 'hot cougar model posing');
  array_push($milfArray, 'esperanza gomez posing');
  array_push($milfArray, 'raylene sexy posing');
  array_push($milfArray, 'austin kincaid sexy');
  array_push($milfArray, 'angelina valentine sexy');
  array_push($milfArray, 'angelica raven sexy');
  $min=1;
  $max=12;
  $randomNumber = rand($min, $max);
  $searchKey = $milfArray[$randomNumber];

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

// ZIZZANIA
else if(strpos($text, 'zizzania') !== false)
{
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
    $randomNumber = rand($min, $max);
    $user1 = $usersCopy[$randomNumber];
    if (($key = array_search($user1, $usersCopy)) !== false)
      unset($usersCopy[$key]);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    $randomNumber = rand($min, $max);
    $user2 = $usersCopy[$randomNumber];
    
    $zizzania01 = $user1 . ' ha detto al Bek che ' . $user2 . ' ha fatto un gruppo segreto di Whatsapp senza di lui';
    $zizzania02 = $user1 . ' mi ha detto che a ' . $user2 . ' gli puzza il pisello da distante 2 metri';
    $zizzania03 = $user1 . ' va in giro a dire che ' . $user2 . ' va a transoni';
    $zizzania04 = $user1 . ' mi ha detto che a ' . $user2 . ' piace rasare le palle ai negri';
    $zizzania05 = $user1 . ' dice in giro che ' . $user2 . ' ne prende in culo due alla volta';
    $zizzania06 = $user1 . ' va in giro a dire che ' . $user2 . ' va a transoni';
    $zizzania07 = $user1 . ' tira le loffe e da la colpa a ' . $user2;
    $zizzania08 = $user1 . ' mi dice sempre che a ' . $user2 . ' piace il cazzo';
    $min=1;
    $max=8;
    $randomNumber = rand($min, $max);
    
    if($randomNumber == 1)
      $response = $zizzania01;
    else if($randomNumber == 2)
      $response = $zizzania02;
    else if($randomNumber == 3)
      $response = $zizzania03;
    else if($randomNumber == 4)
      $response = $zizzania04;
    else if($randomNumber == 5)
      $response = $zizzania05;
    else if($randomNumber == 6)
      $response = $zizzania06;
    else if($randomNumber == 7)
      $response = $zizzania07;
    else if($randomNumber == 8)
      $response = $zizzania08;
  }
}

// SEGRETO
else if(strpos($text, 'segreto') !== false)
{
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
    $randomNumber = rand($min, $max);
    $user1 = $usersCopy[$randomNumber];
    if (($key = array_search($user1, $usersCopy)) !== false)
      unset($usersCopy[$key]);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    $randomNumber = rand($min, $max);
    $user2 = $usersCopy[$randomNumber];
    
    $segreto01 = $user1 . ' vuole portare ' . $user2 . ' alle terme per scopare in acqua';
    $segreto02 = 'a ' . $user1 . ' piacerebbe leccare i piedi di ' . $user2;
    $segreto03 = $user1 . ' ha una malsana ossessione per i capezzoli di ' . $user2;
    $segreto04 = $user1 . ' ha rubato un paio di mutande usate di ' . $user2 . ' per annusarsele';
    $segreto05 = $user1 . ' vorrebbe andare al pride village con ' . $user2;
    $segreto06 = 'a ' . $user1 . ' piace l\'odore delle scoregge di ' . $user2;
    $segreto07 = $user1 . ' vorrebbe essere frustato da ' . $user2;
    $segreto08 = 'a ' . $user1 . ' piacerebbe essere posseduto da ' . $user2;
    $min=1;
    $max=8;
    $randomNumber = rand($min, $max);
    
    if($randomNumber == 1)
      $response = $segreto01;
    else if($randomNumber == 2)
      $response = $segreto02;
    else if($randomNumber == 3)
      $response = $segreto03;
    else if($randomNumber == 4)
      $response = $segreto04;
    else if($randomNumber == 5)
      $response = $segreto05;
    else if($randomNumber == 6)
      $response = $segreto06;
    else if($randomNumber == 7)
      $response = $segreto07;
    else if($randomNumber == 8)
      $response = $segreto08;
  }
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

// METEO
else if(strpos($text, 'meteo') !== false || 
        strpos($text, 'che tempo fa') !== false)
{
    $response = 'https://www.ilmeteo.it/meteo/Verona';
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

