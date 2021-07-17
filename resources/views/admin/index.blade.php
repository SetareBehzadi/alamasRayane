@extends('admin.layouts.master')

@include('admin.layouts.navbar')
<div class="container-fluid">
    <div class="row">
        @include('admin.layouts.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" dir="rtl">
            <div class="row mt-3">
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('awaiting.reviews') }}"><div class="card text-white bg-gradiant-green-blue mb-3" style="max-width: 18rem;">
                        <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i></span> <span class="badge badge-pill right">45</span></div>
                        <div class="card-body">
                            <h5 class="card-title BKoodakBold" style="float:right;">در انتظار بررسی</h5>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('verifying.reviews') }}"><div class="card text-white bg-juicy-orange mb-3" style="max-width: 18rem;">
                        <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i></span>  <span class="badge badge-pill right">21</span></div>
                        <div class="card-body">
                            <h5 class="card-title BKoodakBold" style="float:right;">در انتظار تایید مشتری</h5>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('cancelling.reviews') }}"><div class="card text-white bg-dracula mb-3" style="max-width: 18rem;">
                        <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i></span>  <span class="badge badge-pill right">84</span></div>
                        <div class="card-body">
                            <h5 class="card-title BKoodakBold" style="float:right;">رد شده</h5>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('confirming.reviews') }}"><div class="card text-white bg-neon-life mb-3" style="max-width: 18rem;">
                        <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i></span>  <span class="badge badge-pill right">1134</span></div>
                        <div class="card-body">
                            <h5 class="card-title BKoodakBold" style="float:right;">تکمیل شده</h5>
                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                        </div>
                    </div></a>
                </div>
            </div>
        </main>
    </div>
</div>



