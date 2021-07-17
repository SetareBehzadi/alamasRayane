<div class="profile-reviews tab">
    <h1 class="">سفارشات در انتظار تایید</h1>
    @if(count($awaitings) > 0)
        <div class="container">
            <table class="table table-sm">
                <thead>
                @php
                    $menuCounter = 0;
                @endphp
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="BKoodakBold">عنوان</th>
                    <th scope="col" class="BKoodakBold">جنس چوب</th>
                    <th scope="col" class="BKoodakBold">رنگ</th>
                    <th scope="col" class="BKoodakBold">ابعاد</th>
                    <th scope="col" class="BKoodakBold">توضیحات</th>
                    <th scope="col" class="BKoodakBold"></th>
                </tr>
                </thead>
                <tbody>
               {{-- @php
                dd($awaitings); @endphp--}}
                @foreach($awaitings as $awaiting)
                    @php

                        $dimen = explode("*",$awaiting->dimensions);
                    @endphp
                    <tr>
                        <th scope="row">{{ ++$menuCounter }}</th>
                        <td><input class="form-control" type="text" value="{{ $awaiting->title }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $awaiting->material }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $awaiting->color }}" disabled="disabled"></td>
                        <td>
                            <input class="form-control" type="text" value="{{ $dimen[0] }}" placeholder="طول" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[1] }}" placeholder="عرض" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[2] }}" placeholder="ارتفاع" disabled="disabled">
                        </td>
                        <td><input class="form-control"type="text" value="{{ $awaiting->description }}" disabled="disabled"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $awaitings->links() }}
        </div>
    @else
        <p>شما هیچ سفارشی که در انتظار تایید باشد ندارید</p>
    @endif
</div>
