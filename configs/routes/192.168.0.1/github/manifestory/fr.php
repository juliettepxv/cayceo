<?php
the()->fmkHttpRoot="/github/manifestory";// /github/classiq-startup
the()->configProjectUrl=new \Pov\Configs\ProjectUrl("192.168.0.1/github/manifestory/fr"); // localhost/github/classiq-startup/fr
the()->fileSystem=new \Pov\Configs\FileSystem("project");
the()->configProjectUrl->seoActive=true;
the()->boot->loadProject("project");
the()->project->langCode="fr";

include (__DIR__ . "/shared.php");