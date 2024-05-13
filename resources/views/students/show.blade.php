<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>Информация о студенте</h1>
<p>Фамилия: {{ $student->surname }}</p>
<p>Имя: {{ $student->name }}</p>
<p>Группа: {{ $student->group->title }}</p>

<footer class="footer">
  <!-- Ссылка на страницу просмотра группы -->
  <a class="btn" href="{{ route('groups.show', $group->id) }}">Вернуться к группе</a>
  <!-- Ссылка на список всех групп -->
  <a class="btn" href="{{ route('groups.index') }}">Вернуться к списку групп</a>
</footer>