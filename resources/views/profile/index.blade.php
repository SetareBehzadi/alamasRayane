@extends('profile.layouts.master')

@section('show')
<div class="container">
    @include('profile.layouts.header')
    <div class="main-bd">
        @include('profile.layouts.left')
        <div class="right-side BKoodakBold">
            <div class="nav">
                <ul>
                    <li onclick="tabs(0)" class="user-post active"> معلق </li>
                    <li onclick="tabs(1)" class="user-review">در انتظار تایید ادمین</li>
                    <li onclick="tabs(2)" class="user-setting">در انتظار تایید شما</li>
                    <li onclick="tabs(3)" class="user-testimonials">نهایی شده </li>
                    <li onclick="tabs(4)" class="user-quotes">لغو شده </li>
                </ul>
            </div>
            <div class="profile-body BKoodakBold">
                @include('profile.orders.suspends', ['suspendeds' => $suspendeds])
                @include('profile.orders.awaites', ['awaitings' => $awaitings])
                @include('profile.orders.verifies', ['verified' => $verified])
                @include('profile.orders.confirms', ['confirmed' => $confirmed])
                @include('profile.orders.cancels', ['canceled' => $canceled])
            </div>
        </div>
    </div>
</div>
@endsection
