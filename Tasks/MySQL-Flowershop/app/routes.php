<?php

use Shop\controllers\{PagesController, ShopController};

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    $r->addRoute('GET', '/', [PagesController::class, 'home']);
    $r->addRoute('GET', '/warehouses', [PagesController::class, 'warehouses']);

    $r->addRoute('GET', '/shop', [ShopController::class, 'table']);
    $r->addRoute('POST', '/shop', [ShopController::class, 'discount']);
});