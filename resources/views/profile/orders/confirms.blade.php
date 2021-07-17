<div class="user-setting tab">
    <h1 class="">سفارشات نهایی</h1>
    @if(count($confirmed) > 0)
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
                @foreach($confirmed as $confirm)
                    @php
                        $dimen = explode("x",$confirm->dimensions);
                    @endphp
                    <tr>
                        <th scope="row">{{ ++$menuCounter }}</th>
                        <td><input class="form-control" type="text" value="{{ $confirm->title }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $confirm->material }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $confirm->color }}" disabled="disabled"></td>
                        <td>
                            <input class="form-control" type="text" value="{{ $dimen[0] }}" placeholder="طول" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[1] }}" placeholder="عرض" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[2] }}" placeholder="ارتفاع" disabled="disabled">
                        </td>
                        <td><input class="form-control"type="text" value="{{ $confirm->description }}" disabled="disabled"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $confirmed->links() }}
        </div>
    @else
        <p>شما هیچ سفارشی که در انتظار تایید شما باشد ندارید</p>
    @endif
</div>
