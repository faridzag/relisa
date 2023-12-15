<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()
            ->exports([
                ExcelExport::make()
                ->fromTable()
                ->withFilename(fn ($resource) => $resource::getModelLabel() . '-' . date('Y-m-d'))
                ->withWriterType(\Maatwebsite\Excel\Excel::CSV)
                ->withColumns([
                    Column::make('updated_at'),
                ])
                ->except('poster')
            ]),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            EventResource\Widgets\StatsOverview::class,
        ];
    }
}
