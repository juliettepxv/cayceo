<?php
//GET ACTION
use Pov\Defaults\C_povApi;
use Pov\MVC\View;
use Pov\System\ApiResponse;

//créée la home page si elle existe pas
pov()->events->listen("EVENT_ERROR_MISSING_HOME_PAGE",function(){
    $home=\Classiq\Models\Page::getByName("Home page",true);
    $home->urlpage->is_homepage=true;
    $home->urlpage->url="";
    $home->view="index";
    db()->store($home);
    db()->store($home->urlpage);
    die("il faut crééer la home page");
});


pov()->events->listen(C_povApi::EVENT_ACTION,
    /**
     * @param ApiResponse $vv
     * @param string $actionName
     */
    function(ApiResponse $vv,string $actionName){
        $split=explode(".",$actionName);
        if(count($split) !==2){
            $vv->addError("action malformée ($actionName)");
        }else{
            $entry=$split[0];
            $action=$split[1];
            $actionFile="$entry/api/$action";
            if(View::isValid($actionFile)){
                $api=$vv;
                include(View::getRealPath($actionFile));
            }else{
                $vv->addError("action invalide ($actionName -> $actionFile.php)");
            }
        }

    }
);