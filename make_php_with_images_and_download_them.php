<?php
$arr = array();
$zip = new ZipArchive();

# create a temp file & open it
$tmp_file = tempnam('.', 'zip');
$zip->open($tmp_file, ZipArchive::CREATE);
$j=0;
# loop through each file
foreach ($arr as $file) {
    # download file
    $download_file = file_get_contents($file);
    if (filter_var($file, FILTER_VALIDATE_URL)) { 
  $zip->addFromString(basename($file), $download_file);
    
}
    #add it to the zip
    $j++;
}

# close zip
$zip->close();

# send the file to the browser as a download
header('Content-disposition: attachment; filename="my file.zip"');
header('Content-type: application/zip');
readfile($tmp_file);
unlink($tmp_file);
?>
