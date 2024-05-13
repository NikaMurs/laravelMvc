<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>{{ $group->title }}</h1>
<a class="btn"  href="{{ route('groups.edit', $group->id) }}">Редактировать</a>
<p>Дата начала: {{ $group->start_from }}</p>
<p>Статус: {{ $group->is_active ? 'Активна' : 'Неактивна' }}</p>
<form action="{{ route('groups.destroy', $group->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn"  type="submit">Удалить группу</button>
</form>
<h2>Студенты в группе:</h2>
<!-- <ul>
    @foreach ($group->students as $student)
        <li>{{ $student->name }} {{ $student->surname }}</li>
    @endforeach
</ul> -->
<ul>
    @foreach ($group->students as $student)
        <li><a href="{{ route('groups.students.show', [$group->id, $student->id]) }}">{{ $student->name }} {{ $student->surname }}</a></li>
    @endforeach
</ul>
<a class="btn" href="{{ route('groups.students.create', $group->id) }}">Добавить студента</a>

<footer class="footer">
    <!-- Ссылка на список всех групп -->
    <a class="btn" href="{{ route('groups.index') }}">Вернуться к списку групп</a>
</footer>