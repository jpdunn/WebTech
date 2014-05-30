<?php
$q=$_GET["q"];

if($q=="Google") {
    $xml=("http://www.arts.qld.gov.au/blog/index.php/feed/");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);



echo "<h3><a href='http://www.arts.qld.gov.au' rel='external'>Queensland Arts News Feed</a></h3>";
$feedString = "";
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=9; $i++) {
    $item_title=$x->item($i)->getElementsByTagName('title')
        ->item(0)->childNodes->item(0)->nodeValue;
    $item_link=$x->item($i)->getElementsByTagName('link')
        ->item(0)->childNodes->item(0)->nodeValue;


    $feedString .= "<a href='" . $item_link . "'>" . $item_title . "</a> &nbsp;&nbsp;&nbsp;&nbsp;";
}
echo "<marquee>" . $feedString . "</marquee>";
?>