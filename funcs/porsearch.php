<?php 
function PorSearch($key)
{
  //Load the HTML page
  $okKey = str_replace(' ', '%20', $key);
  $html = file_get_contents('https://www.porzo.com/'.$okKey);
 //Create a new DOM document
  $dom = new DOMDocument;
   
  //Parse the HTML. The @ is used to suppress any parsing errors
  //that will be thrown if the $html string isn't valid XHTML.
  $dom->loadHTML($html);
  // XPath
  $finder = new DomXPath($dom);
   
  //Get all nodes by class name
  $classname="thumb sub";
  $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
 //$links = $dom->getElementsByTagName('a');
  
  $linksArray = array();
 
  //Iterate over the extracted links and display their URLs
  foreach ($nodes as $node)
  {
      //Extract and show the "href" attribute. 
      $l = str_replace('&amp;', '&', $link->getAttribute('data-item-url'));
      //$l = $link->getAttribute('data-item-url');
      $completeLink = 'https://www.porzo.com/'.$l;
      array_push($linksArray, $completeLink);
  }
  $min=1;
  $max=max(count($linksArray), 10);
  $randomNumber = rand($min, $max);
  //shuffle the array
  shuffle($linksArray);
  $response = $linksArray[$randomNumber];
  
  return 'https://www.porzo.com/'.$okKey;
}
   ?>