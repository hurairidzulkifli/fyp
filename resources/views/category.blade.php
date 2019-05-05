@extends('layouts.frontend')

@section('content')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Club: {{$category->name}}</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Activities Coming Soon</div>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%2333ccff&amp;src=kery.dz%40gmail.com&amp;color=%232952A3&amp;src=en.malaysia%23holiday%40group.v.calendar.google.com&amp;color=%2329527A&amp;ctz=Asia%2FKuala_Lumpur" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
                        <div class="case-item-wrap">
                              @foreach($category->posts as $post)
                              <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                        <img src="{{$post->featured}}" alt="our case">
                                    </div>
                                    <a href="{{route('post.single',['slug'=>$post->slug])}}" class="href"><h6 class="case-item__title">{{$post->title}}</h6></a>
                                </div>
                            </div>
                               @endforeach
                             
            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div class="widget w-tags">
                        <div class="heading text-left">
                        <br><br>
                            <h4 class="heading-title">TRENDY PORTAL TAGS</h4>
                        <div class="tags-wrap">
                             @foreach($tags as $tag)
                            <a class="w-tags-item">{{$tag->tag}}</a>
                              @endforeach
                        </div>
                    </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div> 


@endsection

           
       




