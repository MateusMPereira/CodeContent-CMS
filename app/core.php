<?php

define('SRC_PATH', getcwd() . '/src');
define('PUBLIC_PATH', getcwd() . '/public');
define('REQ_METHOD', $_SERVER['REQUEST_METHOD']);
define('ROTA', explode('?', $_SERVER['REQUEST_URI'])[0]);

if (!empty($_SERVER['QUERY_STRING'])) {
    foreach (explode('&', $_SERVER['QUERY_STRING']) as $qry) {
        $tmp_qry_str = explode('=', $qry);

        $QUERY_STRING[$tmp_qry_str[0]] = $tmp_qry_str[1];
    }
    define('QUERY_STRING', $QUERY_STRING);
}
define('QUERY_STRING', []);
