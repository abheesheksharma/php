<?php
$text = file_get_contents('https://www.slideshare.net/sagxgmwgq/best-books-basic-applied-concepts-of-immunohematology-2e-by-kathy-d-blaney-ms-bbascpsbb-chtabhi-full');
libxml_use_internal_errors(true);// Used to remove error from LoadHTML
$doc = new DOMDocument('1.0');
$doc->loadHTML($text);
foreach($doc->getElementsByTagName('img') AS $img) {
    $class = $img->getAttribute('class');
    if(strpos($class, 'slide_image') !== FALSE) {
        $nn=$img->getAttribute('src');
            echo $nn;
        
       
    }
}
?>
