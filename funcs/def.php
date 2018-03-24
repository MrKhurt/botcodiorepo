<?php
function Definizione($text)
{
  $vocabolo = str_replace('definizione ', '', $text);
  $vocabolo = str_replace(' ', '', $vocabolo);
  return 'http://dizionari.corriere.it/dizionario_italiano/' . strtoupper($vocabolo[0]) . '/' . $vocabolo . '.shtml';
}
?>