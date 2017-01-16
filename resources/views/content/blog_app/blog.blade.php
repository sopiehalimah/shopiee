@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-sm-12">
                    <ul class="breadcrumb">

                        <li><a href="index.html">Home</a>
                        </li>
                        <li>Blog listing</li>
                    </ul>
                </div>

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-sm-9" id="blog-listing">


                    <div class="box">

                        <h1>Blog category name</h1>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>

                    </div>

                    @foreach($blog as $key => $blogs)
                    <div class="post">
                        <h2><a href="post.html">{{$blogs->title}}</a></h2>
                        <p class="author-category">By <a href="#">{{$blogs->author}}</a> in <a href="">{{$blogs->id_category}}</a>
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
                                    <a href="blog.html">{{$category->category}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** BLOG MENU END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection