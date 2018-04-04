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
                    $(wrapper).append('                                <div id="row'+x+'"  class="form-group row" dir="rtl">\n' +
                        '                                    <p data-toggle="tooltip" data-placement="top" title="حذف این ردیف" class="form-control text-md-center col-md-1"  >  ردیف: '+x+'</p>\n' +
                        '                                    <label  class="col-md-1  col-form-label text-md-left ">موضوع درخواست</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-2">\n' +
                        '                                        <input  name="subject'+x+'" type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    {{--<label for="name" class=" col-md-1  col-form-label text-md-left">نام خانوادگی</label>--}}\n' +
                        '\n' +
                        '                                    {{--<div class=" col-md-1 ">--}}\n' +
                        '                                    {{--<input id="name" type="text" class="form-control" required autofocus>--}}\n' +
                        '\n' +
                        '                                    {{--</div>--}}\n' +
                        '\n' +
                        '                                    <label class=" col-md-1 col-form-label text-md-left">واحد</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1  ">\n' +
                        '                                        <input name="unit'+x+'"  type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label  class=" col-md-1 col-form-label text-md-left">هزینه</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input  name="cost'+x+'"  type="text" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label class=" col-md-1  col-form-label text-md-left">هزینه درخواستی</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input  type="text" name="requested_cost'+x+'" class="form-control" required autofocus>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                    <label  class=" col-md-1  col-form-label text-md-left">موافقت شده</label>\n' +
                        '\n' +
                        '                                    <div class=" col-md-1 ">\n' +
                        '                                        <input  type="text"  name="approved_cost'+x+'"  class="form-control" required autofocus>\n' +
                        '\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '\n' +
                        '                                </div>\n'); //add input box
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
                    <div class="card-header text-right">ثبت هزینه های طرح</div>

                    <div class="card-body">
                        <div class="pb-2 text-right">
                            <button type="button" class="remove_field btn btn-info rounded-circle">-</button>
                            <button type="button" class="add_field_button btn btn-primary rounded-circle">+</button>
                        </div>
                        <form method="POST" action="/projects/costs/new">
                            @csrf
                            <input type="hidden" name="project_id" value="{{$project_id}}">
                            <input type="hidden" id="number_of_inputs" name="number_of_inputs" value="1">
                            <div id="items">
                                <div id="to_add" class="form-group row" dir="rtl">
                                    <p class="form-control text-md-center col-md-1"  >ردیف: 1</p>
                                    <label  class="col-md-1  col-form-label text-md-left ">موضوع درخواست</label>

                                    <div class=" col-md-2">
                                        <input  name="subject1" type="text" class="form-control" required autofocus>

                                    </div>


                                    <label for="name" class=" col-md-1 col-form-label text-md-left">واحد</label>

                                    <div class=" col-md-1  ">
                                        <input  name="unit1" type="text" class="form-control" required autofocus>

                                    </div>

                                    <label  class=" col-md-1 col-form-label text-md-left">هزینه</label>

                                    <div class=" col-md-1 ">
                                        <input  name="cost1" type="text" class="form-control" required autofocus>

                                    </div>

                                    <label class=" col-md-1  col-form-label text-md-left">هزینه درخواستی</label>

                                    <div class=" col-md-1 ">
                                        <input  name="requested_cost1" type="text" class="form-control" required autofocus>

                                    </div>

                                    <label  class=" col-md-1  col-form-label text-md-left">موافقت شده</label>

                                    <div class=" col-md-1 ">
                                        <input  name="approved_cost1" type="text" class="form-control" required autofocus>


                                    </div>

                                </div>

                            </div>




                            <div class="form-group row mb-1">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('ثبت هزینه ها و ورود به مرحله بعد >>') }}
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