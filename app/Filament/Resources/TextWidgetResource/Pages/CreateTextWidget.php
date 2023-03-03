<?php

namespace App\Filament\Resources\TextWidgetResource\Pages;

use App\Filament\Resources\TextWidgetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTextWidget extends CreateRecord
{
    protected static string $resource = TextWidgetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
