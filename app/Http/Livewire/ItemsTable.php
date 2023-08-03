<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsTable extends Component
{
    use WithPagination;

    public string $search = '';

    public string $sortField = 'name';

    public bool $sortAsc = true;

    /**
     * @property array<string> $queryString
     */
    protected $queryString = [ /* @phpstan-ignore-line */
        'search',
        'sortField',
        'sortAsc',
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function sortBy(string $column): void
    {
        $this->sortAsc = ! $this->sortAsc;

        $this->sortField = $column;
    }

    public function render(): View
    {
        return view('livewire.items-table', [
            'items' => Item::query()
                ->select(['name'])
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
}
