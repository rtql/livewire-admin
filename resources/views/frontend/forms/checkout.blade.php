@extends('layouts.base')
@section('content')
<section class="personal_page_section">
    <div class="container">
        <div class="reservations_block mt-0 col-12">

            <div class="reservations_status_block">
                <p class="reservations_status_block__text">{{booking_start_time()}} — {{booking_end_time()}}  համար գտնվել է արդյունք</p>
            </div>
            <div class="row reservations_row">
                <h3 class="reservations_head_block__title mt-4 m-0">Ստանդարտ երկտեղանոց սենյակ</h3>
                <div class="col-12 py-2 px-1 p-xl-2">
                        <div class="reservations_row__item d-flex flex-wrap">
                        <div class="col-12 col-lg-6">
                            <img class="w-100" src="{{asset('frontend//img/reservations-card.png')}}" alt="">
                            @if(count($room->amenities))
                            <div class="amenities_block mt-4 mt-lg-5 position-static bg-transparent p-0" style="box-shadow: unset">
                                <p class="pb-1">Հարմարություններ</p>
                                @foreach($room->amenities as $amenity)
                                <div class="amenities_block__item d-flex mt-2">
                                    <img src="{{asset('images/rooms')}}/{{$amenity->logo}}" alt="">
                                    <p class="ps-2">{{$amenity->title ?? ''}}</p>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="editer pt-2 editer_ul_state">
                                {!! $item->description ?? null !!}
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 reservations_info_block pt-2 ps-0 ps-lg-4 ps-xl-5">
                            <form action="{{route('place.order')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="reservations_info d-flex py-2 py-xl-3">
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Մուտքի ամսաթիվ</p>
                                    <span>{{booking_start_time() ?? ''}}</span>
                                </div>
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>էլքի ամսաթիվ</p>
                                    <span>{{booking_end_time() ?? ''}}</span>
                                </div>
                                <div class="reservations_info__item flex-grow-1">
                                    <p>Համարի տեսակը</p>
                                    <span>{{$room->title ?? ''}}</span>
                                </div>
                            </div>
                            <div class="reservations_info d-flex py-2 py-xl-3">
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Գին/ օր</p>
                                    <span>{{booking_season_price()}}<sub>Դ</sub></span>
                                </div>
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Մեծահասակներ</p>
                                    <span>{{booking_adult_count()}}</span>
                                </div>
                                <div class="reservations_info__item flex-grow-1">
                                    <p>Երեխաներ մինչև 6-12</p>
                                    <span>{{booking_smallChild_count()}}</span>
                                </div>
                            </div>
                            <div class="reservations_info d-flex py-2 py-xl-3">
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Երեխաներ մինչև 12-16</p>
                                    <span>{{booking_highChild_count()}}</span>
                                </div>
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Մուտքի ժամ</p>
                                    <span>14:00 </span>
                                </div>
                                <div class="reservations_info__item flex-grow-1">
                                    <p>Ելքի ժամ</p>
                                    <span>12:00 </span>
                                </div>
                            </div>
                            <div class="reservations_info d-flex py-2 py-xl-3">
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Ընդհամենը</p>
                                    <span>{{booking_total()}}<sub>Դ</sub></span>
                                </div>
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <p>Վճարման եղանակը</p>
                                    <img src="{{asset('frontend/img/idram-icon.png')}}" alt="">
                                </div>
                                <div class="reservations_info__item flex-grow-1"></div>
                            </div>
                            <div class="reservations_info d-flex py-2 py-xl-3 border-0">
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <input {{booking_extra_bed_bool() ? 'checked' : ''}} type="checkbox"  name="checkbox" id="check" class="me-1">
                                    <label for="check">Էքստրա բեդ</label>
                                </div>
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <span>{{booking_extra_bed_price()}}<sub>Դ</sub></span>
                                </div>
                                <div class="reservations_info__item flex-grow-1 me-2"></div>
                            </div>
{{--                            <div class="reservations_info d-flex py-2 py-xl-3 border-0">--}}
{{--                                <div class="reservations_info__item flex-grow-1 me-2">--}}
{{--                                    <p>Ընդհամենը</p>--}}
{{--                                    <span>{{booking_total()}}<sub>Դ</sub></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="reservations_info d-flex py-2 py-xl-3">
                                <div class="reservations_info__item flex-grow-1 me-2">
                                    <input type="checkbox" required name="privacy" id="check" class="me-1">
                                    <a href="#">Համաձայն եմ <span class="agree_color">օգտագործման պայմաններին</span></a>
                                </div>
                            </div>
{{--                            <div class="reservations_info d-flex py-2 py-xl-3">--}}
{{--                                <div class="reservations_info__item flex-grow-1 me-2">--}}
{{--                                    <p>Ընտրեք վճարման եղանակը</p>--}}
{{--                                    <div class="payment_method mt-2">--}}
{{--                                        <div class="payment_method_item mb-2">--}}
{{--                                            <input type="radio" name="payment_type" value="1" class="me-2 pay_input" id="pay-chack">--}}
{{--                                            <label for="pay-chack">--}}
{{--                                                <img src="{{asset('frontend//img/arca.png')}}" alt="" class="me-1">--}}
{{--                                                <img src="{{asset('frontend//img/visa.png')}}" alt="" class="me-1">--}}
{{--                                                <img src="{{asset('frontend//img/mastercard.png')}}" alt="" class="me-1">--}}
{{--                                                <img src="{{asset('frontend//img/maestro.png')}}" alt="">--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="payment_method_item mb-2">--}}
{{--                                            <input type="radio" name="payment_type" value="1" class="me-2 pay_input" id="pay-chack1">--}}
{{--                                            <label for="pay-chack1">--}}
{{--                                                <img src="{{asset('frontend//img/idram-icon.png')}}" alt="" class="me-1">--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="payment_method_item">--}}
{{--                                            <input type="radio" name="payment_type" value="0" class="me-2 pay_input" id="pay-chack2">--}}
{{--                                            <label for="pay-chack2"> Վճարել տեղում</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="notification_block mt-2">--}}
{{--                                <p class="notification_block__title mb-1">Ծանուցում․</p>--}}
{{--                                <p class="notification_block__text">վճարել տեղում մեթոդի դեպքում  հյուրանոցը չի երաշխավորում համարի ․․․․</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 my-3">--}}
{{--                                <button class="pay_btn w-100" type="submit">Վճարել</button>--}}
{{--                            </div>--}}
                                <div class="col-12 my-3">
                                    <button class="pay_btn w-100" type="submit">Ուղարկել հաստատման</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</section>
@endsection
