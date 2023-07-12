@extends('layouts.base')

@section('content')

    <main>
        <section class="page_section">
            <img src="{{asset('frontend/img/page-img.png')}}" alt="" class="w-100">
            <div class="container">
                <div class="pages_name_block">
                    <h1 class="pages_name_block__title mb-0 mb-lg-2">Գրանցվել</h1>
                    <ul class="bread_crumbs d-flex flex-wrap justify-content-center">
                        <li class="bread_crumbs__item"><a href="/" class="bread_crumbs_active">Գլխավոր </a></li>
                        <li class="bread_crumbs__item"><a href="{{route('register')}}">Գրանցվել</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="register_section">
            <div class="container">
                <div class="col-12 col-md-10 register_block">
                    <h5 class="register_title pb-1 pb-sm-4">Գրանցվել</h5>
                    <form class="contacts__form ps-1 ps-sm-2" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="contacts__group col-12 col-sm-6 mb-4">
                                <input class="contacts__input @error('name') is-invalid @enderror" type="text" name="name" required>
                                <label class="contacts__label">Անուն * </label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="contacts__group col-12 col-sm-6 mb-4">
                                <input class="contacts__input @error('email') is-invalid @enderror" type="email" name="email" required>
                                <label class="contacts__label">Էլ․հասցե * </label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="contacts__group col-12 col-sm-6 mb-4">
                                <input class="contacts__input" type="number" name="phone" required>
                                <label class="contacts__label">Հեռ․*</label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="contacts__group col-12 col-sm-6 mb-4">
                                <input class="contacts__input @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                                <label class="contacts__label">Գաղտնաբառ *</label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="contacts__group col-12 col-sm-6 mb-3 mb-sm-4">
                                <input class="contacts__input" type="password"  name="password_confirmation" required autocomplete="new-password">
                                <label class="contacts__label">Գաղտնաբառ կրկնում *</label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="col-12">
                                <input type="checkbox" name="checkbox" class="input_about_register" required>
                                <a href="#" class="info_about_register">Սեղմելով «գրանցվել» կոճակը, ես համաձայնվում եմ օգտատիրոջ տվյալների մշակման քաղաքականության հետ:</a>
                            </div>
                            <div class="col-12 mt-4">
                                <button class="register__form_btn w-100">Գրանցվել</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

{{--    //--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
