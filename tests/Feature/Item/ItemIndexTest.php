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

    /** @test */
    public function item_listing_table_can_be_searched()
    {
        $itemA = Item::factory()->create([
            'name' => 'yes find me',
        ]);

        $itemB = Item::factory()->create([
            'name' => 'no dont find me',
        ]);

        Livewire::test(ItemsTable::class)
            ->assertSee($itemA->name)
            ->assertSee($itemB->name)
            ->set('search', 'yes')
            ->assertSee($itemA->name)
            ->assertDontSee($itemB->name)
            ->set('search', 'no dont')
            ->assertSee($itemB->name)
            ->assertDontSee($itemA->name);
    }
}
