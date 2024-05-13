
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>Создать новую группу</h1>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('groups.store') }}">
    @csrf
    <label for="title">Название группы:</label>
    <input type="text" name="title" id="title" required>

    <label for="start_from">Дата начала:</label>
    <input type="date" name="start_from" id="start_from" required>

    <label for="is_active">Активна:</label>
    <input type="hidden" name="is_active" value="0"> <!-- Гарантирует отправку false, если checkbox не отмечен -->
    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>

    <button class="btn" type="submit">Создать группу</button>
</form>

<footer class="footer">
    <!-- Ссылка на список всех групп -->
    <a class="btn" href="{{ route('groups.index') }}">Вернуться к списку групп</a>
</footer>