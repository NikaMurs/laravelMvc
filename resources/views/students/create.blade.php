<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>Добавить студента в группу: {{ $group->title }}</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('groups.students.store', $group) }}">
    @csrf
    <label for="surname">Фамилия:</label>
    <input type="text" name="surname" id="surname" required>
    <label for="name">Имя:</label>
    <input type="text" name="name" id="name" required>
    <button class="btn"  type="submit">Добавить студента</button>
</form>

<footer class="footer">
    <!-- Ссылка на страницу просмотра группы -->
    <a class="btn" href="{{ route('groups.show', $group->id) }}">Вернуться к группе</a>
    <!-- Ссылка на список всех групп -->
    <a class="btn" href="{{ route('groups.index') }}">Вернуться к списку групп</a>
</footer>