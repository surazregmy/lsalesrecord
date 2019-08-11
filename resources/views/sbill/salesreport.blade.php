@extends('layouts.apptheme')
@section('content')
<section class="content">
    <!-- Default box -->
  <div class="row" style="margin-left:0px; margin-right:0px"> 
    <div class="box">
        <div class="box-header with-border">
            <section class="content-header">
                <h4 class="text-center" style="float:center">{{$subheading}}</h4>
            </section>         
        </div>
      <div class="box-body">
        {!! Form::open() !!}
       
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-1 text-center">
                    {{form:: label('From','From: ','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-sm-3">
                    {{form:: text('date_of_purchase','',['class'=>'form-control bod-picker','placeholder'=>'date'])}}
                    </div>

                    <div class="col-sm-1 text-center">
                        {{form:: label('To','To: ','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-sm-3">
                        {{form:: text('date_of_purchase','',['class'=>'form-control bod-picker','placeholder'=>'date'])}}
                    </div>

                    <div class="col-sm-2 text-center">
                     {{form:: submit('Generate',['class'=>'btn btn-md btn-default btn-flat pull-right','onclick'=>"fetchSalesReport()",'name'=>'Generate'])}}  
                    </div>

            </div>
       
        {!! Form::close() !!}   
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
  <div id="salersresult">

  </div>
</section>
@endsection

@section('pagespecificscripts')
<script>
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function fetchSalesReport(){
    $("form").submit(function(e){
        e.preventDefault();
    });
    // alert("Hi");
   $.ajax({
                    type : "POST",
                    url :  "/generateCustomDateRangesSalesSummary",
                    data: {
                      _token: CSRF_TOKEN,
                      
                      },
                    dataType: 'JSON',
                    success : function(msg){
                      // alert("success");
                      // console.log(msg);
                      $('#salersresult').html(msg);
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        $('#salersresult').html(request.responseText); //it works for now
                    }
          });
  

  }
</script>
@endsection