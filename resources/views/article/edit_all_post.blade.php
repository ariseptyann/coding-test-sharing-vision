<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit {{ $title }}</h4>
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
                        <form action="{{ route('frontend.update.all_post', $id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                @include($view.'field', [
                                    'isEdit' => true
                                ])
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <a href="{{ route('frontend.publish.all_post', $id) }}" class="btn btn-outline-secondary" onclick="return confirm('Yakin ingin mempublish artikel?')">
                                        Publish
                                    </a>
                                    <a href="{{ route('frontend.draft.all_post', $id) }}" class="btn btn-outline-secondary" onclick="return confirm('Artikel akan dirubah menjadi draft?')">
                                        Draft
                                    </a>
                                    <button type="submit" class="btn btn-outline-primary"> 
                                        <i class="ft-check"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>