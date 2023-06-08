<x-app-layout>
    @section('style')
        <link rel="stylesheet" type="text/css" href="{{ asset('template-asset/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    @endsection

    <div class="row">
        <div class="col-sm-2 col-md-2">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="nav-vertical">
                            <ul class="nav nav-tabs nav-left nav-border-left">
                                <li class="nav-item">
                                    <a class="nav-link {{ $tab == App\Models\Post::TAB_PUBLISH ? 'active' : '' }}" href="{{ route($route . 'all_post') }}/?tab={{ App\Models\Post::TAB_PUBLISH }}">Publish</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $tab == App\Models\Post::TAB_DRAFT ? 'active' : '' }}" href="{{ route($route . 'all_post') }}/?tab={{ App\Models\Post::TAB_DRAFT }}">Draft</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $tab == App\Models\Post::TAB_THRASH ? 'active' : '' }}" href="{{ route($route . 'all_post') }}/?tab={{ App\Models\Post::TAB_THRASH }}">Thrash</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-md-10 tab-content">
            @switch($tab)
                @case(App\Models\Post::TAB_PUBLISH)
                    <div role="tabpanel" class="card tab-pane active">
                        <div class="card-header">
                            <h4 class="card-title">List Publish</h4>
                            <a class="heading-elements-toggle">
                                <i class="ft-align-justify font-medium-3"></i>
                            </a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="collapse">
                                            <i class="ft-minus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($data)
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>{{$item->title}}</td>
                                                                <td>{{$item->category}}</td>
                                                                <td>{{$item->status}}</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <a href="{{ route('frontend.edit.all_post', $item->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                            <i class="la la-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('frontend.delete.all_post', $item->id) }}" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin akan menghapus data?')">
                                                                            <i class="la la-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4" style="text-align: center">Data belum tersedia</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @break

                @case(App\Models\Post::TAB_DRAFT)
                    <div role="tabpanel" class="card tab-pane active" id="tabVehicleInfo">
                        <div class="card-header">
                            <h4 class="card-title">List Draft</h4>
                            <a class="heading-elements-toggle">
                                <i class="ft-align-justify font-medium-3"></i>
                            </a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="collapse">
                                            <i class="ft-minus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($data)
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>{{$item->title}}</td>
                                                                <td>{{$item->category}}</td>
                                                                <td>{{$item->status}}</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <a href="{{ route('frontend.edit.all_post', $item->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                            <i class="la la-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('frontend.delete.all_post', $item->id) }}" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin akan menghapus data?')">
                                                                            <i class="la la-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4" style="text-align: center">Data belum tersedia</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @break

                @case(App\Models\Post::TAB_THRASH)
                    <div role="tabpanel" class="card tab-pane active" id="tabVehicleInfo">
                        <div class="card-header">
                            <h4 class="card-title">List Thrash</h4>
                            <a class="heading-elements-toggle">
                                <i class="ft-align-justify font-medium-3"></i>
                            </a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="collapse">
                                            <i class="ft-minus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($data)
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>{{$item->title}}</td>
                                                                <td>{{$item->category}}</td>
                                                                <td>{{$item->status}}</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <a href="{{ route('frontend.edit.all_post', $item->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                            <i class="la la-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('frontend.delete.all_post', $item->id) }}" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin akan menghapus data?')">
                                                                            <i class="la la-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4" style="text-align: center">Data belum tersedia</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @break

                @default
            @endswitch
        </div>
    </div>

    @section('script')
        <script type="text/javascript">
        </script>
    @endsection
</x-app-layout>