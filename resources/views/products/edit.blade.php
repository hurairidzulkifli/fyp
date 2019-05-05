@extends('layouts.app2')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Edit Product</div>

                <div class="panel-body">
                   <form action="{{ route('products.update',['id'=>$products->id]) }}" method ="POST" enctype="multipart/form-data">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="PATCH">

                   <div class="form-group">
                        <label for="Title">Name</label>
                        <input type="text" name="name" value="{{$products->name}}" class="form-control">
                   </div>

                   <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="post_id" id="post_id" class="form-control">
                        @foreach($posts as $post)
                        <option value="{{$post->id}}"
                              @if($products->posts->id == $post->id)
                                   selected
                              @endif
                        >{{$post->title}}</option>   
                        @endforeach
                    </select>
                </div>

                   <div class="form-group">
                   <label for="Price">Price :</label>
                        <input type="number" class="form-control-file"  value="{{$products->price}}" name="price">
                        </select>
                   </div>
                <div class="form-group">
                   <label for="Image">Upload an Image</label>
                   <input type="file" class="form-control-file" name="image">
               </div>

               <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$products->description}}</textarea>
                   </div>

                   <div class="form-group">
                        <button class="btn btn-success pull-right" type="submit">Save Product</button>
                   </div>                                    
                   </form>
                </div>
            </div>
@endsection
