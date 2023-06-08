<ol class="breadcrumb">
    <li class="breadcrumb-item">
        @if (Route::is('frontend.all_post'))
            Article
        @else
            <a href="{{ route('frontend.all_post') }}">Article</a>
        @endif
    </li>
  
    @isset($breadcrumbs)
        @foreach ($breadcrumbs as $r)
            @if (!is_null($r[1]))
                <li class="breadcrumb-item">
                    <a href="{{ $r[1] }}">{{ $r[0] }}</a>
                </li>
            @else
                <li class="breadcrumb-item">{{ $r[0] }}</li>
            @endif
        @endforeach      
    @endisset
</ol>