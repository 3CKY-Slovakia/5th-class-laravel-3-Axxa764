<!-- Portfolio Section -->
<section id="blog" class="container masonry-blog bl-4-col">

    <!-- Filters -->
    <div id="blog-filters" class="cbp-l-filters-alignCenter normal type2">

        <!-- Filter -->
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
            All
            <!-- Filter Counter -->
            <div class="cbp-filter-counter"></div>
        </div>
        <!-- Filter -->
        <div data-filter=".Graphic" class="cbp-filter-item">
            Graphic
            <!-- Filter Counter -->
            <div class="cbp-filter-counter"></div>
        </div>
        <!-- Filter -->
        <div data-filter=".design" class="cbp-filter-item">
            Design
            <!-- Filter Counter -->
            <div class="cbp-filter-counter"></div>
        </div>
        <!-- Filter -->
        <div data-filter=".photography" class="cbp-filter-item">
            Photography
            <!-- Filter Counter -->
            <div class="cbp-filter-counter"></div>
        </div>
        <!-- Filter -->
        <div data-filter=".web" class="cbp-filter-item">
            Web
            <!-- Filter Counter -->
            <div class="cbp-filter-counter"></div>
        </div>

    </div>
    <!-- End Filters -->


    <!-- Portfolio Items -->
    <div id="blog-items" class="fullwidth" >

        @foreach($articles as $article)
            <!-- Item -->
            <div class="cbp-item item design photography">
                <!-- Item Image -->
                <div class="item-top">
                    <!-- Post Link -->
                    <a href="{{ url('article/show/'.$article->id) }}" class="ex-link item_image">
                        <!-- Image Src -->
                        <img src="../images/portfolio/masonry/01.jpg" alt="Crexis">
                    </a>
                    <!-- Icon -->
                    <a href="#" class="item_button first">
                        <i class="fa fa-heart"></i>
                    </a>
                    <!-- Icon -->
                    <a href="#" class="item_button second">
                        <i class="fa fa-image"></i>
                    </a>
                </div>
                <!-- End Item Image -->

                <!-- Details -->
                <div class="details" >
                    <!-- Item Name -->
                    <a href="{{ url('article/show/'.$article->id) }}" class="ex-link">
                        <h2 class="head">
                            {{ str_limit($article->title, 50) }}
                        </h2>
                    </a>
                    <!-- Description -->
                    <p class="note mt-13 thin italic">
                        {{ $article->created_at->diffForHumans() }}
                    </p>
                    <!-- Description -->
                    <p class="description">
                        {!!($article->description !=  '' ? str_limit($article->description, 150) : str_limit($article->content, 150) ) !!}
                    </p>
                </div>
                <!-- End Center Details Div -->

                <!-- Posted By -->
                <a href="{{ url('article/show/'.$article->id) }}" class="posted_button">
                    <!-- Image SRC -->
                    <img src="../images/user_01.jpg" alt="user">
                    <p>
                        {{ $article->user->name }} |

                    </p>
                    <p>
                        @foreach($article->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </p>
                </a>
            </div>
            <!-- End Item -->
        @endforeach

    </div>
    <!-- End Portfolio Items -->


    <!-- <div id="loadMore-container" class="cbp-l-loadMore-text">
        <a href="ajax/loadMoreBlog.html" class="cbp-l-loadMore-link">
            <span class="cbp-l-loadMore-defaultText">MORE</span>
            <span class="cbp-l-loadMore-loadingText"><img src="../images/loader.gif" alt="loader" /></span>
            <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
        </a>
    </div> -->

</section>
<!-- End Portfolio Section -->