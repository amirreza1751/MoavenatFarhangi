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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-right" >
                        <div class="float-right">لیست طرح ها</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                        @if($role == 'داور' || $role == 'دبیر کمیته علمی') <div class="float-left pl-4"><a href="{{url('/charts')}}">نمودارها</a> </div> @endif
                    </div>
                        <?php $i=1; ?>
                    <div class="card-body text-right">
                        <table class="table table-bordered  table-responsive-sm" dir="rtl">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <td>ردیف</td>
                                    <td>عنوان طرح</td>
                                    <td>نوع طرح</td>
                                    <td>مکان برگزاری</td>
                                    <td>شماره نامه</td>
                                    <td>سطح برگزاری</td>
                                    <td>ظرفیت</td>
                                    <td>انجمن برگزارکننده</td>
                                    @if( $role == 'دبیر کمیته علمی') <td>امتیاز طرح</td> @endif
                                    @if($role == "داور" || $role == 'دبیر کمیته علمی') <td>داوری طرح</td> @endif
                                    @if( $role == 'دبیر کمیته علمی') <td>ثبت نهایی امتیاز</td> @endif
                                </tr>
                            </thead>

                            <tbody>
                        @foreach($projects as $project)
                                <tr class="text-center clickable-row @if($project->grade != null) {{ "alert-success" }} @endif" style="cursor: pointer;" data-href='{{url('/projects')}}{{"/" . $project->id}}'>
                                    <td>{{$i++}}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->type }}</td>
                                    <td>{{ $project->place }}</td>
                                    <td>{{ $project->letter_number }}</td>
                                    <td>{{ $project->level }}</td>
                                    <td>{{ $project->capacity }}</td>
                                    <td>{{ $project->forum->name }}</td>
                                    @if( $role == 'دبیر کمیته علمی') <td>{{ $project->grade}}</td> @endif
                                    @if($role == "داور" || $role == 'دبیر کمیته علمی') <td style="z-index: 10"><a href="/projects/judge/{{ $project->id }}" class="btn btn-primary text-white">داوری طرح</a></td> @endif
                                    @if($role == 'دبیر کمیته علمی') <td style="z-index: 10"><a href="/projects/finalJudge/{{ $project->id }}" class="btn btn-primary text-white">ثبت نهایی</a></td> @endif
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
