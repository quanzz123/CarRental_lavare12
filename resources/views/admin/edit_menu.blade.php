@extends('admin_layout')
@section('admin')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Thêm mới menu</h3>
                    <p class="text-subtitle text-muted">Quản lí thêm mới các menu</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sửa menu</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('admin.menu.update', $menu->id) }}">
                                @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control"
                                                    name="Title" placeholder="Title" value="{{$menu->Title}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Alias</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="email-id" class="form-control"
                                                    name="Alias" value="{{$menu->Alias}}" >
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="contact-info" class="form-control"
                                                    name="Description" placeholder="Decs" value="{{$menu->Description}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Levels</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" id="password" class="form-control"
                                                    name="Levels" value="{{$menu->Levels}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Position</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" id="password" class="form-control"
                                                    name="Position"value="{{$menu->Position}}" >
                                            </div>
                                            <div class="col-md-4">
                                                <label>IsActive</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="checkbox"  
                                                    name="Isactive" {{ $menu->Isactive ? 'checked' : '' }} >
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Sửa</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->

    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection