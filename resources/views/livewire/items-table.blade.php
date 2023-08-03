<div>
    <input type="search" wire:model="search" />
    <table class="w-full">
        <thead>
            <tr>
                <th class="bg-blue-100 border text-left px-8 py-4">NAME</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td class="border text-left px-8 py-4">{{ $item->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $items->links() }}
    </div>
</div>
