@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="page-title mt-5 mb-4">{{ $attraction->attraction }}</h1>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <p><strong>Регион:</strong> {{ $attraction->region }}</p>
                <p><strong>Тип достопримечательности:</strong> {{ $attraction->attractionType }}</p>
                <p><strong>Информация:</strong> {{ $attraction->information }}</p>

                @if ($attraction->photo)
                    <div class="text-center">
                        <img src="{{ asset($attraction->photo) }}" alt="{{ $attraction->attraction }}" class="img-fluid rounded">
                    </div>
                @endif
            </div>

            {{-- Добавляем сюда блок для карты 2ГИС --}}
            <p class="text-center">Геолакация достопримечательности в 2gis</p>
            @if ($attraction->latitude && $attraction->longitude)
            <div class="text-center">
                <div id="map" style="height: 400px;"></div>
            </div>
                {{-- Подключаем библиотеку 2ГИС --}}
                <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>

                {{-- Инициализация карты --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        DG.then(function () {
                            var map = DG.map('map', {
                                center: [{{ $attraction->latitude }}, {{ $attraction->longitude }}],
                                zoom: 16
                            });

                            // Добавление метки на карту
                            DG.marker([{{ $attraction->latitude }}, {{ $attraction->longitude }}]).addTo(map);
                        });
                    });
                </script>
                @endif
        </div>
    </div>
</div>
@endsection

