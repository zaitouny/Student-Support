<?php

namespace App\Filament\Resources\AssistantResource\Pages;

use App\Filament\Resources\AssistantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssistant extends ViewRecord
{
    protected static string $resource = AssistantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
