<?php
namespace App\Filament\Resources\EventResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\EventResource;
use Illuminate\Routing\Router;


class EventApiService extends ApiService
{
    protected static string | null $resource = EventResource::class;

    public static function allRoutes(Router $router)
    {
        Handlers\CreateHandler::route($router);
        Handlers\UpdateHandler::route($router);
        Handlers\DeleteHandler::route($router);
        Handlers\PaginationHandler::route($router);
        Handlers\DetailHandler::route($router);
    }
}
