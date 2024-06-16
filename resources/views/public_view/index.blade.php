@extends('public_view.layout.layout')
@section('content')

    <section class="space">
        <div class="container">
            <div class="row">
                <?php
                    $ittr = 0;
                ?>
                @foreach ($groupedArticles as $key => $ga)
                <?php
                    $ittr++;
                ?>
                <div class="col-xl-8 mb-5">
                    <!-- International News Section -->
                    <h2 class="sec-title has-line">Berita {{ $key }}</h2>
                    <div class="row gy-4">
                        @foreach ($ga as $article)
                        <div class="col-sm-6 border-blog two-column">
                            <div class="blog-style1">
                                <div class="blog-img">
                                    <img src="{{ asset('storage/article/' . $article->thumbnail) }}" alt="blog image">
                                    <a data-theme-color="#019D9E" href="{{ route('public-kategori-news', ['slug' => $article->category_id]); }}" class="category">{{ $key }}</a>
                                </div>
                                <h3 class="box-title-24"><a class="hover-line" href="{{ route('public-detail-news', ['slug' => $article->id]); }}">{{ $article->title }}</a></h3>
                                <span>{{ $article->short_description }}</span>
                                <div class="blog-meta">
                                    <a href="#"><i class="far fa-user"></i>Dibuat oleh - {{ $article->author }}</a>
                                    <a href="#"><i class="fal fa-calendar-days"></i>{{ $article->created_at }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if($ittr == 1)
                <div class="col-xl-4 mt-35 mt-xl-0 sidebar-wrap mb-10">
                    <!-- Popular News Section -->
                    <h2 class="sec-title has-line">Latest News</h2>
                    <div class="sidebar-area">
                        <div class="mb-30">
                            <div class="dark-theme img-overlay2">
                                <div class="blog-style3">
                                    <div class="blog-img">
                                        <img src="{{ asset('storage/article/' . $latestArticles[0]->thumbnail) }}" alt="blog image">
                                    </div>
                                    <div class="blog-content">
                                        <a data-theme-color="#4E4BD0" href="{{ route('public-kategori-news', ['slug' => $article->category_id]); }}" class="category">{{ $latestArticles[0]->category->category_name }}</a>
                                        <h3 class="box-title-24"><a class="hover-line" href="{{ route('public-detail-news', ['slug' => $latestArticles[0]->id]);  }}">{{  $latestArticles[0]->title  }}</a></h3>
                                        <span class="text-white">{{ $latestArticles[0]->short_description }}</span>
                                        <div class="blog-meta">
                                            <a href="#"><i class="far fa-user"></i>By - {{ $latestArticles[0]->author }}</a>
                                            <a href="#"><i class="fal fa-calendar-days"></i>{{ $latestArticles[0]->created_at }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row gy-4">
                            <div class="col-xl-12 col-md-6 border-blog">
                                @foreach ($latestArticles as $key => $art)
                                @if($key == 0)
                                    @continue
                                @endif
                                <div class="blog-style2">
                                    <div class="blog-img">
                                    <img src="{{ asset('storage/article/' . $art->thumbnail) }}" alt="blog image">
                                    </div>
                                    <div class="blog-content">
                                        <a data-theme-color="#E8137D" href="{{ route('public-kategori-news', ['slug' => $article->category_id]); }}" class="category">{{ $art->category->category_name }}</a>
                                        <h3 class="box-title-20"><a class="hover-line" href="{{ route('public-detail-news', ['slug' => $art->id]);  }}">{{  $art->title  }}</a></h3>
                                        <span>{{ $art->short_description }}</span>
                                        <div class="blog-meta">
                                            <a href="#"><i class="far fa-user"></i>By - {{ $art->author }}</a>
                                            <a href="#"><i class="fal fa-calendar-days"></i>{{ $art->created_at }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
    
            </div>
        </div>
    </section>

    <div class="bg-smoke py-lg-4">
        <div class="container">
            <div class="row flex-row-reverse justify-content-center justify-content-lg-between align-items-center">
                <div class="col-lg-5 mb-n3 mb-lg-0">
                    <div class="text-center text-lg-end pt-4 pt-lg-0">
                        <img src="{{ asset('public_assets/assets/img/bg/435.png') }}" alt="icon">
                    </div>
                </div>
                <div class="col-lg-7 py-4 text-center text-lg-start">
                    <h2 class="box-title-30 mb-30">Join Our Newsletter to receive <br> Daily Update News</h2>
                    <form class="newsletter-form width2">
                        <input class="form-control" type="email" placeholder="Enter Email" required="">
                        <button type="submit" class="th-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
@endsection