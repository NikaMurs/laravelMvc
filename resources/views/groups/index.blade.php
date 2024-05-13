
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>Список всех групп</h1>
<a href="{{ route('groups.create') }}">Создать новую группу</a>
<ul>
    @foreach ($groups as $group)
        <li><a href="{{ route('groups.show', $group->id) }}">{{ $group->title }}</a></li>
    @endforeach
</ul>