@extends('layouts.app2')

@section('title', 'Главная страница')

@section('content')
    <div class="site-container">
        <h1 class="page-title mt-5 mb-4">Достопримечательности</h1>

        <div class="d-flex flex-wrap">
            @forelse($attractions as $attraction)
                <div class="col-md-3 mb-4 custom-card">
                    <img src="{{ asset($attraction->photo) }}" class="card-image" alt="{{ $attraction->attraction }}">
                    <div class="card-body">
                        <h5 class="card-heading">{{ $attraction->attraction }}</h5>
                        <p class="card-description">Регион: {{ $attraction->region }}</p>
                        <p class="card-description">Тип: {{ $attraction->attractionType }}</p>
                        @guest
                            <div class="alert alert-danger" role="alert">
                                Доступно для авторизованных пользователей.
                            </div>
                        @else
                            <a href="{{ route('attractions.show', $attraction->id) }}" class="custom-btn-primary">Подробнее</a>
                        @endguest
                    </div>
                </div>

                {{-- Added conditional operator to create a new row --}}
                @if($loop->iteration % 8 == 0)
                    </div><div class="row">
                @endif
            @empty
                <p class="col-12 center-text">Нет доступных достопримечательностей.</p>
            @endforelse
        </div>
    </div>
@endsection
