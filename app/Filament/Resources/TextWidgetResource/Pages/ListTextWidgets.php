<?php

namespace App\Filament\Resources\TextWidgetResource\Pages;

use App\Filament\Resources\TextWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTextWidgets extends ListRecords
{
    protected static string $resource = TextWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
