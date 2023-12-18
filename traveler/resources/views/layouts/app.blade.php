@extends('layouts/app2')

@section('title', 'Главная страница')

@section('content')

<style>
    .profile-container {
        padding: 1rem;
        background-color: #f4f4f4;
        border: 1px solid #ddd;
        border-radius: 0.25rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 0 auto;
    }

    .profile-header {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 1rem;
    }

    .profile-details-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 0.5rem;
    }

    .profile-details-label {
        font-weight: 500;
        width: 6rem;
        color: #333;
    }

    .profile-details-value {
        margin-left: 1rem;
        color: #666;
    }

    .logout-container {
        margin-top: 1.5rem;
        display: flex;
        justify-content: center; /* Центрирование по горизонтали */
        align-items: center; /* Центрирование по вертикали */
    }

    .logout-button {
        padding: 0.5rem 1rem;
        background-color: #ff5252;
        color: #fff;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .logout-button:hover {
        background-color: #ff4040;
    }
</style>


<div class="profile-container">
   <div class="profile-header">Профиль пользователя</div>
    <div class="profile-details">
        <div class="profile-details-item">
            <span class="profile-details-label">Имя:</span>
            <span class="profile-details-value">{{ Auth::user()->name }}</span>
        </div>
        <div class="profile-details-item">
            <span class="profile-details-label">Почта:</span>
            <span class="profile-details-value">{{ Auth::user()->email }}</span>
        </div>
      </div>
    </div>
</div>


<div class="logout-container">
    <div class="space-y-1">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">{{ __('Выйти') }}</button>
        </form>
    </div>
</div>
@endsection