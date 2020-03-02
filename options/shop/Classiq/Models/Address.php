<?php


namespace Classiq\Models;

use Pov\PovException;

/**
 * Class Order
 * @package Classiq\Models
 * @property string $name Nom prénoms
 * @property Profil $profil Le profil a qui est associé à cette adresse
 * @property string $address numéro, rue etc...
 * @property string $city La ville
 * @property string $zipcode Le code postal
 * @property string $country le pays
 * @property string $phone1 Premier numéro de téléphone
 * @property string $phone2 Second numéro de téléphone
 *
 *
 */
class Address extends Classiqmodel
{

    public static $icon="cq-home";
    /**
     * @param bool $plural Si true retournera le nom du modèle au pluriel
     * @return string nom du type de record lisible par les humains
     */
    static function humanType($plural=false){
        return $plural?"Adresses":"Adresse";
    }

    public function update(){
        $this->country="France";
    }

    /**
     * Teste si l'adresse est valide ou non
     * @return bool
     */
    public function isValid(){
        return $this->name
            && $this->address
            && $this->city
            && $this->zipcode
            && $this->country
            && ($this->phone1 || $this->phone2)
            ;
    }

    /**
     * true si c'est son propre profil
     * @return bool
     */
    public function isEditable(){
        if(!me() || !$this->profil){
            return false;
        }
        switch (true){
            case $this->profil->uid()===me()->uid();
                return true;
            default:
                return false;
        }
    }

    /**
     * Renvoie l'adresse sous forme de texte
     * @param bool $phone  ajouter le téléphone ou non
     * @param bool $email ajouter le mail ou non
     * @return string
     */
    public function text($phone=true,$email=true){
        $lines=[
            $this->name,
            $this->address,
            $this->zipcode." ".$this->city,
            $this->country
        ];
        if($phone){
            $lines[]="";
            $lines[]=$this->phone1." ".$this->phone2;
        }
        if($email){
            $lines[]="";
            if($this->profil){
                $lines[]=$this->profil->email;
            }else{
                $lines[]="Email indisponible";
            }

        }
        return implode("\n",$lines);
    }

}