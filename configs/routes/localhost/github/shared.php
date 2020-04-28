<?php
the()->project->languages=["fr"];
the()->project->languagesUrls=[
    "fr"=>"http://localhost/github/mouchard"
];
//force https?
the()->configProjectUrl->forceHttps=false;
// Traductions ui.


site()->projectName="Cayceo (localhost)";
site()->formsMailTo=[
    "d.marsalone@gmail.com",
    "david@pixelvinaigrette.com",
    "juliette.salomon@gmail.com"
];

// trads armada only
//TODO
the()->project->config_translations_csv_url="https://docs.google.com/spreadsheets/d/1GNz4jvUfwosLeE8Gx8tQi2HhSrCdCanVaP9u0EfmI-o/export?gid=0&format=csv";
the()->project->config_translations_debug=false; //quand true recharge à chaque fois le CSV

//config options

//Google Map etc...
//site()->googleApiKey="xxxxx";

//Google webmaster tools
//TODO configurer the()->htmlLayout()->googleSiteVerification="xxxxx";

//Google analytics
//TODO configurer site()->googleAnalyticsId="UA-xxxxxx";
