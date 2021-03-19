<?php

use Shop\database\Connection;
use Shop\database\QueryBuilder;

$config = require './config.php';

return new QueryBuilder(
    Connection::make($config['database'])
);