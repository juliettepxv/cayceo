<?php
set_time_limit(60*3);
\Classiq\Models\Shipmode::_dangerImport();
\Classiq\Models\Order::danger_updateAllBaskets();