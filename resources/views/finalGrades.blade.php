@extends('layouts.app')

@section('head')
    {{--<link rel="stylesheet" href="/bootstrap-jalali-datepicker-master/demo/css/bootstrap.min.css" />--}}
    {{--<link rel="stylesheet" href="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.css" />--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>--}}
    {{--<script src="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.js"></script>--}}
    {{--<script src="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.fa.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {

            $("#1-1").click(function () {
                var ref_name = $(this).attr("ref_name");
                var proj_id = $(this).attr("proj_id");
                var st_name = $(this).attr("st_name");
                // alert(ref_name + " " + proj_id + " " + st_name);
                $.get("http://localhost:8000/api/judgment/get_grades",
                    {
                        ref_name: ref_name,
                        st_name: st_name,
                        proj_id: proj_id
                    },
                    function(data, status){
                        alert("Data: " + data[0]['st_name'] + "\nStatus: " + status);
                    });
            });

        });
    </script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    {{--<script>--}}
        {{--$('#myModal').on('shown.bs.modal', function () {--}}
            {{--$('#myInput').trigger('focus');--}}
        {{--});--}}
    {{--</script>--}}

    <script src="/js/suggestedGrades.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <div class="float-right">داوری نهایی طرح {{ $project->name }}</div>
                    <div class="float-left"><a href="{{url('/projects')}}"> بازگشت </a> </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="/projects/finalJudgement/{{$project->id}}">
                        @csrf

                    <table class="table table-bordered text-right table-responsive-sm" dir="rtl" style="width: 100%">
                        <thead class="table-dark">
                        <tr class="text-center">
                            <td width="9%">نام و نام خانوادگی داور</td>
                            <td width="9%">کار تیمی</td>
                            <td width="9%">سطح‌برگزاری</td>
                            <td width="9%">تبلیغات</td>
                            <td width="9%">جذب‌مخاطب</td>
                            <td width="9%">مدت‌زمان‌برگزاری</td>
                            <td width="9%">نوآوری‌و‌ابتکار</td>
                            <td width="9%">حامیان‌مالی‌و‌رفاهی</td>
                            <td width="9%">مدعوین‌ویژه</td>
                            <td width="9%">برنامه‌های‌جانبی</td>
                            <td width="9%">گواهی</td>
                        </tr>
                        </thead>

                        <tbody>

                                <tr>
                                    <td>محمد پشم فروش</td>
                                    <td class="text-center"><input st_name="کار تیمی" id="1-1" ref_name="محمد پشم فروش" proj_id="{{$project->id}}" type="text" class="text-center" value="@if($referees['pashm']->count() != 0){{$referees['pashm'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
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
                                    <td class="text-center"><input id="1-2" type="text" class="text-center" value="@if($referees['jafari']->count() != 0){{$referees['jafari'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
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
                                    <td class="text-center"><input id="1-3" type="text" class="text-center" value="@if($referees['mirzayi']->count() != 0){{$referees['mirzayi'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
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
                                    <td class="text-center"><input id="1-4" type="text" class="text-center" value="@if($referees['fazeli']->count() != 0){{$referees['fazeli'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
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
                                    <td>داور پنجم</td>
                                    <td class="text-center"><input id="1-5" type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar5']->count() != 0){{$referees['davar5'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>

                                <tr>
                                    <td>داور ششم</td>
                                    <td class="text-center"><input id="1-5" type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar5'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][1]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][2]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][3]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][4]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][5]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][6]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][7]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][8]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>
                                    <td class="text-center"><input type="text" class="text-center" value="@if($referees['davar6']->count() != 0){{$referees['davar6'][9]->final_score}} @else {{"-"}} @endif" style="width: 50px"></td>

                                </tr>


                        <tr>
                            <td>نمره‌ی‌پیشنهادی‌سیستم</td>
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
                            <td class="text-center"><input name="kare_teami" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][0]->final_score}} @else {{"-"}}  @endif" style="width: 50px;"></td>
                            <td class="text-center"><input name="level" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][1]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="tablighat" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][2]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="jazb_mokhatab" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][3]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="modat_zaman_bargozari"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][4]->final_score}} @else {{"-"}}  @endif" type="text" style="width: 50px"></td>
                            <td class="text-center"><input name="innovation" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][5]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="sponsors" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][6]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="madovin" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][7]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="barname_janebi"  type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][8]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
                            <td class="text-center"><input name="govahi" type="text"  value="@if($referees['nahayi']->count() != 0){{$referees['nahayi'][9]->final_score}} @else {{"-"}}  @endif" style="width: 50px"></td>
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

                    {{--<!-- Button trigger modal -->--}}
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
                        {{--Launch demo modal--}}
                    {{--</button>--}}

                    {{--<!-- Modal -->--}}
                    {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                        {{--<div class="modal-dialog" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">&times;</span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--...--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
