@foreach ($data as $item)
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <h3>{{$item->title}}</h3>
                    <h5 class="badge badge-primary">Category: {{$item->category}}</h5>
                    <hr>
                    <br>
                    <p>{{$item->content}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@if ($data->lastPage() > 1)
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-right pagination-separate pagination-round pagination-flat">
            {!! getPrevious($data->currentPage(), $data->currentPage()-1 ) !!}
            @php
                $no = 1;
            @endphp
            @if ($data->currentPage() > 2 )
                <li class="page-item">
                    <a href="javascript:void(0)" class="page-link paginate" data-page="{{ '1' }}">1</a>
                </li>
            @endif
            @if($data->currentPage() > 3)
                <li class="page-item"><span>.</span></li>
            @endif
            @foreach(range(1, $data->lastPage()) as $i)
                @if($i >= $data->currentPage() - 1 && $i <= $data->currentPage() + 1)
                    @if ($i == $data->currentPage())
                        <li class="page-item active">
                            <a href="javascript:void(0)" class="page-link" aria-controls="exit-goods" data-dt-idx="1" tabindex="0">
                                {{ $i }}
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="javascript:void(0)" class="page-link paginate" data-page="{{ $i }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endif
                @endif
                @endforeach
                @if($data->currentPage() < $data->lastPage() - 2)
                    <li class="page-item"><span>.</span></li>
                @endif
                @if($data->currentPage() < $data->lastPage() - 1)
                    <li class="page-item">
                        <a href="javascript:void(0)" class="page-link paginate" data-page="{{ $data->lastPage() }}">{{ $data->lastPage() }}</a>
                    </li>
                @endif
            {!! getNext($data->currentPage(), $data->lastPage(), $data->currentPage()+1 ) !!}
        </ul>
    </nav>
@endif