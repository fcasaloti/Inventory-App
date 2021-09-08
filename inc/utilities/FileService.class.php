<?php

//class that handles file
class FileService
{
    
    public static $fileContents;

    public static function readFile($fileName)
    {
        try {
            if (file_exists($fileName)) {
                if (!$fh = fopen($fileName, 'r')) {
                    throw new Exception("Could not find file" . "\n");
                } else {
                    $fh = fopen($fileName, 'r');
                    self::$fileContents = fread($fh, filesize($fileName));
                    fclose($fh);
                }
            }
        } catch (Exception $ex) {
            error_log(date('m/d/Y H:i:s',time()) . " " . $_SESSION['username'] . " " . $ex->getMessage(), 3, FILE_LOG);
        }
    }

    public static function writeFile($fileName){
        try{
            if($fh = fopen($fileName,'w') == false){
                throw new Exception("Could not read the file"."\n");
            } else {
                $fh = fopen($fileName,'w');
                fwrite($fh,self::$fileContents);
                fclose($fh);
            }
        } catch(Exception $ex){
            echo $ex->getMessage();
            error_log(date('m/d/Y H:i:s',time()) . " " . $_SESSION['username'] . " " . $ex->getMessage(),3,FILE_LOG);
            return;
        }
    }

}
