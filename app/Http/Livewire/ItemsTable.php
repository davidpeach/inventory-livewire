<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsTable extends Component
{
    use WithPagination;

    public string $search;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.items-table', [
            'items' => Item::query()
                ->select(['name'])
                ->search($this->search)
                ->paginate(10),
        ]);
    }
}
