<?php
function Proverbio($text)
{
  $response = '';
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
  array_push($proverbioArray, 'Chi che dal leto speta socorso mostra le bale come l\'orso');
  array_push($proverbioArray, 'Chi dise \'ma\' in culo lo ga');
  array_push($proverbioArray, 'A ogni culo el so cagare');
  array_push($proverbioArray, 'A sentarse so do careghe el culo se sbrega');
  array_push($proverbioArray, 'A tirarse massa indrio se finisse col culo in rio');
  array_push($proverbioArray, 'Amare e no éssare amà, xe come forbirse el culo senza vere cagà');
  array_push($proverbioArray, 'A viajare se se descanta, ma chi che parte mona torna indrio mona');
  array_push($proverbioArray, 'Bruta de muso, larga de buso');
  array_push($proverbioArray, 'Caval, putana e persegar trent\'ani no i pol durar');
  array_push($proverbioArray, 'Co le done e co le merde se barufa e po\' se perde');
  array_push($proverbioArray, 'Co\' i xe pì i passi che i boconi l\'è on andare da cojoni');
  array_push($proverbioArray, 'Culo che caga no ghe xe oro che lo paga');
  array_push($proverbioArray, 'El laòro dela sega el slonga i brazi e \'l scurza la tega');
  array_push($proverbioArray, 'Mal de testa vole magnare, mal de panza vole cagare');
  array_push($proverbioArray, 'Maroni e vin novo, scoreze de fogo');
  array_push($proverbioArray, 'Mèjo na torta in du che na merda da ti solo');
  array_push($proverbioArray, 'On palo in piè, na stropa domà e na fémena colgà i porta quanto peso che te voi');
  array_push($proverbioArray, 'On pomo de matina te cava el cataro e te fa pissare ciaro');
  array_push($proverbioArray, 'Par scòndare i difeti basta frequentare conpagnie dela stessa cagà');
  array_push($proverbioArray, 'Picola al balo, grande a cavalo');
  array_push($proverbioArray, 'Se tuti i bechi portasse on lanpion, che gran iluminazion');
  array_push($proverbioArray, 'Picola al balo, grande a cavalo');
  array_push($proverbioArray, 'Verze e fasòi sbrega i nizòi');
  array_push($proverbioArray, 'Xe inutile fermare el treno col culo');
  $min=1;
  $max=40;
  $randomNumber = rand($min, $max);
  shuffle($proverbioArray);
  
  $response = $proverbioArray[$randomNumber];
  return $response;
}
?>