@extends('public_view.layout.layout')
@section('content')
<!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">
                <li><a href="home-newspaper.html">Home</a></li>
                <li>{{ $article->category->category_name }}</li>
                <li>{{ $article->title }}</li>
            </ul>
        </div>
    </div><!--==============================
        Blog Area
    ==============================-->
    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-lg-8">
                    <div class="th-blog blog-single">
                        <a data-theme-color="#4E4BD0" href="blog.html" class="category">{{ $article->category->category_name }}</a>
                        <h2 class="blog-title">{{ $article->title }}</h2>
                        <div class="blog-meta">
                           <span>{{ $article->short_description }}</span>
                        </div>
                        <div class="blog-meta">
                            <a class="author" href="blog.html"><i class="far fa-user"></i>By - {{ $article->author }}</a>
                            <a href="blog.html"><i class="fal fa-calendar-days"></i>{{ $article->created_at }}</a>
                            <!-- <a href="blog-details.html"><i class="far fa-comments"></i>Comments (3)</a> -->
                            <!-- <span><i class="far fa-book-open"></i>5 Mins Read</span> -->
                        </div>
                        <div class="blog-img">
                        <img src="{{ asset('storage/article/' . $article->thumbnail) }}" alt="blog image" style="width: 100%;">

                        </div>
                        <div class="blog-content-wrap">
                            <div class="share-links-wrap">
                                <div class="share-links">
                                    <span class="share-links-title">Share Post:</span>
                                    <div class="multi-social">
                                        <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </div><!-- End Social Share -->
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-info-wrap">
                                    <button class="blog-info print_btn">
                                        Print :
                                        <i class="fas fa-print"></i>
                                    </button>
                                    <a class="blog-info" href="mailto:">
                                        Email :
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <button class="blog-info ms-sm-auto">Like <i class="fas fa-thumbs-up"></i></button>
                                    <span class="blog-info">View <i class="fas fa-eye"></i></span>
                                    <span class="blog-info">Share <i class="fas fa-share-nodes"></i></span>
                                </div>
                                <div class="content">
                                    {!! $article->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media-body">
                            <div class="author-top">
                                <div>
                                    <h3 class="author-name"><a class="text-inherit" href="team-details.html">{{ $article->author }}</a></h3>
                                    <span class="author-desig">Penulis @ 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>

         
                </div>
               
            </div>
        </div>
    </section>

@endsection
