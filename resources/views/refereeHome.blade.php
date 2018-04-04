@extends('layouts.app')

@section('head')
    {{--<link rel="stylesheet" href="/bootstrap-jalali-datepicker-master/demo/css/bootstrap.min.css" />--}}
    {{--<link rel="stylesheet" href="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.css" />--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>--}}
    {{--<script src="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.js"></script>--}}
    {{--<script src="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.fa.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--$("#datepicker4").datepicker({--}}
                {{--changeMonth: true,--}}
                {{--changeYear: true--}}
            {{--});--}}

        {{--});--}}
    {{--</script>--}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--<div class="card">--}}
                {{--<div class="card-header text-right">اضافه کردن طرح</div>--}}

                {{--<div class="card-body text-right">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--طرح اضافه کنید.--}}
                    {{--{{$projects->name}}--}}

                {{--</div>--}}
            {{--</div>--}}

            <div class="card">
                <div class="card-header text-right">{{ __(' صفحه ی داور') }}</div>
                <div class="card-body text-right" dir="rtl">
                    <ul>
                        <li><a href="{{ url('/projects/add') }}">اضافه کردن طرح</a></li>
                        <li><a href="{{ url('/projects') }}">مشاهده ی طرح های اضافه شده</a></li>
                    </ul>

                    {{--<form method="POST" action="/projects/add">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row mb-1">--}}
                            {{--<div class="col-md-6 offset-md-3">--}}
                                {{--<button type="submit" class="btn btn-primary btn-block">--}}
                                    {{--{{ __('ثبت طرح و ورود به مرحله بعد >>') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
