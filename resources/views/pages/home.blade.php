@extends('layouts.app')

@section('title', 'Home')



@section('content')
  <!-- Trending Area Start -->
  <div class="trending-area fix pt-25 gray-bg">
    <div class="container">
      <div class="trending-main">
        <div class="row">
            {{-- Berita Utama --}}
          <div class="col-lg-8">
            <!-- Trending Top -->
            @if ($featured)
            <div class="slider-active">
              <!-- Single -->
              <div class="single-slider">
                <div class="trending-top mb-30">
                  <div class="trend-top-img">
                    <img src="{{Storage::url($featured->thumbnail)}}" alt="" />
                    <div class="trend-top-cap">
                      <span
                        class="bgr"
                        data-animation="fadeInUp"
                        data-delay=".2s"
                        data-duration="1000ms"
                        >Featured</span
                      >
                      <h2>
                        <a
                          href="#"
                          data-animation="fadeInUp"
                          data-delay=".4s"
                          data-duration="1000ms"
                          >{{$featured->title}}</a
                        >
                      </h2>
                      <p
                        data-animation="fadeInUp"
                        data-delay=".6s"
                        data-duration="1000ms"
                      >
                        {{ $featured->created_at->format('d M Y') }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>   
            @else
            <p>Belum ada berita.</p>
            @endif
          </div>
          <!-- Right content -->
          <div class="col-lg-4">
            <!-- Trending Top -->
            <div class="row">
                @foreach ($latestNews->take(2) as $news)
                    <div class="col-lg-12 col-md-6 col-sm-6">
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                        <img src="{{Storage::url($news->thumbnail)}}" alt="" />
                        <div class="trend-top-cap trend-top-cap2">
                            <span class="bgb">Latset</span>
                            <h2>
                            <a href="{{ route('news.show', $news->slug) }}"
                                >{{ $news->title }}</a
                            >
                            </h2>
                            <p>{{ $news->created_at->format('d M Y') }}</p>
                        </div>
                        </div>
                    </div>
                    </div> 
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Trending Area End -->
  <!--   Weekly3-News start -->
 <div class="weekly3-news-area pt-80 pb-130">
    <div class="container">
        <div class="weekly3-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Berita Terbaru</h3>
                    </div>
                </div>
            </div>

            <div class="row"> 
                @foreach ($latestNews->take(4) as $news)
                <div class="col-lg-3 col-md-6 col-sm-6"> <div class="weekly3-single mb-30">
                        <div class="weekly3-img">
                            <img src="{{ Storage::url($news->thumbnail) }}" alt="{{ $news->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 5px;">
                        </div>
                        <div class="weekly3-caption">
                            <h4 style="margin-top: 15px;">
                                <a href="{{ route('news.show', $news->slug) }}" style="font-size: 16px; line-height: 1.4; display: block;">
                                    {{ $news->title }}
                                </a>
                            </h4>
                            <p>{{ $news->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
  <!-- End Weekly-News -->
  <!--   Weekly2-News start -->
  <div class="weekly2-news-area pt-50 pb-30 gray-bg">
    <div class="container">
      <div class="weekly2-wrapper">
        <div class="row">
          <!-- Banner -->
          <div class="col-lg-3">
            <div class="home-banner2 d-none d-lg-block">
              <img src="{{asset('assets/img/gallery/body_card2.png')}}" alt="" />
            </div>
          </div>
          <div class="col-lg-9">
            <div class="slider-wrapper">
              <!-- section Tittle -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="small-tittle mb-30">
                    <h4>Most Popular</h4>
                  </div>
                </div>
              </div>
              <!-- Slider -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="weekly2-news-active d-flex">
                    <!-- Single -->
                    <div class="weekly2-single">
                      <div class="weekly2-img">
                        <img src="{{asset('assets/img/gallery/weeklyNews1.png')}}" alt="" />
                      </div>
                      <div class="weekly2-caption">
                        <h4>
                          <a href="#"
                            >Scarlett’s disappointment at latest accolade</a
                          >
                        </h4>
                        <p>Jhon | 2 hours ago</p>
                      </div>
                    </div>
                    <!-- Single -->
                    <div class="weekly2-single">
                      <div class="weekly2-img">
                        <img src="{{asset('assets/img/gallery/weeklyNews2.png')}}" alt="" />
                      </div>
                      <div class="weekly2-caption">
                        <h4>
                          <a href="#"
                            >Scarlett’s disappointment at latest accolade</a
                          >
                        </h4>
                        <p>Jhon | 2 hours ago</p>
                      </div>
                    </div>
                    <!-- Single -->
                    <div class="weekly2-single">
                      <div class="weekly2-img">
                        <img src="{{asset('assets/img/gallery/weeklyNews3.png')}}" alt="" />
                      </div>
                      <div class="weekly2-caption">
                        <h4>
                          <a href="#"
                            >Scarlett’s disappointment at latest accolade</a
                          >
                        </h4>
                        <p>Jhon | 2 hours ago</p>
                      </div>
                    </div>
                    <!-- Single -->
                    <div class="weekly2-single">
                      <div class="weekly2-img">
                        <img src="{{asset('assets/img/gallery/weeklyNews2.png')}}" alt="" />
                      </div>
                      <div class="weekly2-caption">
                        <h4>
                          <a href="#"
                            >Scarlett’s disappointment at latest accolade</a
                          >
                        </h4>
                        <p>Jhon | 2 hours ago</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Weekly-News -->
  <!-- banner-last Start -->
  <div class="banner-area gray-bg pt-90 pb-90">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10">
          <div class="banner-one">
            <img src="{{asset('assets/img/gallery/body_card3.png')}}" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- banner-last End -->
@endsection
    
