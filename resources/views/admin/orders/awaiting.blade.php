@extends('admin.layouts.master')

@include('admin.layouts.navbar')
<div class="container-fluid">
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="container bg-transparent">
            <h1 class="BKoodakBold" style="text-align: right">سفارشات بررسی نشده</h1></br>
            @error('price')
            <h3>{{ $message }}</h3>
            @enderror
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col" class="BKoodakBold"></th>
                    <th scope="col" class="BKoodakBold">نام کاربر</th>
                    <th scope="col" class="BKoodakBold">توضیحات</th>
                    <th scope="col" class="BKoodakBold">ابعاد</th>
                    <th scope="col" class="BKoodakBold">رنگ</th>
                    <th scope="col" class="BKoodakBold">جنس چوب</th>
                    <th scope="col" class="BKoodakBold">عنوان</th>
                    <th scope="col" class="BKoodakBold">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @php
                        $menuCounter = 0;
                        $dimen = explode("x",$order->dimensions);
                    @endphp
                    <tr>
                        <td class="BKoodakBold">
                            <form id="verify-order" action="{{ route('verify.order', ['id' => $order->id]) }}" method="POST">
                                <div class="form-group">
                                    <input type="text" name="price" class="form-control" placeholder="مبلغ (تومان)">
                                </div>
                                @csrf
                            </form>
                            <a href="{{ route('verify.order', ['id' => $order->id]) }}" title="تایید سفارش"
                               onclick="event.preventDefault();
                                document.getElementById('verify-order').submit();">
                                <span class="checkmark">
                                    <div class="checkmark_circle"></div>
                                    <div class="checkmark_stem"></div>
                                    <div class="checkmark_kick"></div>
                                </span>
                            </a>
                            <a href="{{ route('ignore.order', ['id' => $order->id]) }}" title="لغو سفارش"
                               onclick="event.preventDefault();
                                document.getElementById('ignore-order').submit();">
                                <span class="crosssign">
                                    <div class="crosssign_circle"></div>
                                    <div class="crosssign_stem"></div>
                                    <div class="crosssign_stem2"></div>
                                </span>
                            </a>
                            <form id="ignore-order" action="{{ route('ignore.order', ['id' => $order->id]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </td>
                        <td class="BKoodakBold">{{ $order->user->name }}</td>
                        <td class="BKoodakBold">{{ $order->description }}</td>
                        <td class="BKoodakBold">
                            <span class="BKoodakBold" style="color:cyan;">طول:</span> {{ $dimen[0] }} </br>
                            <span class="BKoodakBold" style="color:cyan;">عرض:</span> {{ $dimen[1] }} </br>
                            <span class="BKoodakBold" style="color:cyan;">ارتفاع:</span> {{ $dimen[2] }} </br>
                        </td>
                        <td class="BKoodakBold">{{ $order->color }}</td>
                        <td class="BKoodakBold">{{ $order->material }}</td>
                        <td class="BKoodakBold">{{ $order->title }}</td>
                        <th scope="row" class="BKoodakBold">{{ ++$menuCounter }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
</div>


