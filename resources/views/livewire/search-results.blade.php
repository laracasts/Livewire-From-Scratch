<div class="{{ $show ? 'block' : 'hidden'}}">
    <div class="mt-4 p-4 absolute border rounded-md bg-gray-700 border-indigo-600">
        @if (count($results) == 0)
        <p>No results found.</p>
        @endif

        @foreach($results as $result)
        <div class="pt-2">
            <a href="/articles/{{$result->id}}">{{$result->title}}</a>
        </div>
        @endforeach
    </div>
</div>