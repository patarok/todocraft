<?php
require "vendor/autoload.php";


function parseDir($dir)
{
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
            $nameParts = explode('_', $fileinfo->getFilename());
            $xml = new SimpleXMLElement(file_get_contents($fileinfo->getRealpath()));
//            $dom = HtmlDomParser::file_get_html( $fileinfo->getRealpath());
//            $path = $dom->path;
            $path = $xml->path;
            $top = str_replace('T', '', str_replace('.svg', '', $nameParts[3]));
            echo "<path data-name=\"$top\" d=\"" . $path['d'] . "\"/>";
        }
    }


}


parseDir($argv[1]);