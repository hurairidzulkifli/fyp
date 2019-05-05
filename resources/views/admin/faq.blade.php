@extends('layouts.app')

@section('content')
          <div class="container">
                    <div class="col-md-10">
                    <h3>Frequently Asked Question</h3>
                    <div class="panel panel-primary">
                      <div class="panel-heading">Are you a new user?</div>
                      <div class="panel-body">
                         <p>A successfully registered user can create an ad using the portal.</p>
                         <p>Begin with creating a category to automatically generate your profile in the portal.</p>
                         <p><img src="{{ URL::to('img/category.png') }}"></p>
                      </div>
                    </div>
                  </div>
               </div>
                  <div class="container">
                         <div class="col-md-10">
                              <div class="panel panel-primary">
                                <div class="panel-heading">Creating An Ad</div>
                                <div class="panel-body">
                                   <p>A user can create an ad with various content variations.</p>
                                   <p>The portal uses Summernote Editor to enable user to embed content to an ad using Google Forms, Polls,plain text and more.</p>
                                   <p><img src="{{ URL::to('img/post.png') }}"></p><p><img src="{{ URL::to('img/d.png') }}"></p>
                                </div>
                              </div>
                            </div>
                    <div class="container">
                         <div class="col-md-10">
                              <div class="panel panel-primary">
                                   <div class="panel-heading">Ads Verification by Admin</div>
                                   <div class="panel-body">
                                   <p>A successfully posted ad will be revised by admin for approval.</p>
                                   <p>User can view the status of their ads in the panel while waiting for admin to approve.</p>
                                   <p>Approval of an ad can take time around 2-3 hours and any rejection will be notified in the panel.</p>
                                   <p><img src="{{ URL::to('img/approval.png') }}"></p>
                                   </div>
                              </div>
                              </div>
                         </div>
                    <div class="container">
                         <div class="col-md-10">
                              <div class="panel panel-primary">
                                   <div class="panel-heading">Adding Item to the Portal Shop</div>
                                   <div class="panel-body">
                                   <p>After an ad is approved only then item can be added to shop.</p>
                                   <p><img src="{{ URL::to('img/item.png') }}"></p>
                                   </div>
                              </div>
                              </div>
                         </div>
@endsection