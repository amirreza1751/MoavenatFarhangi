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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#button1").click(function () {
                var txt7 = $("#txt7").val();
                var txt8 = $("#txt8").val();
                var txt9 = $("#txt9").val();
                var txt10 = $("#txt10").val();
                var txt11 = $("#txt11").val();
                var txt12 = $("#txt12").val();
                var txt13 = $("#txt13").val();
                var txt14 = $("#txt14").val();
                var result1 = (txt7 * txt8) + (txt9*txt10) + (txt11*txt12) + (txt13*txt14);
                $("#txt6").val(result1.toFixed(2));


                var txt3 = $("#txt3").val();
                var txt4 = $("#txt4").val();
                var txt5 = $("#txt5").val();
                var txt6 = $("#txt6").val();
                var result2 = (txt3 * txt4) + (txt5*txt6);
                $("#txt2").val(result2.toFixed(2));


                var txt19 = $("#txt19").val();
                var txt20 = $("#txt20").val();
                var txt21 = $("#txt21").val();
                var txt22 = $("#txt22").val();
                var txt23 = $("#txt23").val();
                var txt24 = $("#txt24").val();
                var txt25 = $("#txt25").val();
                var txt26 = $("#txt26").val();
                var txt27 = $("#txt27").val();
                var txt28 = $("#txt28").val();
                var txt29 = $("#txt29").val();
                var txt30 = $("#txt30").val();
                var txt31 = $("#txt31").val();
                var txt32 = $("#txt32").val();
                var result3 = (txt19 * txt20) + (txt21*txt22) + (txt23*txt24) + (txt25*txt26) + (txt27*txt28) + (txt29*txt30) + (txt31*txt32);
                $("#txt18").val(result3.toFixed(2));


                var txt39 = $("#txt39").val();
                var txt40 = $("#txt40").val();
                var txt41 = $("#txt41").val();
                var txt42 = $("#txt42").val();
                var result4 = (txt39 * txt40) + (txt41 * txt42);
                $("#txt38").val(result4.toFixed(2));



                var txt51 = $("#txt51").val();
                var txt52 = $("#txt52").val();
                var txt53 = $("#txt53").val();
                var txt54 = $("#txt54").val();
                var result5 = (txt51 * txt52) + (txt53 * txt54);
                $("#txt50").val(result5.toFixed(2));


                var txt45 = $("#txt45").val();
                var txt46 = $("#txt46").val();
                var txt47 = $("#txt47").val();
                var txt48 = $("#txt48").val();
                var txt49 = $("#txt49").val();
                var txt50 = $("#txt50").val();
                var result6 = (txt45 * txt46) + (txt47 * txt48) + (txt49 * txt50);
                $("#txt44").val(result6.toFixed(2));


                var txt61 = $("#txt61").val();
                var txt62 = $("#txt62").val();
                var txt63 = $("#txt63").val();
                var txt64 = $("#txt64").val();
                var txt65 = $("#txt65").val();
                var txt66 = $("#txt66").val();
                var result7 = (txt61 * txt62) + (txt63 * txt64) + (txt65 * txt66);
                $("#txt60").val(result7.toFixed(2));

                var txt57 = $("#txt57").val();
                var txt58 = $("#txt58").val();
                var txt59 = $("#txt59").val();
                var txt60 = $("#txt60").val();
                var result10 = (txt57 * txt58) + (txt59 * txt60);
                $("#txt56").val(result10.toFixed(2));



                var txt69 = $("#txt69").val();
                var txt70 = $("#txt70").val();
                var txt71 = $("#txt71").val();
                var txt72 = $("#txt72").val();
                var txt73 = $("#txt73").val();
                var txt74 = $("#txt74").val();
                var result8 = (txt69 * txt70) + (txt71 * txt72) + (txt73 * txt74);
                $("#txt68").val(result8.toFixed(2));


                var txt77 = $("#txt77").val();
                var txt78 = $("#txt78").val();
                var txt79 = $("#txt79").val();
                var txt80 = $("#txt80").val();
                var txt81 = $("#txt81").val();
                var txt82 = $("#txt82").val();
                var txt83 = $("#txt83").val();
                var txt84 = $("#txt84").val();
                var txt85 = $("#txt85").val();
                var txt86 = $("#txt86").val();
                var result9 = (txt77 * txt78) + (txt79*txt80) + (txt81*txt82) + (txt83*txt84) + (txt85*txt86) + (txt29*txt30) + (txt31*txt32);
                $("#txt76").val(result9.toFixed(2));

            });

            // $("input").click(function () {
            //     alert($(this).attr('id'));
            // });
        });



    </script>



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
                    <div class="float-right">داوری طرح</div>
                    <div class="float-left"><a href="{{url('/projects')}}"> بازگشت </a> </div>
                </div>
                <div class="card-body">
                    <button id="button1" class=" btn btn-block ">click</button>

                    <form method="POST" action="/projects/judgement/{{ $project->id }}">
                        @csrf

                        <table class="table text-center table-responsive-sm" dir="rtl">
                            <thead class="table-light">
                            <tr>
                                <td width="60%">نام معیار</td>
                                <td width="20%">ضریب</td>
                                <td width="20%">نمره</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="btn" class="bg-primary2">
                                <td><b><u>کارتیمی</u></b></td>
                                <td><input readonly name="teami1[st_coefficient]" id="txt1" type="text" class="form-control text-center " value="1" placeholder=""></td>
                                <td><input readonly name="teami1[final_score]" id="txt2" type="text" class="form-control text-center" value="" placeholder=""></td>
                            </tr>

                                <tr class="bg-primary3">
                                <td><b>معیار اول</b></td>
                                <td><input type="text" name="meyarAval2[coefficient]" id="txt3" readonly id="num3" value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="meyarAval2[sub_score]" step="0.01" step="0.01" id="txt4" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr  class="bg-primary3">
                                <td><b>معیار دوم</b></td>
                                <td><input type="text" name="meyarDovom2[coefficient]" id="txt5" readonly value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="meyarDovom2[sub_score]" id="txt6" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>قبل از برگزاری</td>
                                <td><input type="text" name="ghablAzBargozari3[coefficient_l2]" id="txt7" readonly value="0.3" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="ghablAzBargozari3[sub_score_l2]" step="0.01" id="txt8" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>حین برگزاری</td>
                                <td><input type="text" name="heyneBargozari3[coefficient_l2]" id="txt9" readonly value="0.5" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="heyneBargozari3[sub_score_l2]" step="0.01" id="txt10" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>بعد از برگزاری</td>
                                <td><input type="text" name="baadeBargozari3[coefficient_l2]" id="txt11" readonly  value="0.2" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="baadeBargozari3[sub_score_l2]" step="0.01" id="txt12" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>مشخص بودن کادر اجرایی</td>
                                <td><input type="text" name="kadr3[coefficient_l2]" id="txt13" readonly  value="0.1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="kadr3[sub_score_l2]" id="txt14" step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>سطح برگزاری</u></b></td>
                                <td><input type="text" name="level1[st_coefficient]" id="txt15" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="level1[final_score]" id="txt16"  step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>تبلیغات</u></b></td>
                                <td><input type="text" name="tablighat1[st_coefficient]" id="txt17" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="tablighat1[final_score]" id="txt18" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr  class="bg-primary3">
                                <td ><b>فضای مجازی</b></td>
                                <td><input type="text" name="faza2[coefficient]" id="txt19" readonly  value="0.7" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="faza2[sub_score]" id="txt20" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>‍‍‍‍‍‍ پوستر و بنر و استند</b></td>
                                <td><input type="text" name="poster2[coefficient]" id="txt21" readonly  value="0.4" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="poster2[sub_score]" id="txt22"  step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>فایل اصلی</b></td>
                                <td><input type="text" name="file2[coefficient]" id="txt23" readonly  value="0.3" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="file2[sub_score]" id="txt24"  step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>خوابگاه و محیط های دانشگاهی</b></td>
                                <td><input type="text" name="khabgah2[coefficient]" id="txt25" readonly  value="0.9" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="khabgah2[sub_score]" id="txt26" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>آیدی کارت</b></td>
                                <td><input type="text" name="id2[coefficient]" id="txt27" readonly  value="0.5" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="id2[sub_score]" id="txt28" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>بروشور</b></td>
                                <td><input type="text" name="broshur2[coefficient]" id="txt29" readonly  value="0.3" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="broshur2[sub_score]" id="txt30" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>دعوتنامه اساتید</b></td>
                                <td><input type="text" name="davatname2[coefficient]" id="txt31" readonly  value="0.2" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="davatname2[sub_score]" id="txt32" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>جذب مخاطب</u></b></td>
                                <td><input type="text"  name="jazb1[st_coefficient]" id="txt33" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="jazb1[final_score]" id="txt34" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>مدت زمان برگزاری</u></b></td>
                                <td><input type="text" name="modat1[st_coefficient]" id="txt35" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="modat1[final_score]" id="txt36"  step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>نوآوری و ابتکار</u></b></td>
                                <td><input type="text" name="noavari1[st_coefficient]" id="txt37" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="noavari1[final_score]" id="txt38" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>در عنوان</b></td>
                                <td><input type="text"  name="darOnvan2[coefficient]" id="txt39" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="darOnvan2[sub_score]" id="txt40" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>در محتوا</b></td>
                                <td><input type="text" name="darMohtava2[coefficient]" id="txt41" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="darMohtava2[sub_score]" id="txt42" step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>حامیان مالی و رفاهی</u></b></td>
                                <td><input type="text" name="hami1[st_coefficient]" id="txt43" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="hami1[final_score]" id="txt44" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>همکاری استادان و مسئو‌لین</b></td>
                                <td><input type="text" name="hamkari2[coefficient]" id="txt45" readonly  value="0.4" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="hamkari2[sub_score]" id="txt46"  step="0.01"  class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>ارتباط با صنعت و جامعه</b></td>
                                <td><input type="text" name="ertebat2[coefficient]" id="txt47" readonly  value="0.6" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="ertebat2[sub_score]" id="txt48"  step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>جذب حامی</b></td>
                                <td><input type="text" name="jazbHami2[coefficient]" id="txt49" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="jazbHami2[sub_score]" id="txt50" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>تعداد حامیان</td>
                                <td><input type="text" name="tedadHamian3[coefficient_l2]" id="txt51" readonly  value="0.5" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="tedadHamian3[sub_score_l2]" id="txt52"  step="0.01" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>نوع کمک</td>
                                <td><input type="text"  name="noeKomak3[coefficient_l2]" id="txt53" readonly  value="0.5" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="noeKomak3[sub_score_l2]" step="0.01"  id="txt54" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            {{--<tr>--}}
                                {{--<td class="bg-primary">رفاهی</td>--}}
                                {{--<td><input type="number" class="form-control text-center" placeholder="۰/۱"></td>--}}
                                {{--<td><input type="number" class="form-control text-center" placeholder="(۱ تا ۵)"></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="bg-primary">مالی</td>--}}
                                {{--<td><input type="number" class="form-control text-center" placeholder="۰/۱"></td>--}}
                                {{--<td><input type="number" class="form-control text-center" placeholder="(۱ تا ۵)"></td>--}}
                            {{--</tr>--}}
                            <tr class="bg-primary2">
                                <td><b><u>مدعوین ویژه‌ی خارج از دانشگاه</u></b></td>
                                <td><input type="text" name="madovin1[st_coefficient]"  id="txt55" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="madovin1[final_score]" id="txt56" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>درون دانشگاهی</b></td>
                                <td><input type="text" name="darunUni2[coefficient]" id="txt57" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="darunUni2[sub_score]" step="0.01"  id="txt58" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>برون دانشگاهی</b></td>
                                <td><input type="text" name="borunUni2[coefficient]" id="txt59" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text"  name="borunUni2[sub_score]" id="txt60" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>شهری</td>
                                <td><input type="text" name="shahri3[coefficient_l2]" id="txt61" readonly  value="0.4" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="shahri3[sub_score_l2]" step="0.01"  id="txt62" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>استانی</td>
                                <td><input type="text" name="ostani3[coefficient_l2]" id="txt63" readonly  value="0.5" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="ostani3[sub_score_l2]" step="0.01"  id="txt64" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary4">
                                <td>کشوری</td>
                                <td><input type="text" name="keshvari3[coefficient_l2]" id="txt65" readonly  value="0.6" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="keshvari3[sub_score_l2]" step="0.01"  id="txt66" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>برنامه های جانبی</u></b></td>
                                <td><input type="text" name="barnameJanebi1[st_coefficient]"  id="txt67" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="barnameJanebi1[final_score]" id="txt68" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>غرفه (شهودی)</b></td>
                                <td><input type="text"  name="ghorfe2[coefficient]" id="txt69" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number"  name="ghorfe2[sub_score]" step="0.01" id="txt70" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>نمایشگاه (شهودی)</b></td>
                                <td><input type="text" name="namayeshgah2[coefficient]" readonly  id="txt71"  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="namayeshgah2[sub_score]" step="0.01"  id="txt72" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>غیره (شهودی)</b></td>
                                <td><input type="text" name="gheyre2[coefficient]" id="txt73" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="gheyre2[sub_score]" step="0.01"  id="txt74" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            <tr class="bg-primary2">
                                <td><b><u>گواهی</u></b></td>
                                <td><input type="text" name="govahi1[st_coefficient]" id="txt75" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="text" name="govahi1[final_score]" id="txt76" readonly class="form-control text-center" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>گواهی معاونت [حضور] (شهودی)</b></td>
                                <td><input type="text" name="govahiMoavenat2[coefficient]" id="txt77" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="govahiMoavenat2[sub_score]" step="0.01"  id="txt78" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>گواهی گروه (شهودی)</b></td>
                                <td><input type="text" name="govahiGoruh2[coefficient]" id="txt79" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="govahiGoruh2[sub_score]" step="0.01"  id="txt80" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>گواهی پژوهشی (شهودی)</b></td>
                                <td><input type="text"  name="govahiPajuheshi2[coefficient]" id="txt81" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="govahiPajuheshi2[sub_score]"  step="0.01" id="txt82" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>گواهی شرکت‌ها (شهودی)</b></td>
                                <td><input type="text" name="govahiSherkat2[coefficient]" id="txt83" readonly  value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="govahiSherkat2[sub_score]" step="0.01"  id="txt84" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>
                            <tr class="bg-primary3">
                                <td><b>غیره (شهودی)</b></td>
                                <td><input type="text" name="govahiGheyre2[coefficient]" id="txt85" readonly value="1" class="form-control text-center" placeholder=""></td>
                                <td><input type="number" name="govahiGheyre2[sub_score]" step="0.01"  id="txt86" class="form-control text-center" min="0" value="0" placeholder=""></td>
                            </tr>

                            </tbody>
                        </table>


                        <div class="form-group row mb-1">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('ثبت داوری') }}
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
