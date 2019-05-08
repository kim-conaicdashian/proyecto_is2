<!DOCTYPE html>
@extends('layouts.app')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/calendarJS/source/jsCalendar.css">
<script type="text/javascript" src="/calendarJS/source/jsCalendar.js"></script>
<script type="text/javascript" src="/calendarJS/source/jsCalendar.lang.es.js"></script>

<div class="container">
  <title> Agregar plan de acción </title>
  <h2 style="margin-top:20px;"> Agregar plan de acción </h2>
  <form method="POST" action="{{route('plan.store')}}">
      @csrf
      <div class="form-group" {{ $errors->has('nombrePlan') ? 'has-error' : ''}}>
        <label for="exampleInputEmail1" style="font-size: 24px;">Nombre</label>
        <input type="text" class="form-control"  name='nombrePlan' placeholder="Escriba el nombre para el plan de acción">
        {!! $errors->first('nombrePlan','<span class="help-block" style="color:red;">:message</span>')!!}
      </div>
      <div class="form-group" {{ $errors->has('descripcionPlan') ? 'has-error' : ''}}>
        <hr>
        <label for="exampleInputPassword1" style="font-size: 24px;">Descripción</label>
        <hr>
        <textarea rows="4" cols="50" name='descripcionPlan'></textarea>
        {!! $errors->first('descripcionPlan','<span class="help-block" style="color:red;">:message</span>')!!}
      </div>

      
      <!-- My calendar element -->
      <h2>Fecha de término</h2>
      <div id="my-calendar" class="jsCalendar" data-language="es"></div>

      <!-- Outputs -->
      <h4 style="color:white">Fecha escogida</h4>
      <input id="my-input-a" name="fecha_termino"><br>
      {!! $errors->first('fecha_termino','<span class="help-block" style="color:red;">:message</span>')!!}
      
      {{-- Month change : <br>
      <input id="my-input-b"><br> --}}

      {{-- <div class="form-group" {{ $errors->has('fecha_termino') ? 'has-error' : ''}}>
        <label  style="font-size: 24px;">Fecha de término:</label>
        <input style="width: 15%;" type="date" class="form-control"  name='fecha_termino' >
        {!! $errors->first('fecha_termino','<span class="help-block" style="color:red;">:message</span>')!!}
      </div> --}}


      <input type='hidden' name='rec' value='{{$rec}}'/>
      <hr>
      <button type="submit" class="btn pretty-btn">Crear plan de acción</button>
    </form>

    <!-- Create the calendar -->
    <script type="text/javascript">
      // Create the calendar
      var calendar = jsCalendar.new("#my-calendar");

      
      // Get the inputs
      var print_date = document.getElementById("my-input-a");
      var print_month = document.getElementById("my-input-b");

      // When the user clicks on a date
      calendar.onDateClick(function(event, date){
        print_date.value = jsCalendar.tools.dateToString(date, 'DAY, DD MONTH YYYY', 'es');
        console.log(calendar._elements);
      });

      
      $("td").click(function() {
        //$(".jsCalendar-current").removeClass(".jsCalendar-current");
        $(".jsCalendar-current").attr('class', 'lol');
        console.log($(".jsCalendar-current"));
        $(this).addClass("jsCalendar-current");
        console.log(this);
      });

      
      // When a user change the month
      calendar.onMonthChange(function(event, date){
        print_month.value = jsCalendar.tools.dateToString(date, 'MONTH YYYY', 'es');
      });
    </script>
</div>
@endsection

