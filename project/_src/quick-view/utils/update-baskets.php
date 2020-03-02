<?php
set_time_limit(60*3);
\Classiq\Models\Order::danger_updateAllBaskets();
?>
Vient de mettre à jour les paniers<br>
(necessaire si mise à jour de produits, prix, tva etc...)
