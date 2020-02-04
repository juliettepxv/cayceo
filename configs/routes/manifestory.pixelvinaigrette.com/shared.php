<?php
the()->project->languages=["fr","en"];
the()->project->languagesUrls=[
    "fr"=>"https://manifestory.pixelvinaigrette.com/fr",
    "en"=>"https://manifestory.pixelvinaigrette.com/en"
];
//force https?
the()->configProjectUrl->forceHttps=true;
// Traductions ui.
// trads manifestory only
the()->project->config_translations_csv_url="https://docs.google.com/spreadsheets/d/1RHoObPPW-YId5Az-VuAsEllszPMh5n_NB170BaUkIfg/export?gid=0&format=csv";
the()->project->config_translations_debug=false; //quand true recharge à chaque fois le CSV

//config options

//Google Map etc...
//site()->googleApiKey="xxxxx";

//Google webmaster tools
//TODO configurer the()->htmlLayout()->googleSiteVerification="xxxxx";

//Google analytics
//TODO configurer site()->googleAnalyticsId="UA-xxxxxx";
