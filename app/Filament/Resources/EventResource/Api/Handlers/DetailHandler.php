<?php

namespace App\Filament\Resources\EventResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\EventResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = EventResource::class;


    public function handler($id)
    {
        $model = static::getModel()::query();

        $query = QueryBuilder::for(
            $model->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        $transformer = static::getApiTransformer();
        
        return new $transformer($query);
    }
}
