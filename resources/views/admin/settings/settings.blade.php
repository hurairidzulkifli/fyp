@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">

    <div class="panel-heading">
         WhatsUp Portal Settings
    </div>

    <div class="panel-body">
        <form action="{{ route('settings.update') }}" method="post"> 
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Site Name</label>
                <input type="text" name="site_name" value="{{$settings->site_name}}"class="form-control">
                
            </div> 
            <div class="form-group">
                <label for="name">Address</label>
                <input type="type" name="address" value="{{$settings->address}}" class="form-control">
                
            </div> 

            <div class="form-group">
                <label for="name">Contact Number</label>
                <input type="type" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
                
            </div> 

            <div class="form-group">
                <label for="name">Contact Email</label>
                <input type="email" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
                
            </div> 

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Site Settings
                    </button>
                </div>
            
            </div>

            
        </form>
    
    </div>
    
</div>


@stop