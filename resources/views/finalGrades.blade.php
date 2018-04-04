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
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });
    </script>
    <script>
        $(document).ready(function () {

            var a = $("#1").val();
            var b = $("#2").val();
            var c = $("#3").val();
            var d = $("#4").val();
            var e = $("#5").val();
            $("#6").val()

        });
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <div class="float-right">نمرات ثبت شده</div>
                    <div class="float-left"><a href="{{url('/projects')}}"> بازگشت </a> </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="/projects/add">
                        @csrf

                    <table class="table table-bordered text-right table-responsive-sm" dir="rtl" style="width: 100%">
                        <thead class="table-dark">
                        <tr class="text-center">
                            <td width="9%">نام و نام خانوادگی داور</td>
                            <td width="9%">کار تیمی</td>
                            <td width="9%">سطح برگزاری</td>
                            <td width="9%">تبلیغات</td>
                            <td width="9%">جذب مخاطب</td>
                            <td width="9%">مدت زمان برگزاری</td>
                            <td width="9%">نوآوری و ابتکار</td>
                            <td width="9%">حامیان مالی و رفاهی</td>
                            <td width="9%">مدعوین ویژه</td>
                            <td width="9%">برنامه‌های جانبی</td>
                            <td width="9%">گواهی</td>
                        </tr>
                        </thead>

                        <tbody>

                                <tr>
                                    <td>محمد پشم فروش</td>
                                    <td class="text-center"><input id="1" type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>

                                <tr>
                                    <td>پریسا شریعت جعفری</td>
                                    <td class="text-center"><input id="1" type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>

                                <tr>
                                    <td>سارا میرزایی</td>
                                    <td class="text-center"><input id="1" type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>

                                <tr>
                                    <td>سید محمد فاضلی</td>
                                    <td class="text-center"><input id="1" type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>

                                <tr>
                                    <td>علیرضا کمری</td>
                                    <td class="text-center"><input id="1" type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['kamari']->count() != 0){{$referees['kamari'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>


                        <tr>
                            <td>نمره پیشنهادی سیستم</td>
                            <td class="text-center"><input id="6" type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                        </tr>
                        <tr>
                            <td>نمره نهایی طرح</td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                            <td class="text-center"><input type="text" style="width: 50px"></td>
                        </tr>

                        </tbody>
                    </table>




                        <div class="form-group row mb-1">
                            <div class="col-md-6 offset-3 ">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('ثبت نهایی امتیاز طرح') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
