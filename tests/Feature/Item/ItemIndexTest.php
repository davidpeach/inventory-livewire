<?php

namespace Tests\Feature\Item;

use App\Http\Livewire\ItemsTable;
use App\Models\Item;
use Livewire\Livewire;
use Tests\TestCase;

class ItemIndexTest extends TestCase
{
    /** @test */
    public function item_listing_table_lists_items_correctly()
    {
        [$itemA, $itemB, $itemC] = Item::factory()->count(3)->create();

        Livewire::test(ItemsTable::class)
            ->assertSee($itemA->name)
            ->assertSee($itemB->name)
            ->assertSee($itemC->name);
    }
}
