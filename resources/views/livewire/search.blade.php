<div>
    <form>
        <div class="mt-2">
            <input 
                type="text" 
                class="p-4 w-full border rounded-md bg-gray-700 text-white"
                wire:model.live.debounce="searchText"
                placeholder="type something to search"
            >
        </div>
    </form>
    <div class="mt-4">
        @foreach($results as $result)
        <div class="pt-2">
            {{$result->title}}
        </div>
        @endforeach
    </div>
   
</div>
