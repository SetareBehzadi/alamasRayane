<section>
    <div class="container">
        <h2 class="BKoodakBold"> سفارش ساخت لوازم چوبی</h2>

        <form method="POST" action="{{ route('new.order') }}">
            @csrf
            @include('layouts.partials.errors')
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="title" required="required" placeholder="میز تحریر چوبی">
                        <span class="text BKoodakBold">عنوان</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <select name="material" class="BKoodakBold">
                            <option value="raash">چوب راش</option>
                            <option value="afraa">چوب افرا</option>
                            <option value="gerdoo">چوب گردو</option>
                            <option value="chenaar">چوب چنار</option>
                            <option value="tabrizi">چوب تبریزی</option>
                            <option value="baloot">چوب بلوط</option>
                            <option value="momraz">چوب ممرز</option>
                            <option value="kaaj">چوب کاج</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="color" required="required" placeholder="قهوه ایی">
                        <span class="text BKoodakBold">رنگ</span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="dimensions" required="required" placeholder="15x10x5">
                        <span class="text BKoodakBold">ابعاد</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox textarea">
                        <textarea name="description"></textarea>
                        <span class="text BKoodakBold">توضیحات</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col BJadidBold" >
                    <input type="submit" value="ارسال" style="float:right">
                </div>
            </div>
        </form>
    </div>
</section>
