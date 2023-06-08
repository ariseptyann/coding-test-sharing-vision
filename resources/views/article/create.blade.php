<x-app-layout>
    @section('style')
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    @endsection

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create {{ $title }}</h4>
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
                        <form id="formAddNew" method="get" action="javascript:void(0)">
                            <div class="form-body">
                                @include($view.'field')
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="btnPublish"> 
                                        Publish
                                    </button>
                                    <button type="submit" class="btn btn-secondary" id="btnDraft"> 
                                        Draft
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            $(document).on('click', '#btnPublish', function(e) {
                e.preventDefault();
                var url = '{{ route('frontend.add_new.publish') }}';

                $.ajax({
                    url: url,
                    dataType: "json",
                    data: $('#formAddNew').serialize(),
                    success: function(res) {
                        var errorTitle      = res.message.title ? res.message.title : '';
                        var errorContent    = res.message.content ? res.message.content : '';
                        var errorCategory   = res.message.category ? res.message.category : '';

                        if (res.error == true) {
                            Swal.fire('Opps',  errorTitle + ' ' + errorContent + ' ' + errorCategory, 'error')
                        }else{
                            Swal.fire('Success', res.message, 'success')
                        }

                    }
                });
            })

            $(document).on('click', '#btnDraft', function(e) {
                e.preventDefault();
                var url = '{{ route('frontend.add_new.draft') }}';

                $.ajax({
                    url: url,
                    dataType: "json",
                    data: $('#formAddNew').serialize(),
                    success: function(res) {
                        var errorTitle      = res.message.title ? res.message.title : '';
                        var errorContent    = res.message.content ? res.message.content : '';
                        var errorCategory   = res.message.category ? res.message.category : '';

                        if (res.error == true) {
                            Swal.fire('Opps',  errorTitle + ' ' + errorContent + ' ' + errorCategory, 'error')
                        }else{
                            Swal.fire('Success', res.message, 'success')
                        }

                    }
                });
            })
        </script>
    @endsection
</x-app-layout>