<?php

return [
    'tender_check_interval'  => env('TENDER_CHECK_INTERVAL', '5 minutes'),
    'tender_loop_sleep'      => (int) env('TENDER_LOOP_SLEEP', 1),
    'tender_loop_sleep_max'  => (int) env('TENDER_LOOP_SLEEP_MAX', 60),
];
