<?php

namespace App\Filament\Resources\SaudaraResource\Pages;

use App\Filament\Resources\SaudaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaudara extends EditRecord
{
    protected static string $resource = SaudaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
