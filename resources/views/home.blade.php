<html>
<head>
    <title>Todo List</title>
</head>
    <body>

{{--    Welcome,  {{$data->name}}--}}
    <h3>todo list</h3>
    <form action="{{route('store')}}" method="POST" >
        @csrf
        <input type="text" name="content" placeholder="add-your-todo">
        <button type="submit">Add</button>
    </form>
    @if (count($todolists))
        <ul>
            @foreach($todolists as $todolist)
                <li>
                    <form action="{{route('destroy', $todolist->id)}}" method="POST">
                        {{ $todolist->content }}
                        @csrf
                        @method('delete')
                        <button type="submit">X</button>
                    </form>
                </li>
            @endforeach
        </ul>
        @else
        <p>No tasks</p>
    @endif

    @if(count($todolists))
        You have {{count($todolists)}} pending task

    @endif
<br>

    <a href="logout">Logout</a>
</body>

</html>
