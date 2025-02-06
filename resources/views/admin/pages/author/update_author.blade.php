@extends('admin.layout.app')

@section('page-title')
    {{ __('Create Author') }}
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.min.css') }}" type="text/css"/>
    <style>
        /* #myFile {
                padding: 10px;
                color: #FFFF;
                background: #0f5ef7;
                border-radius: 5px
            } */

        /* Hide the default file input */
        #myFile {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }

        /* Style the custom button */
        .custom-file-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0f5ef7;
            /* Blue color */
            color: #fff;
            /* White text */
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for the button */
        .custom-file-button:hover {
            background-color: #0d4ec6;
            /* Darker blue on hover */
        }

        /* Container to hold the custom button and file name */
        .file-input-container {
            position: relative;
            display: inline-block;
        }

        /* Style for the file name display */
        .file-name {
            margin-left: 10px;
            color: #666;
        }
    </style>
@endpush
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{route('admin.authors.update', ['author' => @$author->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.pages.author.form.author_form')
                        <div class="form-group row mb-4">
                            <div class="text-md-right col-12 col-md-12 col-lg-12">
                                <button class="btn btn-primary btn-submit"><span>{{ __('Update') }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function displayFileName() {
        var fileInput = document.getElementById('myFile');
        var fileNameDisplay = document.getElementById('file-name-display');
        var fileName = fileInput.files[0] ? fileInput.files[0].name : '';
        if (fileName) {
            fileNameDisplay.textContent = 'Selected file: ' + fileName;
        } else {
            fileNameDisplay.textContent = ''; // Clear the file name if no file is selected
        }
    }
</script>
@endpush
