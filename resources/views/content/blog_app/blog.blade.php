@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-sm-12">
                    <ul class="breadcrumb">

                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/articles')}}">Article</a></li>
                    </ul>
                </div>

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-sm-9" id="blog-listing">


                    @foreach($article as $key => $articles)
                    <div class="post">
                        <h2><a href="post.html">{{$articles->title}}</a></h2>
                        <p class="author-category">By <a href="#">{{$articles->author}}</a> in <a href="">{{$articles->category_id}}</a>
                        </p>
                        <hr>
                        <p class="date-comments">
                            <a href="post.html"><i class="fa fa-calendar-o"></i>{{ date_format(date_create($articles->created_at),"D, d M Y") }}</a>
                            <a href="post.html"><i class="fa fa-comment-o"></i> Comments</a>
                        </p>
                        <div class="image">
                            <a href="post.html">
                                <img src="{{ url('pict/'.$articles->pict) }}" class="img-responsive" alt="Example article post alt" style="width: 100%;">
                            </a>
                        </div>
                        <p class="intro"><?php echo substr("$articles->content", 0,200);?>...</p>
                        <?php
                        $category_id = strtolower($articles->category_id);
                        $slug = strtolower($articles->slug);
                        ?>
                        <p class="read-more"><a href="{{ url('articles/'.$category_id.'/'.$slug) }}" class="btn btn-primary">Continue reading</a>
                        </p>
                    </div>
                     @endforeach


                    <ul class="pager">
                        <li class="previous"><a href="{!! $article->nextPageUrl() !!}">&larr; Older</a>
                        </li>
                        <li class="next"><a href="{!! $article->previousPageUrl() !!}">Newer &rarr;</a>
                        </li>
                        
                    </ul>



                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->


                <div class="col-md-3">
                    <!-- *** article MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Category</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                @foreach($categorys as $key => $category)
                                <?php 
                                $category_id = strtolower($category->name)
                                ?>
                                <li>
                                    <a href="{{url('/article/category/'.$category_id)}}">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** article MENU END *** -->

                   
                        
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