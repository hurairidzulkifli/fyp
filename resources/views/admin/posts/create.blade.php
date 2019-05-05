@extends('layouts.app')

@section('content')

 <!-- display any errors returned from validation check -->
 @include('admin.includes.errors')

<div class="panel panel-default">
        <a class="btn btn pull-right btn-info" type="button" href="{{route('faq')}}">FAQ</a>

    <div class="panel-heading">
        Create Post
    </div>

    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data"> 
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                
            </div>

            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control-file">
                
            </div>

            <div class="form-group">
                <label for="category">Select a category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            <div class="form-group">
            <label for="tags">Select A Tag</label>
                @foreach($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
                    </div>
                @endforeach
            </div>

             <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Save Post
                    </button>
                </div>
            
            </div>

            
        </form>
    
    </div>
    
</div>


@stop

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">    
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
        $('#content').summernote();
    }); 
    </script>

<script type="text/javascript" src="{{ URL::asset('js/test1.js') }}"></script>
@stop