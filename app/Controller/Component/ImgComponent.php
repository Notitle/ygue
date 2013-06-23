<?php

class ImgComponent extends Component
{
    /**
     * Redimmensionne une image en gardant les proportions
     * 
     * @param string $img le chemin vers l'image source
     * @param string $dest le chemin vers l'image de destination
     * @pram int $widthOutput la largeur de l'image de sortie (si 0 aucun redimensionnement)
     * @param int $heightOutput la hauteur de l'image de sortie (si 0 aucun redimensionnement)
     * @param boolean $debug si true on affiche le résultat des calculs sans enregistré l'image, sinon aucun message et enregistrement de l'image
     * 
     * @return boolean 
     */
    function redim($img, $dest, $widthOutput=0, $heightOutput=0, $debug = false)
    {
        /*if($debug)*/ Configure::write('debug', 2);
        // récupére la taille de l'image original
        if(!is_file($img)){
            $path = dirname($img).DS;
            $filename = basename($img, '.jpg');
            if(is_file($path.$filename.'.jpeg'))
                $img = $path.$filename.'.jpeg';
            elseif(is_file($path.$filename.'.png'))
                $img = $path.$filename.'.png';
            elseif(is_file($path.$filename.'.gif'))
                $img = $path.$filename.'.gif';
            else
                return false;
        }
        list($widthInput, $heightInput, $type) = getimagesize($img);
        $type = image_type_to_mime_type($type);
        if($debug){ 
            echo '<b>Input:</b><br />Width: ', $widthInput, 'px<br />Height: ', $heightInput, 'px<br />Type: ',$type,'<br /><br />';
        }
        
        // Si aucune taille de sortie n'est défini on récupére la taille de l'image original
        if(0 == $widthOutput)
            $widthOutput = $widthInput;
        if(0 == $heightOutput)
            $heightOutput = $heightInput;
        
        if($debug) echo '<b>Output</b><br />Width: ', $widthOutput, 'px<br />Height: ', $heightOutput, 'px<br /><br />';
        
        $ratioInput = $widthInput / $heightInput;
        // Si la taille de sortie et différente de la taille d'entré on effectue le calcul
        if($widthInput!=$widthOutput || $heightInput!=$heightOutput){
            if(($widthInput >= $widthOutput) || ($heightInput >= $heightOutput)){
                $heightEnd = $heightOutput;
                $widthEnd = $widthOutput;
                if($widthOutput / $heightOutput > $ratioInput){
                    $widthEnd = round($heightOutput * $ratioInput);
                }else{
                    $heightEnd = round($widthOutput / $ratioInput);
                }
            }else{
                $heightEnd = $widthOutput;
                $widthEnd = $heightOutput;
            }
            
            $borderX = round(($widthOutput-$widthEnd)/2);
            $borderY = round(($heightOutput-$heightEnd)/2);
        } else {
            $ratioInput = 1;
            $widthEnd = $widthOutput;
            $heightEnd = $heightOutput;
            $borderX = 0;
            $borderY = 0;
        }
        
        if($debug){ 
            echo '<b>Image</b><br />Ratio: ',$ratioInput,'<br />Width: ', $widthEnd, 'px<br />Height: ', $heightEnd, 'px<br /><br />';
            echo '<b>Border</b><br />Left: ', $borderX, 'px<br />Top: ', $borderY, 'px<br /><br />';
            die;
        }
        
        // on créer l'image
        $miniature = imagecreatetruecolor($widthOutput, $heightOutput);
        // on la rempli de blanc
        $white = imagecolorallocate($miniature, 255, 255, 255);
        imagefill($miniature, 0, 0, $white);
        // on récupére l'image source
        if(substr($img, -4) == ".jpg" || substr($img, -4) == ".JPG")
            $image = imagecreatefromjpeg($img);
        if(substr($img, -5) == ".jpeg" || substr($img, -5) == ".JPEG")
            $image = imagecreatefromjpeg($img);
        if(substr($img, -4) == ".png" || substr($img, -4) == ".PNG")
            $image = imagecreatefrompng($img);
        if(substr($img, -4) == ".gif" || substr($img, -4) == ".GIF")
            $image = imagecreatefromgif($img);
        
        // on redimensionne l'image source et on enregistre
        if(imagecopyresampled($miniature, $image, $borderX, $borderY, 0, 0, $widthEnd, $heightEnd, $widthInput, $heightInput)!==false)
            return imagejpeg($miniature, $dest, 90);
        return false;
    }
}