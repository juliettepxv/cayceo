<?php


namespace Classiq\Models;

/**
 * Class Shipmode
 * @package Classiq\Models
 *
 * @property-read string $service
 * @property-read string $maxweight Poids max en KG
 */
class Shipmode extends Classiqmodel
{

    use WithPrice;

    const PACKAGING_WEIGHT=0.05;

    const COLISSIMO="colissimo";
    const CHRONOFRESH="chronofresh";
    const CHRONOFREEZE="chronofreeze";
    /**
     * @var string[] Les services possibles
     */
    static $SERVICES=[
      self::COLISSIMO,
      self::CHRONOFRESH,
      self::CHRONOFREEZE,
    ];



    /**
     * @param bool $plural Si true retournera le nom du modèle au pluriel
     * @return string nom du type de record lisible par les humains
     */
    static function humanType($plural=false){
        $r=ucwords(self::modelTypeStatic());
        if($plural){
            return "Modes de Livraison";
        }
        return "Mode de Livraison";
    }

    public static $icon="cq-forward";

    public function update()
    {
        parent::update();
        $this->applyTVA();
        $mw=number_format($this->maxweight,2,".","");
        $mw=str_pad($mw,5,"0",STR_PAD_LEFT);
        $this->name="$this->service $mw kg $this->price €";
    }
    public function getErrors()
    {
        $err= parent::getErrors();
        if(!$this->service){
            $err["service"]="Définir le service";
        }else{
            if(!in_array($this->service,self::$SERVICES)){
                $err["service"]="Service inconnu :(";
            }
        }

        if(!$this->maxweight){
            $err["maxweight"]="Définir le poids max!";
        }
        if(!$this->price){
            $err["price"]="Définir un prix";
        }
        return $err;
    }

    /**
     * Renvoie le ship mode approprié en fonction du poids et du service
     * @param string $service Shipmode::COLLISIMO par exemple
     * @param float $weight
     * @return Shipmode|null
     */
    static function getForWeight($service,$weight){
        $weight+=self::PACKAGING_WEIGHT;//poids de l'emballage
        $q=[];
        $q[]="service = '$service'";
        $q[]="AND";
        $q[]="maxweight > $weight ";
        $q[]="ORDER BY maxweight ASC ";
        /** @var Shipmode $ship */
        $ship=db()->findOne("shipmode",implode(" ",$q));
        if($ship){
            return $ship;
        }
        return null;

    }

    /**
     * Importe les prix depuis le google sheet
     */
    static function _dangerImport(){
        $lines=utils()->csv->csvToObject(
            "https://docs.google.com/spreadsheets/d/1KjqAq1bpXL8gjJdgSqsi9CMbWgaywYr2/export?format=csv&gid=1860999405",
            ",",
            false,
            null
        );
        $col2service=[
            "col_1 Colissimo"=>self::COLISSIMO,
            "col_2 Chronofresh"=>self::CHRONOFRESH,
            "col_3 Chronofreeze"=>self::CHRONOFREEZE
        ];

        if($lines){
            //avant de les importer efface les anciens
            db()->trashAll(db()->find("shipmode"));

            foreach ($lines as $line){
                $maxWeight=$line["col_0 Poids inférieur à (kg)"];
                if($maxWeight && is_numeric($maxWeight)){
                    foreach(["col_1 Colissimo","col_2 Chronofresh","col_3 Chronofreeze"] as $s){
                        $service=$col2service[$s];
                        $price=$line[$s];
                        /** @var \Classiq\Models\Shipmode $record */
                        $record=db()->findOne("shipmode","service = '$service' AND price = '$price'");
                        if(!$record){
                            $record=db()->dispense("shipmode");
                            $record->service=$service;
                            $record->maxweight=$maxWeight;
                        }else{
                            if($record->maxweight<$maxWeight){
                                $record->maxweight=$maxWeight;
                            }
                        }
                        $record->price=$price;
                        db()->store($record);
                    }
                }

            }
        }

    }


}