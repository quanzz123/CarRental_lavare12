<div class="row">
    @foreach ($newsview as $new )
    <div class="col-12 col-md-4 col-lg-4 col-custom mb-30">
        <div class="blog-lst">
            <div class="single-blog">
                <div class="blog-image">
                    <a class="d-block" href="blog-details-fullwidth.html">
                        <img src="{{asset('fontend/assets/images/blog/'.$new->Image)}}" alt="Blog Image" class="w-100">
                    </a>
                </div>
                <div class="blog-content">
                    <div class="blog-text">
                        <h4><a href="{{url('blog/'. $new->Alias)}}">{{$new->Title}}</a></h4>
                        <div class="blog-post-info">
                            <span><a href="#">By admin</a></span>
                            <span>December 18, 2022</span>
                        </div>
                        <p>{{$new->Description}}</p>
                        <a href="blog-details-fullwidth.html" class="readmore">Read More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
</div>