@extends('layouts.app')
@section('content')
    <main>
        <section class="error">
            <div class="wrapper wrapper--error">
                <div class="error__breadcrumb breadcrumb">
                    <a href="{{ route('landing') }}">
                        <p>{{ __('frontend.Main') }}</p>
                    </a>
                </div>
                <div class="error__inner">
                    <div class="error__title">
                        <p>{{ __('frontend.Page not found') }}</p>
                    </div>
                    <div class="error__message">
                        <p>{{ __('frontend.Try to return') }}</p>
                    </div>
                    <img class="error__image" src="{{ asset('files/errors/500.png') }}" alt="">
                    <a class="error__button" href="{{ route('landing') }}">
                        <p>{{ __('frontend.Back to main page') }}</p>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
