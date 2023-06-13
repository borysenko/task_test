<a href="{{route('todo.show', $item->id)}}"><h2>{{ $item->title }}</h2></a>
<div>{{ $item->description }}</div>
<div>Status: {{ $item->status }}</div>
<div>Priority: {{ $item->priority }}</div>
<small>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</small>


<form action="{{ route('todo.destroy', $item->id) }}" method="POST">
    <a class="btn btn-primary" href="{{ route('todo.edit', $item->id) }}">Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" @if($item->status == 'done') disabled @endif class="btn btn-danger">Delete</button>
    <a href="{{route('todo.create', ['parent_id'=>$item->id])}}">Добавить под задание</a>
</form>
