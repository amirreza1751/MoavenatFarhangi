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

            <div class="card">
                <div class="card-header text-right">
                    <div class="float-right">اضافه کردن انجمن</div>
                    <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="/forums/new">
                        @csrf
                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <input id="college-name" type="text" class="form-control text-right" name="name"  required autofocus>


                            </div>
                            <label for="college-name" class="col-sm-2 col-form-label text-md-right">{{ __('نام انجمن') }}</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <select name="college_id" id="college_id" class="form-control text-right">
                                    @foreach($colleges as $college)
                                        <option value="{{$college->id}}"> {{$college->name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <label for="college_id" class="col-sm-2 col-form-label text-md-right">{{ __('نام دانشکده‌ی مربوطه') }}</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <textarea name="forum_history" id="" cols="30" rows="10" class="form-control text-right"></textarea>
                                @if ($errors->any())
                                    <span class="invalid-feedback">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                            <label for="college-name" class="col-sm-2 col-form-label text-md-right">{{ __('تاریخچه‌ی انجمن') }}</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <textarea name="forum_statute" id="" cols="30" rows="10" class="form-control text-right"></textarea>

                                @if ($errors->any())
                                    <span class="invalid-feedback">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                            <label for="college-name" class="col-sm-2 col-form-label text-md-right">{{ __('اساسنامه‌ی انجمن') }}</label>
                        </div>
                        
                        <div class="form-group row mb-1">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('ثبت انجمن و ورود به مرحله بعد >>') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
