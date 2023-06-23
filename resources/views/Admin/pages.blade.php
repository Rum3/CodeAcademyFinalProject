@extends('layout')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 600px;
        }
</style>
@section('content')
<div class="container">
    <form action="{{ url('store-input-fields') }}" method="POST">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
        @endif
    <div class="form-group">
        <label for="role">Menu for Role:</label>
        <select class="form-control" id="role">
            <option>Admin</option>
            <option>Student</option>
            <option>Employer</option>
            <option>Teacher</option>
            <option>Regular</option>
        </select>
    </div>

    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>Main</div>
            <div>
                @include('utils.buttons')
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Info</div>
                    <div>
                        @include('utils.buttons')
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Available Trainings</div>
                    <div>
                        @include('utils.buttons')
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Overall Progress</div>
                            <div>
                                @include('utils.buttons')
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Grades</div>
                            <div>
                                @include('utils.buttons')
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Training</div>
                            <div>
                                @include('utils.buttons')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
    var i = 0;

    $(".add").click(function () {
        ++i;
        $("#dynamicAddRemove").append(
            '<div class="card">' +
                '<div class="card-header d-flex justify-content-between align-items-center">' +
                    '<div>Content here...</div>' +
                    '<div>' +
                        '<button class="btn btn-success add"><i class="fas fa-plus"></i></button>' +
                        '<button class="btn btn-primary edit"><i class="fas fa-pen"></i></button>' +
                        '<button class="btn btn-primary file"><i class="fas fa-file"></i></button>' +
                        '<button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>' +
                    '</div>' +
                '</div>' +
            '</div>'
        );
    });

    $(document).on('click', '.remove', function () {
        $(this).parents('.card').remove();
    });
});

</script>

@endpush
