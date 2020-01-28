<?php


namespace Classiq\Models;

use Classiq\Models\JsonModels\ListItem;
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











    //----------------listes--------------------------



    /**
     * Projet suivant dans la liste
     * @param null $listName
     * @return Project
     */
    public function next($listName=null){
        if(!$listName){
            $listName=$this->getDefaultListName();
        }
        $list=self::getList($listName,true);
        if(!$list){
            die("pas de liste $listName");
        }
        return $this->_nextInList($list);
    }

    /**
     * Projet précédent dans la liste
     * @param null $listName
     * @return Project
     */
    public function prev($listName=null){
        if(!$listName){
            $listName=$this->getDefaultListName();
        }
        $list=self::getList($listName,true);
        $list=array_reverse($list);
        return $this->_nextInList($list);
    }

    const LIST_NAME_NEWS="Les news";
    const LIST_NAME_PROJETS="Les projets";

    /**
     * Renvoie le nom de la liste par defaut pour ce projet
     * @return string
     */
    private function getDefaultListName(){
        return self::LIST_NAME_PROJETS; //todo gérer les news aussi (une fois qu'on aura du contenu dans la liste news en fait)
        switch (true) {
            case $this->isNews():
                return self::LIST_NAME_NEWS;
                break;
            default:
                return self::LIST_NAME_PROJETS;
                break;
        }
    }
    /**
     * @param Project[] $list
     * @return Project
     */
    private function _nextInList($list){
        $found=false;
        foreach ($list as $r){
            if($found){
                return $r;
            }
            if($r->uid()===$this->uid()){
                $found=true;
            }
        }
        if(!$list){
            return $this;
        }
        return $list[0];
    }


    /**
     * Renvoie le record de la liste de projets définis (ou la liste des projets directement)
     * @param string $listName Le nom de la liste
     * @param bool $returnRecordsArray si true renverra la listes des projets directement
     * @return Nav|Project[]
     */
    public static function getList($listName, $returnRecordsArray=false){
        $nav=Nav::getByName($listName,true);
        if($returnRecordsArray){
            $arr=[];
            $items=$nav->items();
            foreach ($items as $i){
                $item=$i->targetUid(true);
                if($item){
                    $arr[]=$item;
                }
            }
            return $arr;
        }else{
            return $nav;
        }
    }


}