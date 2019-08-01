<?php
if (!ini_get('display_errors'))
{
    switch ($debug)
    {
        case 'all':
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        break;

        case 'simple':
            ini_set('display_errors', 'On');
            error_reporting(E_ALL & ~ E_NOTICE);
        break;

        case 'false':
            ini_set('display_errors', 'Off');
        break;
    }
}

session_set_cookie_params('0', '/', '.rlinepronos.fr', true, false);