<div class="user-setting tab">
    <h1 class=""> سفارشات در انتظار تایید شما</h1>
    @if(count($verified) > 0)
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
                    <th scope="col" class="BKoodakBold">مبلغ (تومان)</th>
                    <th scope="col" class="BKoodakBold"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($verified as $verify)
                    @php
                        $dimen = explode("x",$verify->dimensions);
                    @endphp
                    <tr>
                        <th scope="row">{{ ++$menuCounter }}</th>
                        <td><input class="form-control" type="text" value="{{ $verify->title }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $verify->material }}" disabled="disabled"></td>
                        <td><input class="form-control" type="text" value="{{ $verify->color }}" disabled="disabled"></td>
                        <td>
                            <input class="form-control" type="text" value="{{ $dimen[0] }}" placeholder="طول" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[1] }}" placeholder="عرض" disabled="disabled">
                            <input class="form-control" type="text" value="{{ $dimen[2] }}" placeholder="ارتفاع" disabled="disabled">
                        </td>
                        <td><input class="form-control"type="text" value="{{ $verify->description }}" disabled="disabled"></td>
                        <td><input class="form-control"type="text" value="{{ $verify->price }}" disabled="disabled"></td>
                        <td>
                            <a href="{{ route('confirm.order', ['id' => $verify->id]) }}" title="تایید سفارش"
                               onclick="event.preventDefault();
                                document.getElementById('confirm-order').submit();">
                                <span class="checkmark">
                                    <div class="checkmark_circle"></div>
                                    <div class="checkmark_stem"></div>
                                    <div class="checkmark_kick"></div>
                                </span>
                            </a>
                            <form id="confirm-order" action="{{ route('confirm.order', ['id' => $verify->id]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="{{ route('reject.order', ['id' => $verify->id]) }}" title="لغو سفارش"
                               onclick="event.preventDefault();
                                document.getElementById('reject-order').submit();">
                                <span class="crosssign">
                                    <div class="crosssign_circle"></div>
                                    <div class="crosssign_stem"></div>
                                    <div class="crosssign_stem2"></div>
                                </span>
                            </a>
                            <form id="reject-order" action="{{ route('reject.order', ['id' => $verify->id]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $verified->links() }}
        </div>
    @else
        <p>شما هیچ سفارشی که در انتظار تایید شما باشد ندارید</p>
    @endif
</div>
