<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>Редактировать группу: {{ $group->title }}</h1>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('groups.update', $group->id) }}">
    @csrf
    @method('PUT')

    <label for="title">Название группы:</label>
    <input type="text" name="title" id="title" value="{{ $group->title }}" required>

    <label for="start_from">Дата начала:</label>
    <input type="date" name="start_from" id="start_from" value="{{ $group->start_from instanceof \Illuminate\Support\Carbon ? $group->start_from->toDateString() : $group->start_from }}" required>

    <label for="is_active">Активна:</label>
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" id="is_active" value="1" {{ $group->is_active ? 'checked' : '' }}>

    <button type="submit">Сохранить изменения</button>
</form>

<footer class="footer">
    <!-- Ссылка на страницу просмотра группы -->
    <a class="btn" href="{{ route('groups.show', $group->id) }}">Вернуться к группе</a>
    <!-- Ссылка на список всех групп -->
    <a class="btn" href="{{ route('groups.index') }}">Вернуться к списку групп</a>
</footer>
