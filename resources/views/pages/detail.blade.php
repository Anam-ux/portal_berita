@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 posts-list">
              <div class="single-post">
                <div class="feature-img">
                  <img
                    class="img-fluid"
                    src="{{Storage::url($news->thumbnail)}}"
                    alt=""
                  />
                </div>
                <div class="blog_details">
                  <h2>
                    {{$news->title}}
                  </h2>
                  <ul class="blog-info-link mt-3 mb-4">
                    <li>
                      <a href="#"
                        ><i class="fa fa-user"></i> Travel, Lifestyle</a
                      >
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-comments"></i> 03 Comments</a>
                    </li>
                  </ul>
                  <p class="excert">
                    {!!($news->content)!!}
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                  <form action="#">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Search Keyword"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Search Keyword'"
                        />
                        <div class="input-group-append">
                          <button class="btns" type="button">
                            <i class="ti-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <button
                      class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                      type="submit"
                    >
                      Search
                    </button>
                  </form>
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Berita Terkait</h3>
                  @foreach ($relatedNews as $item)       
                  <div class="media post_item mb-4 d-flex align-items-center">
                    <img src="{{Storage::url($item->thumbnail)}}" alt="post" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;"/>
                    <div class="media-body">
                      <a href="{{route('news.show', $item->slug)}}">
                        <h3>{{ \Illuminate\Support\Str::limit($item->title, 45) }}</h3>
                      </a>
                      <p>{{ $item->created_at->format('F j, Y') }}</p>
                    </div>
                  </div>
                  @endforeach
                </aside>
                <aside class="single_sidebar_widget tag_cloud_widget">
                  <h4 class="widget_title">Tag Clouds</h4>
                  <ul class="list">
                    @if ($news->tags->count())
                        @foreach ($news->tags as $tag)
                            <li>
                                <a href="#">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </aside>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

