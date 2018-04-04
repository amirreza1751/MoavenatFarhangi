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
                    <div class="card-header text-right">
                        <div class="float-right">اضافه کردن طرح</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/projects/new">
                        @csrf

                        <table class="table table-bordered table-hover text-center" dir="rtl">
                        <thead>
                        <tr>
                        <th scope="col" colspan="5">مشخصات طرح</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td scope="row" >عنوان طرح:</td>
                        <td colspan="1"><input type="text" name="name" max="191" class="form-control"></td>
                        <td >شماره نامه</td>
                        <td  colspan="2"><input type="text" name="letter_number" max="191" class="form-control" ></td>
                        </tr>
                        <tr>
                        <td scope="row">انجمن برگزار کننده:</td>
                        <td colspan="1">
                        <select name="forum_name" id="" class="custom-select">
                        <option selected disabled value="">انتخاب کنید.</option>
                        @foreach($forums as $forum)
                        <option value="{{$forum->name}}">{{$forum->name}}</option>
                        @endforeach
                        </select>
                        </td>
                        <td colspan="1">مکان برگزاری:</td>
                        <td colspan="2"><input type="text" name="place" class="form-control"></td>
                        </tr>

                        <tr>
                        <td scope="row">تاریخ شروع:</td>
                        <td colspan="1"><input type="text" placeholder="روز/ماه/سال"  name="start_date" class="form-control" ></td>
                        <td >ساعت شروع:</td>
                        <td colspan="2"><input type="text" placeholder="دقیقه:ساعت" name="start_time" class="form-control"></td>
                        </tr>
                        <tr>
                        <td scope="row">تاریخ پایان:</td>
                        <td colspan="1"><input type="text" placeholder="روز/ماه/سال" name="end_date" class="form-control"></td>
                        <td>ساعت پایان:</td>
                        <td colspan="2"><input type="text" placeholder="دقیقه:ساعت" name="end_time" class="form-control"></td>
                        </tr>

                        <tr>
                        <td scope="row" width="15%">نوع طرح</td>
                        <td>
                        <select name="type" id="" class="custom-select">
                        <option selected disabled value="">انتخاب کنید.</option>
                        <option value="آموزشی">آموزشی</option>
                        <option value="پژوهشی">پژوهشی</option>
                        </select>
                        </td>

                        <td >سطح برگزاری</td>
                        <td >
                        <select name="level" id="" class="custom-select">
                        <option selected disabled value="">انتخاب کنید.</option>
                        <option value="دانشگاهی">دانشگاهی</option>
                        <option value="استانی">استانی</option>
                        <option value="کشوری">کشوری</option>
                        </select>
                        </td>
                        </tr>

                        <tr>
                        <td scope="row">هدف و ضرورت اجرای طرح</td>
                        <td colspan="5"><textarea name="purpose" id="" cols="30" rows="8" class="form-control"></textarea></td>
                        </tr>

                        <tr>
                        <td scope="row">پیش بینی تعداد میهمان یا شرکت کننده:</td>
                        <td ><input type="number" name="capacity" min="0"  class="form-control"></td>
                        <td scope="row">مجموع ساعات:</td>
                        <td ><input type="number" name="total_hours" min="0"  class="form-control"></td>
                        </tr>
                        <tr>
                        <td scope="row">استاد یا سخنران (به همراه رزومه و شماره تماس و ایمیل):</td>
                        <td colspan="5"><textarea name="master" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                        <td scope="row">توضیحات:</td>
                        <td colspan="5"><textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                        <td scope="row">برنامه های جانبی:</td>
                        <td colspan="5"><textarea name="sideway_programs" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                        <td scope="row">نوآوری:</td>
                        <td colspan="5"><textarea name="innovation" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                        <td scope="row">نام حامیان مالی و میزان و نوع حمایت آنها:</td>
                        <td colspan="5"><textarea name="sponsors" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                        <td scope="row">ریز برنامه ها (زمانبندی):</td>
                        <td colspan="5"><textarea name="detailed_programs" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>

                        <tr>
                        <td scope="row">نظر کارشناس انجمن های علمی دانشجویی:</td>
                        <td >
                        <select name="expert_sign" id="" class="custom-select">
                        <option selected disabled value=""></option>
                        <option value="آقای زیبایی">آقای زیبایی</option>
                        <option value="آقای اکبرزاده">آقای اکبرزاده</option>
                        </select>
                        </td>
                        <td scope="row">نظر و تایید مدیر امور فرهنگی</td>
                        <td >
                        <select name="manager_sign" id="" class="custom-select">
                        <option selected disabled value=""></option>
                        <option value="آقای دکتر بانشی">آقای دکتر بانشی</option>
                        <option value="آقای دکتر هوشمند">آقای دکتر هوشمند</option>
                        </select>
                        </td>
                        </tr>

                        </tbody>
                        </table>

                        <div class="form-group row mb-1">
                        <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary btn-block">
                        {{ __('ثبت طرح و ورود به مرحله بعد >>') }}
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
