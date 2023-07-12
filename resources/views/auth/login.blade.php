@extends('layouts.base')

@section('content')


    <main>
        <section class="page_section">
            <img src="{{asset('frontend/img/page-img.png')}}" alt="" class="w-100">
            <div class="container">
                <div class="pages_name_block">
                    <h1 class="pages_name_block__title mb-0 mb-lg-2">Մուտք</h1>
                    <ul class="bread_crumbs d-flex flex-wrap justify-content-center">
                        <li class="bread_crumbs__item"><a href="" class="bread_crumbs_active">Գլխավոր </a></li>
                        <li class="bread_crumbs__item"><a href="">Մուտք</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="sing_in_section">
            <div class="container">
                <div class="col-12 col-lg-8 sing_in_block">
                    <h5 class="sing_in_title pb-1 pb-sm-4">Մուտք</h5>
                    <form class="contacts__form ps-1 ps-sm-2" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="contacts__group col-12 col-sm-6 mb-4">
                                <input class="contacts__input @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label class="contacts__label">Էլ․հասցե * </label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="contacts__group col-12 col-sm-6 mb-2 mb-sm-4">
                                <input class="contacts__input @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                <label class="contacts__label">Գաղտնաբառ *</label>
                                <div class="contacts__bar"></div>
                            </div>
                            <div class="col-12 ">
                                <a href="{{ route('password.request') }}" class="info_about_sing_in">Մոռացե՞Լ եք գաղտնաբառը?</a>
                            </div>
                            <div class="col-12 mt-4 d-block d-sm-flex">
                                <button class="sing_in__form_btn w-100 me-0 me-sm-3">Մուտք</button>
                                <a href="{{route('register')}}" class="register__form_btn w-100 mt-2 mt-sm-0 d-block">Գրանցվել</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
