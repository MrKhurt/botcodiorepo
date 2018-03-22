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
$file = 'users.txt';
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
      file_put_contents('users.txt', $value . ',' , FILE_APPEND | LOCK_EX);
      //fwrite('./users.txt', $value . ',');
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
}

// NONDEFINIZIONE
else if(substr($text, 0, 15) === 'nondefinizione ')
{
  $vocabolo = str_replace('nondefinizione ', '', $text);
  $vocabolo = str_replace(' ', '_', $vocabolo);
  $response = 'http://nonciclopedia.wikia.com/wiki/' . ucfirst($vocabolo);
}

// DEFINIZIONE
else if(substr($text, 0, 12) === 'definizione ')
{
  $vocabolo = str_replace('definizione ', '', $text);
  $vocabolo = str_replace(' ', '', $vocabolo);
  $response = 'http://dizionari.corriere.it/dizionario_italiano/' . strtoupper($vocabolo[0]) . '/' . $vocabolo . '.shtml';
}

// PREZZO
else if(substr($text, 0, 7) === 'prezzo ')
{
  $vocabolo = str_replace('prezzo ', '', $text);
  $vocabolo = str_replace(' ', '+', $vocabolo);
  $response = 'https://www.google.it/search?q=' . $vocabolo . '&safe=off&dcr=0&source=lnms&tbm=shop&sa=X&ved=0ahUKEwjyj5flpfvZAhWM7xQKHatMCnoQ_AUICygC&biw=1352&bih=708';
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
}

// CULO
else if(strpos($text, 'culo') !== false)
{
  $culoArray = array(1 => 'https://i.pinimg.com/736x/df/91/34/df9134279f5a17c71e72df746d9e10ed.jpg');
  array_push($culoArray, 'http://media11.break.com/dnet/media/208/760/2760208/remy-lacroix-in-booty-shorts-thumb.jpg');
  array_push($culoArray, 'http://www.imagesyoulike.com/images/j/32x24/j1113.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/5a/f7/23/5af723ad351653dc39226587a9dc915e.jpg');
  array_push($culoArray, 'https://www.walldevil.com/wallpapers/u11/hot--sexy--ass--woman--girl.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/80/78/51/80785173dd055bd5261cd14f0b6236c5.jpg');
  array_push($culoArray, 'http://www.imagesyoulike.com/images/j/32x24/j1462.jpg');
  array_push($culoArray, 'https://static.bikehub.co.za/uploads/monthly_09_2015/post-36275-0-33502700-1441365641.jpg');
  array_push($culoArray, 'https://pbs.twimg.com/media/BkWEZHUCAAAVINW.jpg:large');
  array_push($culoArray, 'http://picture-cdn.wheretoget.it/oe1ckd-l-610x610-shorts-claudiatihan-hot-sexy-black-ass.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/84/c0/35/84c035524a2e6657ed7cb062cafd081b.jpg');
  array_push($culoArray, 'http://therynoshorn.com/wp-content/uploads/2012/08/HumpDay-great-butt-sexy-girl-so-hot-4.jpg');
  array_push($culoArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJYGPNn-8wcu_mvtEsdr2Pqeky-i3opoKlyn0jDhbQNk3S3gRy');
  array_push($culoArray, 'https://pbs.twimg.com/profile_images/762787767499751424/W_WBnsOx.jpg');
  array_push($culoArray, 'https://i.pinimg.com/564x/ee/cd/a1/eecda1a277c9db940fb7f4ac4c2edd56--ireland-baldwin-rear-view.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/db/d3/2d/dbd32dc15798d5238b118720c3df5835.jpg');
  array_push($culoArray, 'https://i.pinimg.com/736x/58/fb/62/58fb6214c4b3bb00764b1cce05e5db63--sporty-girls-sexy-girls.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/0d/00/e8/0d00e882d3aad9c536f70ed53193f5dd.jpg');
  array_push($culoArray, 'https://s3.envato.com/files/191224816/preview.jpg');
  array_push($culoArray, 'https://pbs.twimg.com/media/By8olSxIEAEHfK7.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/ba/3b/36/ba3b3642506656f0b3ac99870a70a61d.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/d1/e3/6c/d1e36c2d1693b5cf87b0fa189c143d85.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/60/4a/5a/604a5a0499068947c9565a62b56c9796.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/d6/24/8f/d6248f81a9ccfd1186d192e1b628f652.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/e1/79/da/e179dae7daa0388cd4f9cfbac32113e1.jpg');
  array_push($culoArray, 'https://images-cdn.9gag.com/photo/aERLWxG_700b.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/56/a6/f3/56a6f319de3c05691029efdfa048ab58.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/54/f1/3f/54f13fa1b658b702ae00e9d8127c2045.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/09/ea/5e/09ea5ed6e9e043a320b545182c91dbc3.jpg');
  array_push($culoArray, 'https://tepegaste.com/wp-content/uploads/2016/09/13725739_1736801579915953_241351714_n.jpg');
  array_push($culoArray, 'https://i.ebayimg.com/images/g/ZWsAAOSw1DtXKfsc/s-l300.jpg');
  array_push($culoArray, 'https://www.dhresource.com/0x0s/f2-albu-g1-M00-92-60-rBVaGFT3GDuAYCd_AAEdpPGY4Ng225.jpg/24x35inch-the-temptation-ass-poster-hd-home.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/2a/75/df/2a75df26b15796884df4b942a8a2eccb.jpg');
  array_push($culoArray, 'https://i.pinimg.com/736x/eb/4c/77/eb4c77e58f281ddd7b96768002358e8c--sexy-women-sexy-girls.jpg');
  array_push($culoArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz_V4EtV8-e6FwMoACJndzrqxMNYgDwqSd-uCqVc7pBAtr_dIa');
  array_push($culoArray, 'https://i.pinimg.com/originals/41/bc/a1/41bca1807e91c6c4a24860d70347b229.jpg');
  array_push($culoArray, 'https://c.wallhere.com/photos/69/dd/women_model_ass_blonde_women_outdoors_black_panties_thong_black_tops-303094.jpg!d');
  array_push($culoArray, 'https://i.pinimg.com/originals/1f/6b/d9/1f6bd9f20326bbd6843e48140cc8a110.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/0e/cf/3d/0ecf3d1eac92024e8a2679022d21d124.jpg');
  array_push($culoArray, 'https://c.wallhere.com/photos/da/62/women_model_Tianna_Gregory_back_bikini_ass_swimming_pool_women_outdoors-319701.jpg!d');
  array_push($culoArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkz2JcFAYfxv0ZwfrPvv_5u19BAY2slHG5SUjahgxvSP0owe0qBQ');
  array_push($culoArray, 'https://www.zupimages.net/up/16/01/yi28.jpg');
  array_push($culoArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3VQeiSnjqRYuvyeAMYMKnza_XbaUuHYTSFLDdF-sKejSqSA_BKg');
  array_push($culoArray, 'http://i.imgur.com/ZYxworT.png');
  array_push($culoArray, 'https://i.pinimg.com/originals/bc/0d/86/bc0d86fedf0c3d234b24addfa7ed904d.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/e8/bb/5d/e8bb5d4da7b5aa669c07902681c954f2.jpg');
  array_push($culoArray, 'http://skywaynews.net/wp-content/uploads/2016/01/sexy-babes-yoga-pants-19-2.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/c9/4b/f5/c94bf52eaca8a8c65689ccbead8f54be.jpg');
  array_push($culoArray, 'https://i.pinimg.com/originals/fa/cc/bd/faccbdae19a197980cf5cf7fb30a8240.jpg');
  array_push($culoArray, 'https://thechive.files.wordpress.com/2017/05/8d21e481a039c81e6fda68394d79cb46.jpg?quality=85&strip=info&w=600');
  
  $culoGIFArray = array(1 => 'https://media.giphy.com/media/11PTws6DP5t2Kc/giphy.gif');
  array_push($culoGIFArray, 'https://media.giphy.com/media/On0SVGCQGnj3i/giphy.gif');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMMmuydwnBEDY-qyNgFLNMLVUgky83AhjkBehwjQe5fmz6-GrKPA');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvcdK5IIC0lNEjuDi99No1m2_QC507x-RI7zCD-yO1ddTyn-V_-Q');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRYCkZImVla8AlIy_i9c_9hIXU0GGVlK8HLGN3y5BKbGp16kPs3A');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4GuuUkZQdQhbRE2p_Sct8CAo-reJZomNZYC8DjrA0bWyVjKHL');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTphrU23-8FSG0G8FPn9JhAgqiC8Z7_bTh-YvLjmWqvOdAgnRcuFg');
  array_push($culoGIFArray, 'http://www.lowbird.com/data/images/2009/12/selena-schoolgirl.gif');
  array_push($culoGIFArray, 'https://images.contentful.com/ogz4nxetbde6/2AhpyOGZKU2Oi882ekAiMo/0f0a7485b342568af5ac33abccbae01d/16_girls_boobs_butts.gif?w=600&fit=scale');
  array_push($culoGIFArray, 'https://media.giphy.com/media/qiGRxIgHhOzCw/giphy.gif');
  array_push($culoGIFArray, 'http://juicygif.com/albums/userpics/2015y/10/17/4/1/3526-white-stockings.gif');
  array_push($culoGIFArray, 'http://68.media.tumblr.com/321e75880b948b9d9ae3553c9378fcbd/tumblr_ntq4mtrdy61u5aupto1_500.gif');
  array_push($culoGIFArray, 'http://hotcelebrities-vk.com/images/MODELS/GIFs/Asses/Asses-2/ass-shake.gif');
  array_push($culoGIFArray, 'https://elrecavorfabron.files.wordpress.com/2011/07/calzon-chino.gif');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFKPErHs5ESnOqA1kOCpC2BD3ZDVWVPqLnHihyN5uqpxGHUFI_qg');
  array_push($culoGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcGX4oAQ-1C5tXfSgdEvvbtfhsxGY2X1tsB0bAyYLE2Ken7lEzSw');
  array_push($culoGIFArray, 'https://steamusercontent-a.akamaihd.net/ugc/859475009946183029/13A897980FC7EC7B1B200F934DB04A0035FED4C2/');
  array_push($culoGIFArray, 'https://steamusercontent-a.akamaihd.net/ugc/45379514988025659/DCC3578AE173FF73140AB5E76601649D10A05B17/');
  array_push($culoGIFArray, 'https://m.popkey.co/1bb27d/A6Gby_s-200x150.gif');
  array_push($culoGIFArray, 'https://i.pinimg.com/originals/1f/53/be/1f53be27affcd8b673af8535d6b297ce.gif');
  array_push($culoGIFArray, 'https://i.pinimg.com/originals/10/96/bd/1096bd1c681a8210387dbe7e5cced1bc.jpg');
  array_push($culoGIFArray, 'https://i1.kwejk.pl/k/obrazki/2011/11/aa9f4779a7495dc63eb9d6af381f4abd.gif');
  array_push($culoGIFArray, 'https://media.giphy.com/media/nZvxbksUffPUI/source.gif');
  array_push($culoGIFArray, 'https://media.giphy.com/media/Qgt2KUHFkhRAs/giphy.gif');
  array_push($culoGIFArray, 'https://i.pinimg.com/originals/e0/7e/cf/e07ecf7f6168cead1f0a1499041eaed2.gif');
  array_push($culoGIFArray, 'http://iv1.lisimg.com/image/14773249/400full-galina-dubenenko.jpg');
  array_push($culoGIFArray, 'https://78.media.tumblr.com/e127b1baca88e21be052e74264bfc288/tumblr_nll2fyhg0Y1u1o5cfo1_500.gif');
  array_push($culoGIFArray, 'http://www.letstalkabout.co.uk/wp-content/uploads/2014/03/sexy-ass-shake.gif');
  array_push($culoGIFArray, 'https://i.pinimg.com/originals/42/aa/de/42aade5d0a0269274712062247505720.gif');
  array_push($culoGIFArray, 'https://steamusercontent-a.akamaihd.net/ugc/261588346130453038/C05AB61CF3D1CFAD7BB889A0A9E1E4AC15011A44/');
  array_push($culoGIFArray, 'http://www.bravogif.com/wp-content/uploads/2014/09/20140928-sexy-ass-shakes-back-pants.gif');
  array_push($culoGIFArray, 'https://78.media.tumblr.com/f47e31bb208c6c337ecfad8998355e26/tumblr_no6k0gRs1H1r426i4o2_400.gif');
  array_push($culoGIFArray, 'http://3.bp.blogspot.com/-sBgX-_QTOKI/UqmZ7Z55cNI/AAAAAAAAqvU/mj_2FWqld_c/s1600/bunda+malha.gif');
  array_push($culoGIFArray, 'http://images4.hiboox.com/images/4708/b3b167b621e3c0625fed2b0b44c22cdb.gif');
  array_push($culoGIFArray, 'https://media.giphy.com/media/x4eeiMJGrAgtG/giphy.gif');
  array_push($culoGIFArray, 'https://cs.pikabu.ru/post_img/2013/12/08/11/1386528781_1474389051.gif');
  array_push($culoGIFArray, 'https://galeri12.uludagsozluk.com/500/puding-gotlu-kizlar_988212.gif');
  array_push($culoGIFArray, 'https://media.giphy.com/media/GXYU4sye1ztwk/giphy.gif');
  array_push($culoGIFArray, 'https://steamusercontent-a.akamaihd.net/ugc/856103543875325447/6254429AF60E58318EE9AC9592933EB34AB794FA/');
  array_push($culoGIFArray, 'https://i.imgur.com/ti0h0A9.gif');
  array_push($culoGIFArray, 'http://www.retecool.com/wp-content/uploads/2015/01/dat-ass-gif.gif');
  array_push($culoGIFArray, 'http://oi58.tinypic.com/2njhidy.jpg');
  array_push($culoGIFArray, 'http://img1.reactor.cc/pics/post/%D0%B3%D0%B8%D1%84%D0%BA%D0%B8-%D0%AD%D1%80%D0%BE%D1%82%D0%B8%D0%BA%D0%B0-%D0%BF%D0%B5%D1%81%D0%BE%D1%87%D0%BD%D0%B8%D1%86%D0%B0-%D1%8D%D1%80%D0%BE%D1%82%D0%B8%D0%BA%D0%B8-%D0%BF%D0%BE%D0%BF%D0%BA%D0%B0-3042373.gif');
  array_push($culoGIFArray, 'https://choualbox.com/Img/138879369427.gif');
  array_push($culoGIFArray, 'http://78.media.tumblr.com/tumblr_me7ey83T6P1rvcputo1_1280.gif');
  array_push($culoGIFArray, 'https://vader.joemonster.org/upload/rba/16484947248a4d5Postrzepione_.gif');
  array_push($culoGIFArray, 'https://steamusercontent-a.akamaihd.net/ugc/264973755071179763/EDCE18FF7C78F105F4214A9D286274AF07282EAE/');
  array_push($culoGIFArray, 'https://angrygif.com/wp-content/uploads/2017/02/tumblr_oenhgoA85y1vohst2o1_400.gif');
  array_push($culoGIFArray, 'https://images.sex.com/images/pinporn/2015/10/15/300/14048102.gif');
  array_push($culoGIFArray, 'https://j.gifs.com/yN4dGa.gif');
  $min=1;
  $max=50;
  srand(microtime());
  $randomNumber = rand($min, $max);
  //shuffle the array
  shuffle($culoArray);
  $searchKey = $culoArray[$randomNumber];
  
  // devo cercare una gif?
  if(strpos($text, 'gif') !== false)
    $response = $culoGIFArray[$randomNumber];
  else
    $response = $culoArray[$randomNumber];
}

// FIGA
else if(strpos($text, 'figa') !== false || 
   strpos($text, 'fica') !== false || 
   strpos($text, 'gnocca') !== false || 
   strpos($text, 'gnagna') !== false ||
   strpos($text, 'zozzerellona') !== false || 
   strpos($text, 'zozza') !== false)
{
  $figaArray = array(1 => 'https://i.pinimg.com/originals/df/79/7b/df797b5fe21cc62ab75584cb4180b24d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/58/b6/8a/58b68a789ef7ce0347431c4bc91973b1.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/c0/d1/75/c0d1751c48968094807d933c604c7129.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/2b/26/eb/2b26ebf9f6fd6f035f34bb2d929f8b45.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/15/86/fc/1586fcacf7f47e1e4aa3be9e3ded3582.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/f8/fd/4d/f8fd4dfef36c6373073ebf132a102892.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/ee/35/03/ee3503f72f07ff19e1f8ec135eee5577.jpg');
  array_push($figaArray, 'http://cdn-so.fantasti.cc/big/b/i/s/bisexualguy/bisexualguy_4ad8b8.jpg');
  array_push($figaArray, 'http://cdn-so.fantasti.cc/big/b/i/s/bisexualguy/bisexualguy_852f68.jpg');
  array_push($figaArray, 'http://www.independentescortsdelhi.in/wp-content/uploads/2017/10/Best-Sexy-Call-Girls-in-New-Delhi.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/9c/5d/4b/9c5d4b2c7acc17f9281236c2110d8af0.jpg');
  array_push($figaArray, 'https://i.pinimg.com/564x/95/46/d5/9546d5291ed2af9ba93eb9214d107885.jpg');
  array_push($figaArray, 'https://www.thesun.co.uk/wp-content/uploads/2016/11/nintchdbpict000228620832.jpg?w=640&strip=all');
  array_push($figaArray, 'https://i.pinimg.com/originals/b8/77/f0/b877f0ca3c9cbd58828d6d62acce87f7.jpg');
  array_push($figaArray, 'http://us.cdn291.fansshare.com/pictures/jennifernguyen/hot-1426363621.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/47/ea/b6/47eab6eb7dc0ab21c205f4179cfc279d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/56/bd/b5/56bdb5bee9f6f1eafe3d7395298f1737.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/e8/f8/45/e8f845aca9291f110e7b1f0e10a52f6d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/36/f8/e7/36f8e7f3e36d4a5ad4b922681357c89b.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/fb/a3/03/fba3037e4d2a2ab0e221b7b1f560a844.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/53/71/5c/53715cf8318a077ff018683373e3bb4d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/d9/e3/47/d9e347bc987b7053330ae28ab32a599e.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/98/ac/d3/98acd34b5a7a7476532348ed2c13aed4.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/c0/ee/9f/c0ee9f9abe2465796e82f5abd5da9f61--white-lingerie-sexy-lingerie.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/a1/46/3c/a1463c2b1a96f6eef4c68e1e27bec7cd.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/c7/e3/2b/c7e32b796fb0b94b0e1984ff032ed1df.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/75/d7/39/75d739ff770b6a618ea329b9cd6a0395--sexy-women-sexy-girls.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/6d/80/d1/6d80d17f9f86ecd9ad313f888c52c463.png');
  array_push($figaArray, 'https://i.pinimg.com/originals/7d/7b/3e/7d7b3ef786f7f11b62a941d7846d568d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/4d/2b/7a/4d2b7a03dc7fae0794fe574d57faa042.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/a1/db/34/a1db345e2e74799210b3aaadd646c42f.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/f9/20/5f/f9205f60dc5736a7a80638c81d9470f2.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/76/d4/6d/76d46d872b46de21cbf6c975fbde071b--stunning-girls-beautiful-women.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/40/44/a0/4044a047689beef97513c566950b99c4.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/6f/01/dd/6f01dd8573b4fafba0402161e7cbfbcc--stunning-girls-gorgeous-women.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/13/99/d1/1399d13d1eb36cf7d40308ef0df8c1c3--fitness-women-female-fitness.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/2f/c1/24/2fc12468451ed14d01847b4adfc58d79.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/0b/d8/8c/0bd88c6ca5c9b8c7d356568e68ae14ea.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/b3/13/36/b313364fc38d77ef96cc2a084a92d380.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/94/72/77/94727753bcd3ba855b816a4b1abb2f3b.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/34/02/4c/34024c8967ba0eb460a42e72e354d7b4.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/50/40/d8/5040d86a6de343a305a07b7ae152db0e.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/cd/27/2e/cd272e598e2113a0a9c7ee1e3732a15b.jpg');
  array_push($figaArray, 'http://img.izismile.com/img/img5/20120919/640/kitchen_hotties_galore_640_04.jpg');
  array_push($figaArray, 'https://content4.morazzia.com/playboyplus.com/8479/09.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/23/c3/ba/23c3baeb4fdfa5130e89256d1b7e55ee--long-black-goddesses.jpg');
  array_push($figaArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTI4xw3I8fAzQlotCk-dNLsd0uoK1P3iO9RnpAimCX9smrxnELOA');
  array_push($figaArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu2rRyMyMYPDkAXGNd1lCVmEXjjqvI5SrBxKnj1_DZqPOIh-6DQw');
  array_push($figaArray, 'http://eugeniadiordiychuk.com/static/image/2012/02/18/jenya-d-cover-leonardo-eugenia-diordiychuk-metart-01.jpg');
  array_push($figaArray, 'http://redbust.com/wp-content/uploads/sadie_jones6/sadie_jones_09.jpg');
  
  $figaGIFArray = array(1 => 'https://media.giphy.com/media/Ef5fzYwvSITkI/giphy.gif');
  array_push($figaGIFArray, 'http://content.fhm.com/i/media/2015/05/meg.gif');
  array_push($figaGIFArray, 'https://media.tits-guru.com/images?uuid=bcf26658-aa47-4176-879c-49025a2656a9');
  array_push($figaGIFArray, 'https://media.tits-guru.com/images?uuid=0d19e0e8-597f-44f9-ae7b-cefa4845aa04');
  array_push($figaGIFArray, 'http://thrillblender.com/wp-content/uploads/2017/11/Demi-Rose-Hottest-Photos-Sexy-Near-Nude-Pictures-Videos-2.gif');
  array_push($figaGIFArray, 'https://www.snbabes.com/wp-content/uploads/2017/07/sexy-ass.gif');
  array_push($figaGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-Ayh33cgSDNJ6rsQFLUkQGcB354J6KuAPBB-T_vNer1DfwJ7A');
  array_push($figaGIFArray, 'http://hotnakedgirls.eu/wp-content/uploads/2016/11/tumblr_o4vjbjCVbN1utro3vo1_400.gif');
  array_push($figaGIFArray, 'https://i.pinimg.com/originals/62/58/30/625830bc415de84f20fda1d78d7fcabd.gif');
  array_push($figaGIFArray, 'http://img0.joyreactor.cc/pics/post/%D0%AD%D1%80%D0%BE%D1%82%D0%B8%D0%BA%D0%B0-%D1%8D%D1%80%D0%BE%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B5-%D0%B3%D0%B8%D1%84%D0%BA%D0%B8-%D0%B1%D0%BE%D0%BB%D1%8C%D1%88%D0%B0%D1%8F-%D0%B3%D1%80%D1%83%D0%B4%D1%8C-%D0%A1%D0%B8%D1%81%D1%8C%D0%BA%D0%B8-3523662.gif');
  array_push($figaGIFArray, 'https://pagez.com/attachments/175/article/20282/883f02a0ab947f0ca4dd7b4be1a61c86.gif');
  array_push($figaGIFArray, 'https://i.pinimg.com/originals/f2/ed/c6/f2edc6e365553cf8c51825e3b2e2fc9e.gif');
  array_push($figaGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaRXqJbl_Mpi0UfmfJS_0R5XzMe_ptZlypIA9Z6E4G4Owb4v6Zpw');
  array_push($figaGIFArray, 'http://king-mag.com/files/2015/03/Melanie-Iglesias-5.gif?w=980&q=75');
  array_push($figaGIFArray, 'http://78.media.tumblr.com/tumblr_lp3070j5UF1qzexq3o1_500.gif');
  array_push($figaGIFArray, 'http://king-mag.com/files/2015/03/Melanie-Iglesias-4.gif');
  array_push($figaGIFArray, 'http://geekshizzle.com/wp-content/uploads/2018/01/Sexy-Gal-Gadot-Wonder-Woman-GIF-2.gif');
  array_push($figaGIFArray, 'https://www.onviews.com/wp-content/uploads/2017/11/Hot-GIF-6.gif');
  array_push($figaGIFArray, 'http://i.perezhilton.com/wp-content/uploads/2015/10/giphy.gif');
  array_push($figaGIFArray, 'https://media.giphy.com/media/3cK6vD1VGAef6/giphy.gif');
  array_push($figaGIFArray, 'https://lh3.googleusercontent.com/-kas41oxqOxg/T3NcMGohcZI/AAAAAAAAYmQ/9zE8X_wFHBw/w426-h373/%255D%2B%25281%2529.gif');
  array_push($figaGIFArray, 'http://i2.wp.com/geekshizzle.com/wp-content/uploads/2016/01/Sexy-Megan-Fox-GIF-10.gif?resize=500%2C419');
  array_push($figaGIFArray, 'https://images.apester.com/user-images%2F2b%2F2be1edd82193e47c4bed258d5d622316.gif/undefined/undefined/undefined');
  array_push($figaGIFArray, 'https://i.pinimg.com/originals/62/c0/a3/62c0a3c4aecbc5f6c978a91b0293c0fc.gif');
  array_push($figaGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0EBedJ-UNoUpfQXbolr8RrvRdEW1ow5PWmRortLerIl-_CbeM3w');
  array_push($figaGIFArray, 'http://www.gifsfor.com/uploads/2013/08/01/Shay-Laren-big-jigglin-tits.gif');
  array_push($figaGIFArray, 'http://www.pbh2.com/wordpress/wp-content/uploads/2014/08/emily-ratajkowski-black-and-white.gif');
  array_push($figaGIFArray, 'http://storytellingthroughstyle.com/wp-content/uploads/2017/05/567275cbf31c00c2d6b76d0d7837521a.gif');
  array_push($figaGIFArray, 'https://media1.giphy.com/media/3o6Yg2TN9E59G9vSxi/giphy.gif');
  array_push($figaGIFArray, 'https://media.giphy.com/media/HDVXxuES4HJle/giphy.gif');
  array_push($figaGIFArray, 'http://cdn.resharelist.com/media/hot-jordan-carver-gifs-068.gif');
  array_push($figaGIFArray, 'https://media.giphy.com/media/PNqLGK0gzYSo8/giphy.gif');
  array_push($figaGIFArray, 'https://media.giphy.com/media/WU6cxejWAhQZO/giphy.gif');
  array_push($figaGIFArray, 'https://media.giphy.com/media/3o85xrw04o4rXzNyPm/giphy.gif');
  array_push($figaGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvGaxusuJhyjfSn2SUdZl4Vohx2LghuVMxsD2lXEtmF2StlzuBUg');
  array_push($figaGIFArray, 'https://saucemonsters.com/wp-content/uploads/2017/06/Alyssa-Arce-07.gif');
  array_push($figaGIFArray, 'http://78.media.tumblr.com/22f92d8b9bfbb8bf3a8aae5de815b4ed/tumblr_n0pcr3Z6Dw1rk74v1o1_400.gif');
  array_push($figaGIFArray, 'https://citysubwaycreatures.files.wordpress.com/2014/05/8uk0l.gif');
  array_push($figaGIFArray, 'https://everipedia-storage.s3-accelerate.amazonaws.com/ProfilePics/6666639105327455388_100x100.gif');
  array_push($figaGIFArray, 'https://i.pinimg.com/originals/98/2c/aa/982caa10ceba979d077a7331c3f07795.gif');
  array_push($figaGIFArray, 'http://78.media.tumblr.com/3d8fb562132ce8c234757148dfc2d89a/tumblr_n2g9rsb1cX1qaoeoqo4_r1_400.gif');
  array_push($figaGIFArray, 'https://i.imgur.com/EYUsoSQ.gif');
  array_push($figaGIFArray, 'https://images.sex.com/images/pinporn/2016/09/06/300/16499906.gif');
  array_push($figaGIFArray, 'http://78.media.tumblr.com/bc13d6ec075b5e8a4db53db9e21e794e/tumblr_nv0t2qkLbn1sjkhlho7_500.gif');
  array_push($figaGIFArray, 'https://cdn0.kontraband.com/uploads/image/2016/12/07/17/07e411fe-edf0-453e-97f4-6996d77c6b35.gif');
  array_push($figaGIFArray, 'http://78.media.tumblr.com/f7d386d84b103bff1be49826581dca5c/tumblr_nkhe59XlVi1u2602to1_500.gif');
  array_push($figaGIFArray, 'http://68.media.tumblr.com/aba0d95d79949339a12eaf393736ff15/tumblr_nql0istuZQ1r083kuo1_400.gif');
  array_push($figaGIFArray, 'https://choualbox.com/Img/20110921155608A.gif');
  array_push($figaGIFArray, 'http://list.lisimg.com/image/8554738/500full.jpg');
  array_push($figaGIFArray, 'https://lh3.googleusercontent.com/-zj0thQQ3LQE/U800Fz9ZJXI/AAAAAAAAMIQ/QXHDEszqU1A/w530-h299-n/ShelbyChesnes.gif');
  $min=1;
  $max=50;
  srand(microtime());
  $randomNumber = rand($min, $max);
  //shuffle the array
  shuffle($figaArray);
  shuffle($figaGIFArray);
  
  // devo cercare una gif?
  if(strpos($text, 'gif') !== false)
    $response = $figaGIFArray[$randomNumber];
  else
    $response = $figaArray[$randomNumber];
}

// BUONGIORNO
else if(strpos($text, 'buongiorno') !== false)
{
  $figaArray = array(1 => 'https://i.pinimg.com/originals/df/79/7b/df797b5fe21cc62ab75584cb4180b24d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/58/b6/8a/58b68a789ef7ce0347431c4bc91973b1.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/c0/d1/75/c0d1751c48968094807d933c604c7129.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/2b/26/eb/2b26ebf9f6fd6f035f34bb2d929f8b45.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/15/86/fc/1586fcacf7f47e1e4aa3be9e3ded3582.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/f8/fd/4d/f8fd4dfef36c6373073ebf132a102892.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/ee/35/03/ee3503f72f07ff19e1f8ec135eee5577.jpg');
  array_push($figaArray, 'http://cdn-so.fantasti.cc/big/b/i/s/bisexualguy/bisexualguy_4ad8b8.jpg');
  array_push($figaArray, 'http://cdn-so.fantasti.cc/big/b/i/s/bisexualguy/bisexualguy_852f68.jpg');
  array_push($figaArray, 'http://www.independentescortsdelhi.in/wp-content/uploads/2017/10/Best-Sexy-Call-Girls-in-New-Delhi.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/9c/5d/4b/9c5d4b2c7acc17f9281236c2110d8af0.jpg');
  array_push($figaArray, 'https://i.pinimg.com/564x/95/46/d5/9546d5291ed2af9ba93eb9214d107885.jpg');
  array_push($figaArray, 'https://www.thesun.co.uk/wp-content/uploads/2016/11/nintchdbpict000228620832.jpg?w=640&strip=all');
  array_push($figaArray, 'https://i.pinimg.com/originals/b8/77/f0/b877f0ca3c9cbd58828d6d62acce87f7.jpg');
  array_push($figaArray, 'http://us.cdn291.fansshare.com/pictures/jennifernguyen/hot-1426363621.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/47/ea/b6/47eab6eb7dc0ab21c205f4179cfc279d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/56/bd/b5/56bdb5bee9f6f1eafe3d7395298f1737.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/e8/f8/45/e8f845aca9291f110e7b1f0e10a52f6d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/36/f8/e7/36f8e7f3e36d4a5ad4b922681357c89b.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/fb/a3/03/fba3037e4d2a2ab0e221b7b1f560a844.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/53/71/5c/53715cf8318a077ff018683373e3bb4d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/d9/e3/47/d9e347bc987b7053330ae28ab32a599e.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/98/ac/d3/98acd34b5a7a7476532348ed2c13aed4.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/c0/ee/9f/c0ee9f9abe2465796e82f5abd5da9f61--white-lingerie-sexy-lingerie.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/a1/46/3c/a1463c2b1a96f6eef4c68e1e27bec7cd.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/c7/e3/2b/c7e32b796fb0b94b0e1984ff032ed1df.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/75/d7/39/75d739ff770b6a618ea329b9cd6a0395--sexy-women-sexy-girls.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/6d/80/d1/6d80d17f9f86ecd9ad313f888c52c463.png');
  array_push($figaArray, 'https://i.pinimg.com/originals/7d/7b/3e/7d7b3ef786f7f11b62a941d7846d568d.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/4d/2b/7a/4d2b7a03dc7fae0794fe574d57faa042.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/a1/db/34/a1db345e2e74799210b3aaadd646c42f.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/f9/20/5f/f9205f60dc5736a7a80638c81d9470f2.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/76/d4/6d/76d46d872b46de21cbf6c975fbde071b--stunning-girls-beautiful-women.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/40/44/a0/4044a047689beef97513c566950b99c4.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/6f/01/dd/6f01dd8573b4fafba0402161e7cbfbcc--stunning-girls-gorgeous-women.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/13/99/d1/1399d13d1eb36cf7d40308ef0df8c1c3--fitness-women-female-fitness.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/2f/c1/24/2fc12468451ed14d01847b4adfc58d79.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/0b/d8/8c/0bd88c6ca5c9b8c7d356568e68ae14ea.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/b3/13/36/b313364fc38d77ef96cc2a084a92d380.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/94/72/77/94727753bcd3ba855b816a4b1abb2f3b.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/34/02/4c/34024c8967ba0eb460a42e72e354d7b4.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/50/40/d8/5040d86a6de343a305a07b7ae152db0e.jpg');
  array_push($figaArray, 'https://i.pinimg.com/originals/cd/27/2e/cd272e598e2113a0a9c7ee1e3732a15b.jpg');
  array_push($figaArray, 'http://img.izismile.com/img/img5/20120919/640/kitchen_hotties_galore_640_04.jpg');
  array_push($figaArray, 'https://content4.morazzia.com/playboyplus.com/8479/09.jpg');
  array_push($figaArray, 'https://i.pinimg.com/736x/23/c3/ba/23c3baeb4fdfa5130e89256d1b7e55ee--long-black-goddesses.jpg');
  array_push($figaArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTI4xw3I8fAzQlotCk-dNLsd0uoK1P3iO9RnpAimCX9smrxnELOA');
  array_push($figaArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu2rRyMyMYPDkAXGNd1lCVmEXjjqvI5SrBxKnj1_DZqPOIh-6DQw');
  array_push($figaArray, 'http://eugeniadiordiychuk.com/static/image/2012/02/18/jenya-d-cover-leonardo-eugenia-diordiychuk-metart-01.jpg');
  array_push($figaArray, 'http://redbust.com/wp-content/uploads/sadie_jones6/sadie_jones_09.jpg');
  $min=1;
  $max=50;
  srand(mktime(0, 0, 0));
  $randomNumber = rand($min, $max); 
  $response = $figaArray[$randomNumber];
  
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
  
  $tetteGIFArray = array(1 => 'http://www.gifsfor.com/uploads/2014/11/Gifs-for-Tumblr-1444.gif');
  array_push($tetteGIFArray, 'http://scene-porn.com/wp-content/uploads/2010/07/Nude-hot-emo-girl.gif');
  array_push($tetteGIFArray, 'http://www.hugetitsgif.com/wp-content/uploads/2017/04/tumblr_nl1dd5kj1k1tj0ia8o1_500.gif');
  array_push($tetteGIFArray, 'http://78.media.tumblr.com/e517aea9af2001234007e49573bc8645/tumblr_nk2qummCw31u53hc4o1_1280.gif');
  array_push($tetteGIFArray, 'http://pornpictures.xxx/wp-content/uploads/2016/03/tits-gif-hot-nude-teen-girl-1456901756c8lp4.gif');
  array_push($tetteGIFArray, 'http://cdn4.images.motherlessmedia.com/images/D27E6DF.gif?fs=opencloud');
  array_push($tetteGIFArray, 'http://gfpics.com/wp-content/uploads/4-54.gif');
  array_push($tetteGIFArray, 'https://media.tits-guru.com/images?uuid=3f0e3423-3c3b-4131-96af-5575c01b65d4');
  array_push($tetteGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNikUmFE5SENuNUO7J2F8UXNDcTTpbZCDtq1eq65EF90FdG9pJAg');
  array_push($tetteGIFArray, 'http://i2.xxgifs.com/galleries/2015/03/27/big/47334-hot-amateur-bouncing-tits.gif');
  array_push($tetteGIFArray, 'https://files.shroomery.org/files/16-34/233356419-7624-hot-girl-flashing-boobs-in-a-parking-lot.gif');
  array_push($tetteGIFArray, 'https://im-01.gifer.com/55.gif');
  array_push($tetteGIFArray, 'http://www.sexvideogif.com/wp-content/uploads/2013/07/09/sexy-girl-dance-nude.gif');
  array_push($tetteGIFArray, 'https://i.pinimg.com/originals/81/8a/53/818a531e542742ae07e8fe88c232eff0.gif');
  array_push($tetteGIFArray, 'https://file.publicflashing.me/2016/02/flashing-boobs-smiling-girlfriend.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2015/12/22/620/14605434.gif');
  array_push($tetteGIFArray, 'https://static-ca-cdn.eporner.com/photos/46216.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2017/05/23/300/17806815.gif');
  array_push($tetteGIFArray, 'http://tubeteencam.com/king-include/uploads/tumblr_o57j1athu51u3yq93o1_540-4563202024.gif');
  array_push($tetteGIFArray, 'https://angrygif.com/wp-content/uploads/2017/08/asian-girl-with-big-boobs.gif');
  array_push($tetteGIFArray, 'http://78.media.tumblr.com/167d638cebe2fff0217e6473043d76d3/tumblr_o4ue0dmtQC1vnock8o1_400.gif');
  array_push($tetteGIFArray, 'https://www.snbabes.com/wp-content/uploads/2017/10/Kendra-showing-her-large-tits.gif');
  array_push($tetteGIFArray, 'https://78.media.tumblr.com/419a83dd12f47d250ac56498e7c5a15b/tumblr_ozz9nbQdys1tlslo2o1_500.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2016/03/03/300/15139020.gif');
  array_push($tetteGIFArray, 'https://3.bp.blogspot.com/-nYhD1qJPOtg/VwlQDNeArvI/AAAAAAAAAVs/LNjiGXVZzzET2E8mbjN33sduikhxbtFnw/s1600/Showing%2Bher%2Bboobs.gif');
  array_push($tetteGIFArray, 'https://file.publicflashing.me/2016/02/beach-boobs-flashing-two-college-girls.gif');
  array_push($tetteGIFArray, 'http://gfpics.com/wp-content/uploads/WatchMyTits_31.gif');
  array_push($tetteGIFArray, 'http://juicygif.com/albums/userpics/2014y/08/31/13/1/7064-katie-fey-water-fun.gif');
  array_push($tetteGIFArray, 'https://78.media.tumblr.com/44620ea140156998cc4d18bc72333d1e/tumblr_o973npW28X1v4mi9vo1_1280.gif');
  array_push($tetteGIFArray, 'https://s.smutty.com/media_smutty_2/w/h/o/s/m/whosdatbabe-3vpgt-94c536.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2017/01/28/300/17283515.gif');
  array_push($tetteGIFArray, 'http://eugeniadiordiychuk.com/static/forum/1167/2014/03/13/jenya-24a.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2014/07/11/300/6888891.gif');
  array_push($tetteGIFArray, 'http://78.media.tumblr.com/7e501dc1eaeb646977e9de6573c6ecb3/tumblr_nivok9Urz91u53hc4o1_1280.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2014/08/03/300/7267497.gif');
  array_push($tetteGIFArray, 'https://78.media.tumblr.com/168d812f42bd52543e7487b5a5eaa3c4/tumblr_os0rj5QcSK1w27avio1_400.gif');
  array_push($tetteGIFArray, 'https://static-ca-cdn.eporner.com/photos/118238.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2015/02/18/620/10558157.gif');
  array_push($tetteGIFArray, 'https://78.media.tumblr.com/e1c306c7fe98fda0f142dea5d4fcfdce/tumblr_onu819bYyw1w27avio1_400.gif');
  array_push($tetteGIFArray, 'https://the-sex.me/wp-content/uploads/2013/12/B2zcNaN.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2016/09/27/300/16621316.gif');
  array_push($tetteGIFArray, 'https://i.imgur.com/PNp4S3v.gif');
  array_push($tetteGIFArray, 'https://i.pinimg.com/originals/7d/1c/51/7d1c51e4485c9fc645e9ee755c3eff4d.gif');
  array_push($tetteGIFArray, 'http://juicygif.com/albums/userpics/2016y/12/30/7/1/1975-little-caprice.gif');
  array_push($tetteGIFArray, 'https://images.sex.com/images/pinporn/2016/08/10/620/16336377.gif');
  array_push($tetteGIFArray, 'https://78.media.tumblr.com/2fb97869c9e8b29d0ce0d11daddd1fe5/tumblr_o381vbtPV41u66f05o1_400.gif');
  array_push($tetteGIFArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIooR6Sq6i3egBjIGZ2WbgHDkbzt7k7xCxU49lbooxrSzXr0Raag');
  array_push($tetteGIFArray, 'https://78.media.tumblr.com/488967b28410a360d72afd50f7e12cd7/tumblr_o3u00yKVeX1u66f05o1_500.gif');
  array_push($tetteGIFArray, 'http://juicygif.com/albums/userpics/2015y/09/13/8/1/9271-hottie-shows-her-big-boobs.gif');
  array_push($tetteGIFArray, 'http://juicygif.com/albums/userpics/2014y/06/04/13/1/small_5670-gif-with-awesome-babe-having-naturally-big-tits-and-a-perfect-pretty-face.gif');
  $min=1;
  $max=50;
  shuffle($tetteArray);
  shuffle($tetteGIFArray);
  srand(microtime());
  $randomNumber = rand($min, $max);
  
  // devo cercare una gif?
  if(strpos($text, 'gif') !== false)
    $response = $tetteGIFArray[$randomNumber];
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
  srand(microtime());
  $randomNumber = rand($min, $max);
  shuffle($milfArray);
  $searchKey = $milfArray[$randomNumber];

  // devo cercare una gif?
  if(strpos($text, 'gif') !== false)
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
  $fiorucciArray = array(1 => 'dio tubercoloso fracio');
  array_push($fiorucciArray, 'dio serpente avvelenato');
  array_push($fiorucciArray, 'madonna sta troia sta zzingara');
  array_push($fiorucciArray, 'scemo! scemo! scemo!');
  array_push($fiorucciArray, 'dio serpente bove');
  array_push($fiorucciArray, 'io te porto a Villa Candida punto, e basta!');
  array_push($fiorucciArray, 'sta stu stronzo!');
  array_push($fiorucciArray, 'noooooooddiocane!');
  array_push($fiorucciArray, '\'staccio ladro naltra volta!');
  $min=1;
  $max=9;
  srand(microtime());
  $randomNumber = rand($min, $max);
  shuffle($fiorucciArray);
  $response = $fiorucciArray[$randomNumber];
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
    srand(microtime());
    $randomNumber = rand($min, $max);
    shuffle($usersCopy);
    $user1 = $usersCopy[$randomNumber];
    if (($key = array_search($user1, $usersCopy)) !== false)
      unset($usersCopy[$key]);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    srand(microtime());
    $randomNumber = rand($min, $max);
    shuffle($usersCopy);
    $user2 = $usersCopy[$randomNumber];
    
    $zizzaniaArray = array(1 => $user1 . ' ha detto al Bek che ' . $user2 . ' ha fatto un gruppo segreto di Whatsapp senza di lui');
    array_push($zizzaniaArray, $user1 . ' mi ha detto che a ' . $user2 . ' gli puzza il pisello da distante 2 metri');
    array_push($zizzaniaArray, $user1 . ' va in giro a dire che ' . $user2 . ' va a transoni');
    array_push($zizzaniaArray, $user1 . ' mi ha detto che a ' . $user2 . ' piace rasare le palle ai negri');
    array_push($zizzaniaArray, $user1 . ' dice in giro che ' . $user2 . ' ne prende in culo due alla volta');
    array_push($zizzaniaArray, $user1 . ' va in giro a dire che ' . $user2 . ' va a transoni');
    array_push($zizzaniaArray, $user1 . ' tira le loffe e da la colpa a ' . $user2);
    array_push($zizzaniaArray, $user1 . ' mi dice sempre che a ' . $user2 . ' piace il cazzo');
    $min=1;
    $max=8;
    srand(microtime());
    $randomNumber = rand($min, $max);
    shuffle($zizzaniaArray);
    $response = $zizzaniaArray[$randomNumber];
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
    shuffle($usersCopy);
    srand(microtime());
    $randomNumber = rand($min, $max);
    $user1 = $usersCopy[$randomNumber];
    if (($key = array_search($user1, $usersCopy)) !== false)
      unset($usersCopy[$key]);
    $countUsers = count($usersCopy);
    $min=1;
    $max=$countUsers;
    srand(microtime());
    $randomNumber = rand($min, $max);
    shuffle($usersCopy);
    $user2 = $usersCopy[$randomNumber];
    
    $segretoArray = array(1 => $user1 . ' vuole portare ' . $user2 . ' alle terme per scopare in acqua');
    array_push($segretoArray, 'a ' . $user1 . ' piacerebbe leccare i piedi di ' . $user2);
    array_push($segretoArray, $user1 . ' ha una malsana ossessione per i capezzoli di ' . $user2);
    array_push($segretoArray, $user1 . ' ha rubato un paio di mutande usate di ' . $user2 . ' per annusarsele');
    array_push($segretoArray, $user1 . ' vorrebbe andare al pride village con ' . $user2);
    array_push($segretoArray, 'a ' . $user1 . ' piace l\'odore delle scoregge di ' . $user2);
    array_push($segretoArray, $user1 . ' vorrebbe essere frustato da ' . $user2);
    array_push($segretoArray, 'a ' . $user1 . ' piacerebbe essere posseduto da ' . $user2);
    $min=1;
    $max=8;
    srand(microtime());
    $randomNumber = rand($min, $max);
    shuffle($segretoArray);
    
    $response = $segretoArray[$randomNumber];
  }
}

// BEK
else if(strpos($text, 'bek') !== false || strpos($text, 'beck') !== false)
{
  $beckArray = array(1 => 'prlrlrendo lo stegagno!!');
  array_push($beckArray, 'sbobdadgli dentbdooo..');
  array_push($beckArray, 'io ci sarlrloooooo');
  array_push($beckArray, '..e la lasci piena iihiihiihh');
  array_push($beckArray, 'meto in leto la tigrbdee');
  array_push($beckArray, 'e quell\'altrlra trlrloia che da in girlro la carlblta igienicaaa!');
  array_push($beckArray, 'cosa fai mangi la pancetta con le mani come i marbrlrocchini!?!');
  array_push($beckArray, 'tanti augubrlrlri anche alle donne brlrutte!');
  $min=1;
  $max=8;
  srand(microtime());
  $randomNumber = rand($min, $max);
  shuffle($beckArray);
  
  $response = $beckArray[$randomNumber];
}

// BESTEMMIA
else if(strpos($text, 'bestemmia') !== false || 
           strpos($text, 'bestemmione') !== false || 
           strpos($text, 'blasfemia') !== false)
{
  $bestemmiaArray = array(1 => 'dio scappato di casa');
  array_push($bestemmiaArray, 'dio cane abbandonato in autostrada');
  array_push($bestemmiaArray, 'madonna scalza in un paese di puntine');
  array_push($bestemmiaArray, 'dio camion di ghiaia e per ogni sasso un porco');
  array_push($bestemmiaArray, 'madonna porcodiona');
  array_push($bestemmiaArray, 'dio sushi nella valle dei giapponesi a dieta');
  array_push($bestemmiaArray, 'gesù pecora nella valle dei sardi arrapati');
  array_push($bestemmiaArray, 'gesù spazzino nelle valli partenopee');
  array_push($bestemmiaArray, 'gesù paglia nella valle degli incendi spontanei');
  array_push($bestemmiaArray, 'dio cucitore di scarpe della Nike sottopagato');
  array_push($bestemmiaArray, 'gesù bagno nella valle dell\'influenza intestinale');
  array_push($bestemmiaArray, 'gesù donna nella valle dei benzinai self-service');
  array_push($bestemmiaArray, 'madonna extravergine d\'oliva');
  array_push($bestemmiaArray, 'dio mondial casa');
  array_push($bestemmiaArray, 'cristo imbianchino');
  array_push($bestemmiaArray, 'CristoMcBacon');
  array_push($bestemmiaArray, 'dio lampione nella valle dei guasti dell\'enel');
  array_push($bestemmiaArray, 'dio maiale a Montagnana a fine dicembre');
  
  $min=1;
  $max=18;
  srand(microtime());
  $randomNumber = rand($min, $max);
  shuffle($bestemmiaArray);
  
  $response = $bestemmiaArray[$randomNumber];
}

// NONNO
else if(strpos($text, 'nonno') !== false || 
          strpos($text, 'proverbio') !== false || 
          strpos($text, 'poesia') !== false)
{
  $proverbioArray = array(1 => 'Se la lengua nn sa de vacca ..la bocca non se stracca');
  array_push($proverbioArray, 'Fidati della volpe fidati del tasso, ma mai della donna col culo basso');
  array_push($proverbioArray, 'Ne per scherzo ne per burla dentro al culo non ci voglio nulla');
  array_push($proverbioArray, 'A cazzo dritto è difficile mantenere la calma');
  array_push($proverbioArray, 'Geloso de culo frocio sicuro');
  array_push($proverbioArray, 'Le figlie di Maria son le prime a darla via');
  array_push($proverbioArray, 'Quando s\'ha ben magnà e ben bevù se zerca el buso indò nar su');
  array_push($proverbioArray, 'Ala de capon, culo de castron e tete de massara xe na roba rara');
  array_push($proverbioArray, 'Ale done, ai sassi e ai bissi, colpi ciari e fissi');
  array_push($proverbioArray, 'Co l\'età, l\'omo fa panza e la femena fa stomego');
  array_push($proverbioArray, 'Co\'l cavéjo tra al bianchin, assa la dona e tiente el vin');
  array_push($proverbioArray, 'In istà la vache va in montagna a fare le siore, e le siore va in montagna a fare le vache');
  array_push($proverbioArray, 'La mojere xe come na scoreza: o te a moli o te te sofeghi');
  array_push($proverbioArray, 'Libri, done e cavai no se inpresta mai');
  array_push($proverbioArray, 'On palo in piè, na stropa domà e na fémena colgà i porta quanto peso che te voi');
  array_push($proverbioArray, 'Ovo de on\'ora, pan de on dì, vin de on ano, dona de vinti e amigo de trenta');
  $min=1;
  $max=16;
  srand(microtime());
  $randomNumber = rand($min, $max);
  shuffle($proverbioArray);
  
  $response = $proverbioArray[$randomNumber];
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
  $localita = $text;
  $localita = str_replace('meteo', '', $localita);
  $localita = str_replace('che tempo fa a', '', $localita);
  $localita = trim($localita);
  $response = $localita;
  
  if($localita === '')
  {
    $response = 'https://www.ilmeteo.it/meteo/Verona';
  }
  else
  {
    $localita = str_replace(' ', '%20', $localita);
    $response = 'https://www.ilmeteo.it/meteo/' . $localita;
  }
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
  
  $offesaArray = array(1 => ' chissá che ti cadano le braccia e inizi a pruderti il culo nello stesso istante');
  array_push($offesaArray, ' non capisci un cazzo neanche se ne ingoi un mazzo');
  array_push($offesaArray, ' sei come la minchia sempre tra le palle');
  array_push($offesaArray, ' perché mi fai porcodiare?');
  array_push($offesaArray, ' sei un diomas\'cio');
  array_push($offesaArray, ' sei così brutto che quando sei nato tua mamma ha inviato i biglietti di scuse a tutti');
  array_push($offesaArray, ' si fa prima a finire un cubo di rubik che a trovarti il cazzo tanto é piccolo');
  array_push($offesaArray, ' darti dello stupido è oltraggiare gli stupidi, perciò per offenderti è urgente cercare una nuova parola');
  array_push($offesaArray, ' che cos\'è una disgrazia? Conoscerti e incontrarti hahaha ..diocan');
  array_push($offesaArray, ' sei come una nuvola, se ti levi dalle palle diventa una bella giornata');
  array_push($offesaArray, ' sei così brutto che se i testimoni di geova vengono a casa tua, si chiudono la porta in faccia da soli');
  array_push($offesaArray, ' sei così brutto che se qualcuno ti guarda il culo ti chiede perchè stai facendo la verticale');
  array_push($offesaArray, ' sei così brutto che quando preghi Gesù si mette su invisibile');
  array_push($offesaArray, ' sei falso come i soldi del monopoli');
  
  $min=1;
  $max=14;
  srand(microtime());
  $randomNumber = rand($min, $max);
  shuffle($offesaArray);
  $response = $offeso . $offesaArray[$randomNumber];
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

