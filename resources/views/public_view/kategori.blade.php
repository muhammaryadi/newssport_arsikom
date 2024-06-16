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
                @endforeach
    
            </div>
        </div>
    </section>


 
@endsection