<?php
the()->fmkHttpRoot="";// /github/classiq-startup
the()->configProjectUrl=new \Pov\Configs\ProjectUrl("pp.cayceo.fr"); // localhost/github/classiq-startup/fr
the()->fileSystem=new \Pov\Configs\FileSystem("project");
the()->configProjectUrl->seoActive=false;
the()->boot->loadProject("project");
the()->project->langCode="fr";

include(__DIR__ . "/shared.php");