<div class="row">
    @foreach($carTypes as $index => $type)
        <div class="cat-{{ $index + 1 }} col-md-{{ [7,5,4,8][$index % 4] ?? 4 }} col-custom">
            <div class="categories-img mb-30">
                <a href="#">
                    <img src="{{ asset('public/fontend/assets/images/category/' . $type->Image) }}" alt="{{ $type->CarTypeName }}">
                </a>
                <div class="categories-content">
                    <h3>{{ $type->CarTypeName }}</h3>
                    <h4>{{ $type->Seats ?? 0 }} seats</h4>
                </div>
            </div>
        </div>
    @endforeach
</div>
