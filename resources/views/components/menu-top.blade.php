<div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
    <nav class="main-nav d-none d-lg-flex">
        <ul class="nav">
        @foreach ($menu as $m)
            <li>
                <a class="active" href="{{ url($m->Alias .'/')}}">
                    <span class="menu-text"> {{$m->Title}}</span>
                    
                </a>
                
            </li>
            @endforeach
        </ul>
    </nav>
</div>