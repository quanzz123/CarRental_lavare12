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
                    <h3>MENU</h3>
                    <p class="text-subtitle text-muted">quản lí menu</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        
        <!-- Inverse table end -->
        <!-- Table head options start -->
        <section class="section">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách menu</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                            
                                <a class="btn btn-success rounded-pill" href="{{route('admin.menu.create')}}">Thêm mới</a>
                            </div>
                            <!-- table head dark -->
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Title</th>
                                            <th>Alias</th>
                                            <th>Description</th>
                                            <th>Levels</th>
                                            <th>Position</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menus as $m)
                                            <tr>
                                                <td class="text-bold-500">{{$m->Title}}</td>
                                                
                                                <td class="text-bold-500">{{$m->Alias}}</td>
                                                <td>{{$m->Description}}</td>
                                                <td>{{$m->Levels}}</td>
                                                <td>{{$m->Position}}</td>
                                                <td style="display: flex;">
                                                    <a class="btn btn-primary"  href="{{route('admin.menu.edit', $m->id)}}">Sửa</a> |
                                                    <form action="{{route('admin.menu.destroy', $m->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có chắc chắn muốn xoá menu này hay không?')" type="submit" class="btn btn-danger">Xoá</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->

        
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