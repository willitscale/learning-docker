<?php

if (extension_loaded('xdebug')) {
    echo 'xdebug is available';
} else {
    echo 'xdebug is not available';
}

var_dump(getenv('REDIS_HOST'));