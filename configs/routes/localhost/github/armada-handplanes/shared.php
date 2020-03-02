<?php
the()->project->languages=["fr","en"];
the()->project->languagesUrls=[
    "fr"=>"http://localhost/github/armada-handplanes/fr",
    "en"=>"http://localhost/github/armada-handplanes/en"
];
//force https?
the()->configProjectUrl->forceHttps=false;
// Traductions ui.
// trads armada only
the()->project->config_translations_csv_url="https://docs.google.com/spreadsheets/d/1GNz4jvUfwosLeE8Gx8tQi2HhSrCdCanVaP9u0EfmI-o/export?gid=0&format=csv";
the()->project->config_translations_debug=true; //quand true recharge à chaque fois le CSV

//config options

//Google Map etc...
//site()->googleApiKey="xxxxx";

//Google webmaster tools
//TODO configurer the()->htmlLayout()->googleSiteVerification="xxxxx";

//Google analytics
//TODO configurer site()->googleAnalyticsId="UA-xxxxxx";
