@if(count($childrens))
    <p>Под задания:</p>
        @foreach ($childrens as $item)
            <div style="margin-left: 30px;">{{ $item->title }}
                @include('todo._todo', ['post' => $item])
                @include('todo._tree', ['childrens' => $item->childrens])
            </div>
        @endforeach
@endif


