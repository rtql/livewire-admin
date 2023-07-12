<?php

use App\Models\Room;
use Illuminate\Support\Facades\Session;

if (! function_exists('get_room_numbers')) {

    function get_room_numbers($room)
    {
        return Room::whereParentId($room)->get();
    }
}



if (! function_exists('booking_start_time')) {

    function booking_start_time()
    {
        return Session::get('bookingQuery.start_time') ?? null;
    }
}

if (! function_exists('booking_end_time')) {

    function booking_end_time()
    {
        return Session::get('bookingQuery.end_time') ?? null;
    }
}
if (! function_exists('booking_diff_in_days')) {
    function booking_diff_in_days()
    {
        return Session::get('bookingQuery.diffDays') ?? null;
    }
}
if (! function_exists('booking_room_id')) {

    function booking_room_id()
    {
        return Session::get('bookingQuery.room_id') ?? null;
    }
}
if (! function_exists('booking_adult_count')) {

    function booking_adult_count()
    {
        return Session::get('bookingQuery.adult.count') ?? null;
    }
}
if (! function_exists('booking_season_price')) {

    function booking_season_price()
    {
        return Session::get('bookingQuery.adult.price') ?? null;
    }
}
if (! function_exists('booking_adult_price')) {

    function booking_adult_price()
    {
        return Session::get('bookingQuery.adult.price') ?? null;
    }
}
if (! function_exists('booking_smallChild_count')) {

    function booking_smallChild_count()
    {
        return Session::get('bookingQuery.smallChild.count') ?? null;
    }
}
if (! function_exists('booking_smallChild_price')) {

    function booking_smallChild_price()
    {
        return Session::get('bookingQuery.smallChild.price') ?? null;
    }
}
if (! function_exists('booking_highChild_count')) {

    function booking_highChild_count()
    {
        return Session::get('bookingQuery.highChild.count') ?? null;
    }
}
if (! function_exists('booking_highChild_price')) {

    function booking_highChild_price()
    {
        return Session::get('bookingQuery.highChild.price') ?? null;
    }
}
if (! function_exists('booking_extra_bed_bool')) {

    function booking_extra_bed_bool()
    {
        return Session::get('bookingQuery.extra_bed.bool') ?? null;
    }
}
if (! function_exists('booking_extra_bed_price')) {

    function booking_extra_bed_price()
    {
        return Session::get('bookingQuery.extra_bed.price') ?? null;
    }
}
if (! function_exists('booking_total')) {

    function booking_total()
    {
        return Session::get('bookingQuery.total') ?? null;
    }
}
if (! function_exists('getTransactonStatus')) {

    function getTransactionStatus($value)
    {
        $transaction = \App\Models\Transaction::whereId($value)->first();
        if ($transaction->status == 'success'){
            return 'Confirmed';
        }elseif ($transaction->status == 'canceled')
        {
            return 'Canceled';
        }
        elseif ($transaction->status == 'sent')
        {
            return 'In Progress';
        }
        return  '';
    }
}
