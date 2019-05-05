@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-2">
         <div class="panel panel-info">
            <div class="panel-heading text-center">
               Published Post
            </div>

            <div class="panel-body">
               <h1 class="text-center">{{$posts_count}}</h1>
            </div>

         </div>

      </div>

      
      <div class="col-md-2">
         <div class="panel panel-danger">
            <div class="panel-heading text-center">
               Thrashed Post
            </div>

            <div class="panel-body">
               <h1 class="text-center">{{$trash_count}}</h1>
            </div>

         </div>

      </div>

      
      <div class="col-md-2">
         <div class="panel panel-success">
            <div class="panel-heading text-center">
               Users
            </div>

            <div class="panel-body">
               <h1 class="text-center">{{$users_count}}</h1>
            </div>

         </div>

      </div>

      
      <div class="col-md-2">
         <div class="panel panel-info">
            <div class="panel-heading text-center">
               Categories
            </div>

            <div class="panel-body">
               <h1 class="text-center">{{$categories_count}}</h1>
            </div>

         </div>

      </div>
      </div>

<div class="col-md-16">
          <div class="panel panel-primary">
          <div class="panel-heading">Analytics for WhatsUp!</div>

          <div class="panel-body">
               <div class="row">
                    <div class="col-md-12">
               
                         {!! $chart->html() !!}
                    </div>
                    <div class="col-md-12">
                         {!! $pie_chart->html() !!}
                    </div>
               </div>
          </div>  
          </div>
          </div>
      
      

      {!! Charts::scripts() !!}
     {!! $chart->script() !!}
     {!! $pie_chart->script() !!}

       


@endsection
