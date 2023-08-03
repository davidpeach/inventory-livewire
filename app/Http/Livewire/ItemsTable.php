<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsTable extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.items-table', [
            'items' => Item::select(['name'])->paginate(10),
        ]);
    }
}
