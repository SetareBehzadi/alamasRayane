@extends('admin.layouts.master')

@include('admin.layouts.navbar')
<div class="container-fluid">
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="container bg-transparent">
            <h1 class="BKoodakBold" style="text-align: right">سفارشات نهایی شده</h1></br>
            <table class="table table-dark">
                <thead>
                <tr>
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


