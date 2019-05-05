@extends('layouts.app')

@section('content')
 <!-- display any errors returned from validation check -->
@include('admin.includes.errors')

<div class="panel panel-default">

    <div class="panel-heading">
        Update Category : {{$category->name}}
    </div>

    <div class="panel-body">
        <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post"> 
            {{csrf_field()}} <!--  token is used to verify that the authenticated user is the one actually making the requests to the application. -->
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control">
                1
            </div> 

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Save Category
                    </button>
                </div>
            
            </div>

            
        </form>
    
    </div>
    
</div>


@stop