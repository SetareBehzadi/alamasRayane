@include('layouts.partials.errors')
<div class="profile-posts tab">
    <h1 class="">سفارشات معلق</h1>
    @if(count($suspendeds) > 0)
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
                @foreach($suspendeds as $suspended)
                    @php
                        $dimen = explode("x",$suspended->dimensions);
                    @endphp
                    <tr>
                        <th scope="row">{{ ++$menuCounter }}</th>
                        <form method="POST" action="{{ route('submit.order', ['order' => $suspended->id]) }}" class="form-group">
                            @csrf
                            <td><input class="form-control" type="text" name="title" value="{{ $suspended->title }}"></td>
                            <td><input class="form-control" type="text" name="material" value="{{ $suspended->material }}"></td>
                            <td><input class="form-control" type="text" name="color" value="{{ $suspended->color }}"></td>
                            <td>
                                <input class="form-control" type="text" name="dimen1" value="{{ $dimen[0] }}" placeholder="طول">
                                <input class="form-control" type="text" name="dimen2" value="{{ $dimen[1] }}" placeholder="عرض">
                                <input class="form-control" type="text" name="dimen3" value="{{ $dimen[2] }}" placeholder="ارتفاع">
                            </td>
                            <td><input class="form-control"type="text" name="description" value="{{ $suspended->description }}"></td>
                            <td>
                                <button class="btn btn-md BJadidBold" style="color:green">ارسال سفارش</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $suspendeds->links() }}
        </div>
    @else
        <p>شما هیچ سفارش معلقی ندارید</p>
    @endif
</div>
