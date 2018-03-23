<?php
function Nondefinizione($text)
{
  $vocabolo = str_replace('nondefinizione ', '', $text);
  $vocabolo = str_replace(' ', '_', $vocabolo);
  return 'http://nonciclopedia.wikia.com/wiki/' . ucfirst($vocabolo);
}
?>