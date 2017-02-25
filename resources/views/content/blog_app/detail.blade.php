@extends('layout.app')

@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-sm-12">

                    <ul class="breadcrumb">

                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/articles')}}">Article</a></li>
                        <?php
                            $category_id = ucwords(session("category_id"));
                        ?>
                        <li><a href="{{url('/article/category/'.session('category_id'))}}"">{{$category_id}}</a></li>
                        <li>{{$data->title}}</li>
                    </ul>
                </div>

                <div class="col-sm-9" id="article-post">


                    <div class="box">

                        <h1>{{ $data->title }}</h1>
                        <p class="author-date">By <a href="#">{{$data->author}}</a> | {{ date_format(date_create($data->created_at),"D, h M Y") }}</p>
                        <div id="post-content">

                            <p>
                                <img src="{{ url('pict/'.$data->pict) }}" class="img-responsive" alt="Example article post alt" style="width: 100%;">
                            </p>

                            <blockquote>
                                <p><?php echo $data->content; ?></p>
                            </blockquote>

                            

                        </div>
                        <!-- /#post-content -->

                        <div id="comments" data-animate="fadeInUp">
                            <h4>{{count($comment)}} comments</h4>

                            @foreach($comment as $com)
                            <div class="row comment" style="border-bottom: 1px solid#eee;">
                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
                                        <img src="{{ url('pict_user/'.$com->pict_user) }}" class="img-responsive img-circle" alt="">
                                    </p>
                                </div>
                                <div class="col-sm-9 col-md-10">
                                    <h5>{{$com->name_user}}</h5>
                                    <p class="posted"><i class="fa fa-clock-o"></i> {{ date_format(date_create($data->created_at),"D, d M Y") }} at {{ date_format(date_create($data->created_at),"H:i:s") }}</p>
                                    <p>{{$com->comment}}</p>
                                </div>
                            </div>
                            <!-- /.comment -->
                            
                            @endforeach

                        </div>
                        <!-- /#comments -->

                        @if(Auth::user() == null)
                        
                        @else

                        <div id="comment-form" data-animate="fadeInUp">

                            <h4>Leave comment</h4>

                            <form action="{{url('/article/comment')}}" method="post" enctype="multipart/form-data">

                            {!! csrf_field() !!}

                            <input type="hidden" name="pict_user" value="{{ Auth::user()->pict_user }}">
                            <input type="hidden" name="article_id" value="{{ $data->slug }}">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label for="name">Name <span class="required">*</span>
                                            </label> -->
                                            <input type="hidden" class="form-control" id="name" name="name_user" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label for="email">Email <span class="required">*</span>
                                            </label> -->
                                            <input type="hidden" class="form-control" id="email" name="id_user" value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="comment">Comment <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control" id="comment" rows="4" name="comment"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-comment-o"></i> Post comment</button>
                                    </div>
                                </div>


                            </form>

                        </div>
                        <!-- /#comment-form -->
                        @endif

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /#article-post -->

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
                                    <a href="{{url('article/category/'.$category_id)}}">{{$category->name}}</a>
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