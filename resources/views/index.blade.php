@extends('layouts.master')

@section('title', 'وبسایت ازمایشی - صفحه اصلی')

@section('content')
<div id="container">
    <header>
        @include('layouts.navbar')
    </header>
    <div id="banner">
    </div>
    <div id="content">
        @include('layouts.order')
    </div>
</div>
@endsection
