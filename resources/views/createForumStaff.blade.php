@extends('layouts.app')

@section('head')

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>

    <script>
        $(document).ready(function() {
            var max_fields = 50; //maximum input boxes allowed
            var wrapper = $("#items"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var to_add = $("#to_add");
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++;//text box increment
                    $("#number_of_inputs").val(x);
                    $(wrapper).append('                      <div id="row'+x+'" class="form-group row" dir="rtl">\n' +
                        '                                    <p class="col-form-label pr-3 text-md-center "  >ردیف: '+x+'</p>\n' +
                        '                                    <label for="name" class="pr-3  col-form-label text-md-left ">نام و نام خانوادگی</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-2">\n' +
                        '                                        <input id="name" name="name'+x+'" type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '\n' +
                        '\n' +
                        '                                    <label for="name" class=" pr-3 col-form-label text-md-left">شماره دانشجویی</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1  ">\n' +
                        '                                        <input id="name" name="student_id'+x+'" type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label for="name" class=" pr-3 col-form-label text-md-left">شماره تلفن</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input id="name" name="phone_number'+x+'" type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label for="name" class=" pr-3  col-form-label text-md-left">رشته تحصیلی</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input id="name" name="field'+x+'" type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label for="name" class=" pr-3  col-form-label text-md-left">سمت در انجمن</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input id="name" name="post'+x+'" type="text" class="form-control" required autofocus>\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label for="name" class=" pr-3  col-form-label text-md-left">تعداد رای</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input id="name" name="vote'+x+'" type="number" class="form-control" required autofocus>\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                </div>\n '); //add input box
                }
            });

            $(".remove_field").click( function(e){ //user click on remove field
                e.preventDefault(); if (x > 1){$("#row"+x).remove(); x--; $("#number_of_inputs").val(x);}
            })
        });
    </script>

@endsection

@section('content')
    {{--{{ $project->name }}--}}
    {{--{{ $project->id }}--}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header text-right">اضافه کردن افراد به انجمن</div>

                    <div class="card-body">
                        <div class="pb-2 text-right">
                            <button type="button" class="remove_field btn btn-info rounded-circle">-</button>
                            <button type="button" class="add_field_button btn btn-primary rounded-circle">+</button>
                        </div>
                        <form method="POST" action="/forums/staffs/new">
                            @csrf
                            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                            <input type="hidden" id="number_of_inputs" name="number_of_inputs" value="1">
                            <div id="items">
                                <div id="to_add" class="form-group row" dir="rtl">
                                    <p class="col-form-label pr-3 text-md-center "  >ردیف: 1</p>
                                    <label for="name" class="pr-3  col-form-label text-md-left ">نام و نام خانوادگی</label>

                                    <div class=" col-md-2">
                                        <input id="name" name="name1" type="text" class="form-control" required autofocus>

                                    </div>



                                    <label for="name" class=" pr-3 col-form-label text-md-left">شماره دانشجویی</label>

                                    <div class=" col-md-1  ">
                                        <input id="name" name="student_id1" type="text" class="form-control" required autofocus>

                                    </div>

                                    <label for="name" class=" pr-3 col-form-label text-md-left">شماره تلفن</label>

                                    <div class=" col-md-1 ">
                                        <input id="name" name="phone_number1" type="text" class="form-control" required autofocus>

                                    </div>

                                    <label for="name" class=" pr-3  col-form-label text-md-left">رشته تحصیلی</label>

                                    <div class=" col-md-1 ">
                                        <input id="name" name="field1" type="text" class="form-control" required autofocus>

                                    </div>

                                    <label for="name" class=" pr-3  col-form-label text-md-left">سمت در انجمن</label>

                                    <div class=" col-md-1 ">
                                        <input id="name" name="post1" type="text" class="form-control" required autofocus>
                                    </div>

                                    <label for="name" class=" pr-3  col-form-label text-md-left">تعداد رای</label>

                                    <div class=" col-md-1 ">
                                        <input id="name" name="vote1" type="number" class="form-control" required autofocus>
                                    </div>

                                </div>

                            </div>



                            <div class="form-group row mb-1">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('ثبت نام افراد و ورود به مرحله بعد >>') }}
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