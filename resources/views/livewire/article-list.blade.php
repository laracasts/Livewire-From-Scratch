<div class="m-auto w-1/2 mb-4">
    <div class="mb-3 flex justify-between items-center">
        <a
            href="/dashboard/articles/create"
            class="text-blue-500 hover:text-blue-700"
            wire:navigate
        >
            Create Article
        </a>
        <div>
            <button class="text-gray-200 p-2 bg-blue-700 hover:bg-blue-900 rounded-sm"
                wire:click="showAll()"
            >
                Show All
            </button>
            <button class="text-gray-200 p-2 bg-blue-700 hover:bg-blue-900 rounded-sm"
                wire:click="showPublished()"
            >
                Show Published (<livewire:published-count placeholder-text="loading" />)
            </button>
        </div>


    </div>
    <div class="my-3">
        {{$articles->links()}}
    </div>
    <table class="w-full">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr wire:key="{{$article->id}}" class="border-b bg-gray-800 border-gray-700">
                    <td class="px-6 py-3">{{$article->title}}</td>
                    <td class="px-6 py-3">
                        <a class="text-gray-200 p-2"
                            href="/dashboard/articles/{{$article->id}}/edit"
                            wire:navigate
                        >
                            Edit
                        </a>
                        <button class="text-gray-200 p-2 bg-red-700 hover:bg-red-900 rounded-sm"
                            wire:click="delete({{$article->id}})"
                            wire:confirm="Are you sure you want to delete this article?"
                        >
                            Delete
                        </button>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$articles->links()}}
    </div>
</div>
