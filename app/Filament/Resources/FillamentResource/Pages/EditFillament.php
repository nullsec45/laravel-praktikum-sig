<?php

namespace App\Filament\Resources\FillamentResource\Pages;

use App\Filament\Resources\FillamentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFillament extends EditRecord
{
    protected static string $resource = FillamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
