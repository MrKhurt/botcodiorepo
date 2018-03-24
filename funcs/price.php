<?php
function Prezzo($text)
{
  $vocabolo = str_replace('prezzo ', '', $text);
  $vocabolo = str_replace(' ', '+', $vocabolo);
  return 'https://www.google.it/search?q=' . $vocabolo . '&safe=off&dcr=0&source=lnms&tbm=shop&sa=X&ved=0ahUKEwjyj5flpfvZAhWM7xQKHatMCnoQ_AUICygC&biw=1352&bih=708';
}
?>