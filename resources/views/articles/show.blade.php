@extends('layouts.blog')

@section('content')
    <!-- Blog -->
    <section id="blog" class="clearfix boxed pt-40 mb-80">

        @if(!Auth::guest() AND Auth::user()->isOwner($article->id))
                <a href="{{ url('article/delete/'.$article->id) }}" class=" btn btn-warning pull-right">
                    <i class="fa fa-pencil"></i>
                    Delete Article
                </a>

            @endif

        @if(!Auth::guest() AND Auth::user()->isOwner($article->id))
            <a href="{{ url('article/edit/'.$article->id) }}" class="btn btn-warning pull-right">
                <i class="fa fa-pencil"></i>
                Edit Article
            </a>
        @endif

        <!-- Posts -->
        <div class="posts pl-00 pr-10 mt-90">

            <!-- Post -->
            <div class="post clearfix">
                <!-- Left, Dates -->
                <div class="dates f-left">
                    <!-- Post Time -->
                    <h6 class="date">
						<span class="day colored helvetica">
							{{ date('d', strtotime($article->created_at)) }}
						</span>
                        {{ date('M', strtotime($article->created_at)) }}, {{ date('Y', strtotime($article->created_at)) }}
                    </h6>
                    <!-- Details -->
                    <div class="details">
                        <ul class="t-right fullwidth">
                            <!-- Posted By -->
                            <li>
                                Posted By <a href="#">{{ $article->user->name }}</a>
                                <i class="fa fa-user"></i>
                            </li>
                            <!-- Comments -->
                            <li>
                                <a href="#">12 Comments</a>
                                <i class="fa fa-comments"></i>
                            </li>
                            <!-- Tags -->
                            @if($article->tags()->count()>0)
                                <li>
                                @foreach($article->tags as $tag)
                                    <a href="#">{{$tag->name}}</a>
                                @endforeach
                                <i class="fa fa-user"></i>
                                </li>
                            @endif
                            <!-- Liked -->
                            <li>
                                <a href="#">Extra Link</a>
                                <i class="fa fa-link"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- End Details -->
                </div>
                <!-- End Left, Dates -->
                <!-- Post Inner -->
                <div class="post-inner f-right">
                    <!-- Header -->
                    <h2 class="post-header semibold">
                        {{ $article->title }}
                    </h2>
                    <div class="comments-header text-10 mt-40">
                        {{$article->description}}
                    </div>
                    <!-- Media -->
                    <div class="post-media fitvid">
                        @if($article->video)
                            <iframe src={{ $article->video }}></iframe>
                        @endif
                    </div>
                    <!-- Content -->
                    <p class="post-text light">
                        {!! $article->content !!}
                    </p>


                    <div class="fullwidth">

                        <!-- Comments -->
                        <div class="comments mt-60">
                            <!-- Header -->
                            <h2 class="comments-header text-20 mt-40">
                                Comments
                            </h2>
                            <!-- Media -->
                            @foreach($article->comments as $comment)
                                <div class="media mt-5">
                                <!-- Body -->
                                <div class="media-body">

                                    <div class="details">
                                            <!-- Header -->
                                            <h4 class="media-heading">
                                                {{$comment->name}}
                                                <span class="light mini-text ml-15">{{$comment->created_at}}</span>
                                            </h4>
                                            {{$comment->message}}
                                            <!--
                                            <p class="votes t-right helvetica mt-20">

                                                <a href="#" class="like">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                                    <span>+0</span>
                                                </a>
                                                <a href="#" class="unlike">
                                                    <i class="fa fa-thumbs-o-down"></i>
                                                    <span>-0</span>
                                                </a>
                                                <a href="#" class="reply">
                                                    <i class="fa fa-reply"></i>
                                                    <span>Reply</span>
                                                </a>
                                            </p>-->
                                    </div>

                                </div>
                                <!-- End Body -->
                            </div>
                            @endforeach
                            <!-- End Media -->
                        </div>
                        <!-- End Comments -->

                        <!-- Reply Form -->
                        <div class="reply-form">
                            <!-- Header -->
                            <p class="uppercase comments-header light post-text">
                                Leave a Comment
                            </p>
                            <!-- Form -->
                            <form method="post" action="{{ url('comment/store') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- Half / Name -->
                                <input type="hidden" name="article_id" value="{{ $article->id }}">

                                <div class="col-xs-6 pl-00 pr-10">
                                    <input type="text" name="name" id="name" class="transparent fullwidth light-form" value="{{(!Auth::guest()) ? Auth::user()->name : old('NAME') }}">
                                </div>
                                <!-- Half / Email -->
                                <div class="col-xs-6 pl-10 pr-00">
                                    <input type="email" name="email" id="email" class="transparent fullwidth light-form" value="{{(!Auth::guest()) ? Auth::user()->email : old('EMAIL') }}">
                                </div>
                                <!-- Message -->
                                <div class="col-xs-12 pr-00 pl-00 mt-15">
                                    <textarea name="message" id="message" class="transparent fullwidth light-form" placeholder="Message"></textarea>
                                </div>
                                <!-- Button -->
                                <button type="submit" id="submit" name="submit" class="colored-bg uppercase">Send Comment</button>
                            </form>
                        </div>
                        <!-- End Reply Form -->
                    </div>


                </div>
                <!-- End Post Inner -->
            </div>
            <!-- End Post -->
        </div>
        <!-- End Posts -->

    </section>
    <!-- End Blog -->
@endsection