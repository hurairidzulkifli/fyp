@extends('layouts.app2')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                   <div class="panel-body">
                         <table class="table table-hover">
                              <thead>
                              <th>
                                   Image 
                              </th>
                              <th>
                                   Name
                              </th>
                              <th>
                                   Ad
                              </th>
                              <th>
                                   Price
                              </th>
                              <th>
                                   Edit
                              </th>
                              <th>
                                   Delete
                              </th>
                              </thead>
                              <tbody>
                                   @foreach($products as $product)
                                        <tr>
                                        <td><img src="{{ $product->image }}" alt="{{ $product->name}}" width="100px" height="80px" style="border-radius:50%"></td>
                                             <td>{{$product->name}}</td>
                                             <td>{{@$product->posts->title}}</td>
                                             <td>{{$product->price}}</td>
                                             <td>
                                                  <a href="{{ route('products.edit',['id'=> $product->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                             </td>
                                             <td>
                                                  <form action="{{ route('products.destroy',['id'=> $product->id]) }}" method="post">
                                                       {{csrf_field() }}
                                                       <input name="_method" type="hidden" value="DELETE">
                                                       <button class="btn btn-xs btn-danger" type="submit">Delete</button>     
                                                  </form>
                                             </td>
                                        </tr>
                                   @endforeach
                              </tbody>                        
                         </table>                 
                   </div>
                </div>
            </div>
        </div>
     
@endsection
