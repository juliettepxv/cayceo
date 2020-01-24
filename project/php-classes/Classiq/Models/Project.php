<?php


namespace Classiq\Models;

use Pov\Image\ImgUrl;

/**
 * Class Project
 * @package Classiq\Models
 *
 * @property String $titre_lang
 * @property String $sstitre_lang
 *
 * @property String $logoclient
 * @property String $kind
 *
 *
 */
class Project extends Page
{
    /**
     * le logoclient
     * @param string $defaultImage Url d'une image par default
     * @param bool $asRecord renverra le fileRecord si défini sur true, sinon un ImgUrl pour travailler l'image
     * @return ImgUrl|Filerecord
     */
    public function logoClient($asRecord=false,$defaultImage="")
    {
        $url="";
        if($defaultImage){
            $url=$defaultImage;
        }
        /** @var Filerecord $file */
        $file=Filerecord::getByUid($this->logoclient);
        if($asRecord){
            return $file;
        }
        if($file){
            $url=$file->localPath();
        }
        return pov()->img($url);
    }

    /**
     * @return bool
     */
    public function isNews(){
        return $this->kind==="news";
    }

}