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
                    <div class="float-right">پنل ادمین</div>
                    <div class="float-left"><a href="{{url('/projects')}}"> بازگشت </a> </div>
                </div>
                <div class="card-body">
                    <h1 class="text-right">نمودار‌ها</h1>
                    <div id="piechart"></div>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                        // Load google charts
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        // Draw the chart and set the chart values
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['آموزشی', {{$counter['amuzeshi']}}],
                                ['ترویجی', {{$counter['tarviji']}}],
                            ]);

                            // Optional; add a title and set the width and height of the chart
                            var options = {'title':'فراوانی طرح‌ها', 'width':550, 'height':400};

                            // Display the chart inside the <div> element with id="piechart"
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
