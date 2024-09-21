<div>
    <form>
        <div class="mt-2">
            <input
                type="text"
                class="p-4 w-full border rounded-md bg-gray-700 text-white"
                wire:model.live.debounce="searchText"
                placeholder="{{$placeholder}}"
                wire:offline.attr="disabled"
            >
        </div>
    </form>

    @if(!empty($searchText))
        <div wire:transition>
            <livewire:search-results :results="$results">
        </div>
    @endif
</div>
