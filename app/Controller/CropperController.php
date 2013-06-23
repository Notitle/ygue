<?php

class CropperController {

    public $uses = null;
    public $components = array('Img');

    function create() {
        extract($_GET);
        $img = WWW_ROOT . $image;
        $url = $dest;
        $dest = WWW_ROOT . $dest;

        if (is_file($dest)) {
            header('Content-type: image/jpg');
            echo file_get_contents($dest);
            exit;
        } else {
            $format = explode('x', $format);
            if(is_file($image) && $this->Img->redim($image, $dest, $format[0], $format[1])){
                header('Content-type:image/jpg');
                echo file_get_contents($dest);
                exit;
            }else{
                exit('ERROR');
            }
        }
    }

}

?>
