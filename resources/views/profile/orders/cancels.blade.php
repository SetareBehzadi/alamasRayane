<div class="user-setting tab">
    <h1 class="">سفارشات لفو شده</h1>
    @if(count($canceled) > 0)
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
                @foreach($canceled as $cancel)
                    @php
                        $dimen = explode("x",$cancel->dimensions);
                    @endphp
                    <tr>
                        <th scope="row">{{ ++$menuCounter }}</th>
                        <td><input class="form-control" type="text" value="{{ $cancel->title }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $cancel->material }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $cancel->color }}" disabled="disabled"></td>
                        <td>
                            <input class="form-control" type="text" value="{{ $dimen[0] }}" placeholder="طول" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[1] }}" placeholder="عرض" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[2] }}" placeholder="ارتفاع" disabled="disabled">
                        </td>
                        <td><input class="form-control"type="text" value="{{ $cancel->description }}" disabled="disabled"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $canceled->links() }}
        </div>
    @else
        <p>شما هیچ سفارشی که لغو شده باشد ندارید</p>
    @endif
</div>
