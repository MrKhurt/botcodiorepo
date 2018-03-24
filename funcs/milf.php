<?php
function Milf($text)
{
  $response = '';
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
  shuffle($milfArray);
  $searchKey = $milfArray[$randomNumber];

  // devo cercare una gif?
  if(strpos($text, 'gif') !== false)
    $response = imagesearch($searchKey, true);
  else
    $response = imagesearch($searchKey, false);
  return $response;
}
?>