@extends('page_layout')
@section('content')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Blog Sidebar</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Blog Main Area Start Here -->
<div class="blog-main-area">
    <div class="container container-default custom-area">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom widget-mt">
                <!-- Shop Wrapper Start -->
                <div class="row">
                    @foreach ($listofnews as $l )
                    <div class="col-12 col-md-6 col-custom mb-30">
                        <div class="blog-lst">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a class="d-block" href="{{url('news/'. $l->NewsID)}}">
                                        <img src="{{asset('public/fontend/assets/images/blog/'.$l->Image)}}" alt="Blog Image" class="w-100">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-text">
                                        <h4><a href="blog-details-fullwidth.html">{{$l->Title}}</a></h4>
                                        <div class="blog-post-info">
                                            <span><a href="#">By {{$l->CreatedBy}}</a></span>
                                            <span>{{$l->CreatedDate}}</span>
                                        </div>
                                        <p>{{$l->Description}}</p>
                                        <a href="blog-details-fullwidth.html" class="readmore">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
                <!-- Shop Wrapper End -->
                <!-- Bottom Toolbar Start -->
                <div class="row">
                    <div class="col-sm-12 col-custom">
                        <div class="toolbar-bottom">
                            <div class="pagination">
                                <ul>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#">next</a></li>
                                    <li><a href="#">&gt;&gt;</a></li>
                                </ul>
                            </div>
                            <p class="desc-content text-center text-sm-right mb-0">Showing 1 - 12 of 34 result</p>
                        </div>
                    </div>
                </div>
                <!-- Bottom Toolbar End -->
            </div>
            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget widget-mt">
                    <div class="widget_inner">
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Search</h3>
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Our Store" aria-label="Search Our Store">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Categories</h3>
                            <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    <li><a href="#">All Product</a></li>
                                    <li><a href="#">Best Seller (5)</a></li>
                                    <li><a href="#">Featured (4)</a></li>
                                    <li><a href="#">New Products (6)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list widget-mb-3">
                            <h3 class="widget-title">Tags</h3>
                            <div class="sidebar-body">
                                <ul class="tags">
                                    <li><a href="#">Rose</a></li>
                                    <li><a href="#">Sunflower</a></li>
                                    <li><a href="#">Tulip</a></li>
                                    <li><a href="#">Lily</a></li>
                                    <li><a href="#">Smart</a></li>
                                    <li><a href="#">Modern</a></li>
                                    <li><a href="#">Gift</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list mb-0">
                            <h3 class="widget-title">Recent Products</h3>
                            <div class="sidebar-body">
                                <x-recent-cars />
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Blog Main Area End Here -->    
@endsection
