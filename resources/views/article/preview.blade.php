<x-app-layout>
    <div id="listPreviewArticle">

    </div>

    @section('script')
        <!-- Pagination-->
        <script src="{{ asset('template-asset/app-assets/vendors/js/pagination/jquery.bootpag.min.js') }}"></script>
        <script src="{{ asset('template-asset/app-assets/vendors/js/pagination/jquery.twbsPagination.min.js') }}"></script>
        <script src="{{ asset('template-asset/app-assets/vendors/js/pagination/moment.min.js') }}"></script>
        <script src="{{ asset('template-asset/app-assets/vendors/js/pagination/datepicker.js') }}"></script>
        <script src="{{ asset('template-asset/app-assets/vendors/js/pagination/bootstrap-datepaginator.min.js') }}"></script>
        <script src="{{ asset('template-asset/app-assets/js/scripts/pagination/pagination.js') }}"></script>
        <script type="text/javascript">
            $(document).on('click', '.paginate', function(e){
                e.preventDefault();
                var searchParams = new URLSearchParams(window.location.search);
                searchParams.set(`page`, '1');
                var newUrl = '?'+searchParams.toString();
                window.history.pushState({}, '', newUrl);
                let page = $(this).data('page');
                let queryString = `page`;
                getQueryString(queryString, page);
            });

            $(document).ready(function () {
                getData();
            });

            function getQueryString(queryString = '', value = '')
            {
                let currentUrl = window.location.href;
                if(currentUrl.indexOf("?page=") > -1)
                {
                    if(currentUrl.indexOf(queryString) > -1)
                    {
                        var parameters = new URLSearchParams(window.location.search);
                        let val = parameters.get(queryString) //1
                        if(value === '')
                        {
                            var searchParams = new URLSearchParams(window.location.search);
                            var newUrl = removeParam(queryString, currentUrl);
                            window.history.pushState({}, '', newUrl);
                            getData(newUrl);
                        }else {
                            if(val !== value)
                            {
                                var searchParams = new URLSearchParams(window.location.search);
                                searchParams.set(queryString, value);
                                var newUrl = '?'+searchParams.toString();
                                window.history.pushState({}, '', newUrl)
                                getData(newUrl);
                            }
                        }
                    }else {
                        let newUrl = currentUrl+'&'+queryString+'='+value;
                        window.history.pushState({}, '', newUrl);
                        getData(newUrl);
                    }
                }else {
                    let newUrl = currentUrl+'?page=1&'+queryString+'='+value;
                    window.history.pushState({}, '', newUrl);
                    getData(newUrl);
                }
            }

            function removeParam(key, sourceURL) {
                var rtn = sourceURL.split("?")[0],
                    param,
                    params_arr = [],
                    queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
                if (queryString !== "") {
                    params_arr = queryString.split("&");
                    for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                        param = params_arr[i].split("=")[0];
                        if (param === key) {
                            params_arr.splice(i, 1);
                        }
                    }
                    if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
                }
                return rtn;
            }

            function getData(url = ''){
                if(url.indexOf("?page=1") > -1){
                    $.ajax({
                        url: url,
                        method: "GET",
                        cache: false,
                        success: function(data)
                        {
                            $('#listPreviewArticle').html(data);
                        }
                    });
                }else {
                    let currentUrl = window.location.href;
                    $.ajax({
                        url: currentUrl,
                        method: "GET",
                        cache: false,
                        success: function(data)
                        {
                            $('#listPreviewArticle').html(data);
                        }
                    });
                }

            }
        </script>
    @endsection
</x-app-layout>