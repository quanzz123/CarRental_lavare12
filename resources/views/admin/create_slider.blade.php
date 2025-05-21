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
                    <h3>Thêm mới Slider</h3>
                    <p class="text-subtitle text-muted">Thêm hình ảnh mới vào trình chiếu</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin Slider</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="SliderName" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('SliderName') is-invalid @enderror" 
                                           id="SliderName" name="SliderName" value="{{ old('SliderName') }}" 
                                           placeholder="Nhập tiêu đề cho slider" required>
                                    @error('SliderName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="SliderUrl" class="form-label">Hình ảnh <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('SliderUrl') is-invalid @enderror" 
                                           id="SliderUrl" name="SliderUrl" accept="image/*" required>
                                    <small class="text-muted">Kích thước đề xuất: 1920x1080px, tối đa 2MB</small>
                                    @error('SliderUrl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="Isactive" 
                                               name="Isactive" value="1" {{ old('Isactive') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Isactive">Hiển thị slider</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" id="imagePreview" style="display: none;">
                                <label class="form-label">Xem trước</label>
                                <img src="" alt="Preview" class="img-fluid rounded" id="preview">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="bi bi-save"></i> Lưu
                                </button>
                                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-x"></i> Hủy
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('SliderUrl').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('preview').src = URL.createObjectURL(file);
            document.getElementById('imagePreview').style.display = 'block';
        }
    }
</script>
@endpush

@endsection