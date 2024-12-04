<?php

namespace App\Filament\Resources\RepairHistoryResource\Pages;

use App\Filament\Resources\RepairHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRepairHistories extends ListRecords
{
    protected static string $resource = RepairHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
