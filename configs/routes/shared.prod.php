<?php

the()->project->languages=["fr"];
the()->project->languagesUrls=[
    "fr"=>"https://cayceo.fr"
];
//force https?
the()->configProjectUrl->forceHttps=true;
// Traductions ui.


site()->projectName="Cayceo (prod)";
site()->formsMailTo=[
    "d.marsalone@gmail.com",
    "contact@cayceo.fr"
];

// trads armada only
//TODO
the()->project->config_translations_csv_url="https://docs.google.com/spreadsheets/d/1GNz4jvUfwosLeE8Gx8tQi2HhSrCdCanVaP9u0EfmI-o/export?gid=0&format=csv";
the()->project->config_translations_debug=false; //quand true recharge à chaque fois le CSV

//config options

//Google Map etc...
//site()->googleApiKey="xxxxx";

//Google webmaster tools
the()->htmlLayout()->googleSiteVerification="JIPbJbh_DM_yo1xxKQERmE2kviWQNADVGvslBPePgGs";


//Google analytics cayceo (piqué du vieux site)
site()->googleAnalyticsId="UA-30033735-2";
