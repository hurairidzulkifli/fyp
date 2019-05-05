@extends('layouts.app2')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Add Product</div>

                <div class="panel-body">
                   <form action="{{ route('products.store')}}" method ="post" enctype="multipart/form-data">
                   {{csrf_field()}}

                   <div class="form-group">
                        <label for="Title">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                   </div>

                   <div class="form-group">
                         <label for="post">Select an Ad</label>
                         <select name="post_id" id="post_id" class="form-control">
                             @foreach($posts as $post)
                             <option value="{{$post->id}}">{{$post->title}}</option>
                             @endforeach
                         </select>

                   <div class="form-group">
                   <label for="Price">Price</label>
                        <input type="number" class="form-control" value="{{old('name')}}" name="price">
                        </select>
                   </div>
                <div class="form-group">
                   <label for="Image">Upload an Image</label>
                   <input type="file" class="form-control-file" name="image">
               </div>

               <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                   </div>

                   <div class="form-group">
                        <button class="btn btn-success pull-right" type="submit">Save Product</button>
                   </div>                                    
                   </form>
                </div>
            </div>
          </div>
@endsection
