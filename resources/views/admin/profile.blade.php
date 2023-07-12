@extends('layouts.admin')
@section('content')
@if(request()->routeIs('admin.change.password'))
    <livewire:admin.profile.change-password-component/>
@endif
@endsection
