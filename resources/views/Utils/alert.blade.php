{{-- Message --}}
@if (Session::has('message'))
    <div class="fixed top-20 left-1/3 transform-translate-x-1/2 bg-gray-500 text-white px-48 py-3">
        {{ session('message') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Error !</strong> {{ session('error') }}
    </div>
@endif
