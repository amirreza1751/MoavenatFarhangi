@extends('layouts.app')


@section('head')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right" >
                        <div class="float-right">لیست انجمن‌ها</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                        <div class="float-left pl-4"><a href="{{url('/forums/add')}}"> اضافه کردن انجمن علمی </a> </div>
                        {{--@if($role == 'داور' || $role == 'دبیر کمیته علمی') <div class="float-left pl-4"><a href="{{url('/charts')}}">نمودارها</a> </div> @endif--}}
                    </div>
                        <?php $i=1; ?>
                    <div class="card-body ">
                        <div class="col-6 offset-3">
                            <table class="table table-bordered  table-responsive-sm" dir="rtl">
                                <thead class="table-dark">
                                <tr class="text-center">
                                    <td>ردیف</td>
                                    <td>نام دانشکده</td>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($forums as $forum)
                                    <tr class="text-center clickable-row "style="cursor: pointer;" data-href='{{url('/forums')}}{{"/" . $forum->id}}'>
                                        <td>{{$i++}}</td>
                                        <td>{{ $forum->name }}</td>
                                        {{--@if( $role == 'دبیر کمیته علمی') <td>{{ $project->grade}}</td> @endif--}}
                                        {{--@if($role == "داور" || $role == 'دبیر کمیته علمی') <td style="z-index: 10"><a href="/projects/judge/{{ $project->id }}" class="btn btn-primary text-white">داوری طرح</a></td> @endif--}}
                                        {{--@if($role == 'دبیر کمیته علمی') <td style="z-index: 10"><a href="/projects/finalJudge/{{ $project->id }}" class="btn btn-primary text-white">ثبت نهایی</a></td> @endif--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
