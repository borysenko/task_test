
@if(count($parent))
    <p>Под задания:</p>
        @foreach ($parent as $item)
            <div style="margin-left: 30px;">{{ $item->title }}
                @include('todo._todo', ['post' => $item])
                @include('todo._tree', ['parent' => $item->parent])
            </div>
        @endforeach
@endif


