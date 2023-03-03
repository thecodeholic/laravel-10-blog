<?php

namespace App\Filament\Resources\TextWidgetResource\Pages;

use App\Filament\Resources\TextWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTextWidget extends ViewRecord
{
    protected static string $resource = TextWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
