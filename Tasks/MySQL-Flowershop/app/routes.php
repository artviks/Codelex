<?php

use Shop\controllers\PagesController;

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    $r->addRoute('GET', '/', [PagesController::class, 'shop']);
    $r->addRoute('GET', '/warehouses', [PagesController::class, 'warehouses']);
});