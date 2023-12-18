@extends('layouts/app')

@section('title', 'Добавление достопримечательности')

@section('content')
        <h1>Добавление достопримечательности</h1>

    @if ($errors->any())
        <div>
            <strong>Ошибка!</strong> Пожалуйста, проверьте введенные данные.
        </div>
    @endif

        <form action="/attractions" method="post" enctype="multipart/form-data">
        @csrf
        <label for="attraction">Достопримечательность:</label>
        <input type="text" id="attraction" name="attraction" required>
        <br>

        <label for="region">Регион:</label>
        <select id="region" name="region" required>
            <option value="Ош">Ош</option>
            <option value="Баткен">Баткен</option>
            <option value="Чуй">Чуй</option>
            <option value="Жалал-Абад">Жалал-Абад</option>
            <option value="Ыссык-Кол">Ыссык-Кол</option>
            <option value="Нарын">Нарын</option>
            <option value="Талас">Талас</option>
        </select>
        <br>


        <label for="attractionType">Тип достопримечательности:</label>
        <select id="attractionType" name="attractionType" required>
            <option value="Историческое место">Историческое место</option>
            <option value="Памятники и статуи">Памятники и статуи</option>
            <option value="Природная красота">Природная красота</option>
            <option value="Современные архитектурные объекты">Современные архитектурные объекты</option>
            <option value="Религиозные места">Религиозные места</option>
            <option value="Этнографические объекты">Этнографические объекты</option>
        </select>
        <br>

        <label for="information">Информация:</label>
        <textarea id="information" name="information"></textarea>
        <br>

        <label for="photo">Фото:</label>
         <input type="file" id="photo" name="photo">
         <br>

        <button type="submit">Добавить достопримечательность</button>
    </form>
@endsection