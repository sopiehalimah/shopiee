@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-sm-12">
                    <ul class="breadcrumb">

                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/blogs')}}">Blog</a></li>
                    </ul>
                </div>

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-sm-9" id="blog-listing">


                    @foreach($blog as $key => $blogs)
                    <div class="post">
                        <h2><a href="post.html">{{$blogs->title}}</a></h2>
                        <p class="author-category">By <a href="#">{{$blogs->author}}</a> in <a href="">{{$blogs->category}}</a>
                        </p>
                        <hr>
                        <p class="date-comments">
                            <a href="post.html"><i class="fa fa-calendar-o"></i>{{ date_format(date_create($blogs->created_at),"D, h M Y") }}</a>
                            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                        </p>
                        <div class="image">
                            <a href="post.html">
                                <img src="{{ url('pict/'.$blogs->pict) }}" class="img-responsive" alt="Example blog post alt" style="width: 100%;">
                            </a>
                        </div>
                        <p class="intro"><?php echo substr("$blogs->content", 0,200);?>...</p>
                        <p class="read-more"><a href="{{ url('blogs/'.$blogs->slug) }}" class="btn btn-primary">Continue reading</a>
                        </p>
                    </div>
                     @endforeach


                    <ul class="pager">
                        <li class="previous"><a href="{!! $blog->nextPageUrl() !!}">&larr; Older</a>
                        </li>
                        <li class="next"><a href="{!! $blog->previousPageUrl() !!}">Newer &rarr;</a>
                        </li>
                        
                    </ul>



                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->


                <div class="col-md-3">
                    <!-- *** BLOG MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Blog</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                @foreach($categorys as $key => $category)
                                <li>
                                    <a href="{{url('category/blog/'.$category->category)}}">{{$category->category}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** BLOG MENU END *** -->

                   
                        
                        <div class="banner">
                        <a href="#">
                            @foreach($advertisement as $key => $advertisement )
                            @if($key == 0)
                            <img src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" alt="" style="width: 100%; height: 300px;" alt="sales 2014" class="img-responsive">
                            @else
                            <img src="{{url('/pict_ad/'.$advertisement->pict_ad)}}" alt="" style="width: 100%; height: 300px;" alt="sales 2014" class="img-responsive">
                            @endif
                            @endforeach

                        </a>
                        </div>
                        
                        
                        
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection