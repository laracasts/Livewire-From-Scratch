<div>
    <form>
        <div class="mt-2">
            <input 
                type="text" 
                class="p-4 w-9/12 border rounded-md bg-gray-700 text-white"
                wire:model.live.debounce="searchText"
                placeholder="{{$placeholder}}"
            >

            <button class="text-white font-medium rounded-md p-4 disabled:bg-indigo-400 bg-indigo-600"
                wire:click.prevent="clear()"
                {{ empty($searchText) ? 'disabled' : '' }}
            >
                Clear
            </button>
        </div>
    </form>
    <livewire:search-results :results="$results" :show="!empty($searchText)">
   
</div>
