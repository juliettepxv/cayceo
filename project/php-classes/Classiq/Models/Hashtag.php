<?php


namespace Classiq\Models;


/**
 * Class Tag
 * @package Classiq\Models
 *
 */
class Hashtag extends Page
{

    public function update()
    {
        if(!$this->name){
            $this->name="test";
        }
        parent::update();
    }



}