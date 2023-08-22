<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItems extends ListRecords
{
    protected static string $resource = ItemResource::class;

    /** @phpstan-ignore-next-line */
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
