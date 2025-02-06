@extends('admin.layout.app')

@section('article-active')
    active
@endsection

@section('page-title')
    {{ __('Create Article') }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .label-title {
            font-size: 2vh !important;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="needs-validation" action="{{ route('admin.articles.store') }}">
                        @csrf
                        <div class="form-group row mb-4">
                            <div class="text-md-right col-12 col-md-12 col-lg-12">
                                <button class="btn btn-primary"><span>{{ __('Add') }}</span></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label class="form-control-label text-md-right label-title">{{ __('Theme') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <select name="theme_id"
                                            class="form-control {{ $errors->has('theme_id') ? ' is-invalid' : '' }}">
                                            @foreach (App\Models\Theme::all() as $theme)
                                                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('theme_id') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label class="form-control-label text-md-right label-title">{{ __('Title') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="text" placeholder="{{ __('Title') }}" name="title"
                                            class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                            value="{{ old('title') }}" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label class="form-control-label text-md-right label-title">{{ __('Author') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <select name="author_id"
                                            class="form-control {{ $errors->has('author_id') ? ' is-invalid' : '' }}">
                                            @foreach (App\Models\Author::all() as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('author') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label class="form-control-label text-md-right label-title">Image</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-header pb-0 col-12 col-md-9 col-lg-9">
                                        <h6>{{ __('Attachment') }}
                                            <small
                                                class="d-block">({{ __('Upload the banner image of the article.') }})</small>
                                        </h6>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="dropzone" id="files-upload"></div>
                                        <input type="hidden" value="" name="image" id="image">
                                        <small class="d-block text-danger">
                                            Please upload an image with dimensions <span style="font-weight: bold;">1200x628
                                                pixels</span> to ensure optimal display quality.
                                        </small>
                                    </div>
                                    <p class="multiple_file_selection mx-4"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label class="form-control-label text-md-right label-title">{{ __('Content') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body pt-0">
                                        <textarea name="content" rows="10" class="content-editor form-control {{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('content') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label
                                    class="col-form-label form-control-label text-md-right label-title">{{ __('Meta Title') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="text" placeholder="{{ __('Meta Title') }}" name="meta_title"
                                            class="form-control {{ $errors->has('meta_title') ? ' is-invalid' : '' }}"
                                            value="{{ old('meta_title') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('meta_title') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label
                                    class="col-form-label form-control-label text-md-right label-title">{{ __('Tag') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <select name="tag"
                                            class="form-control {{ $errors->has('tag') ? ' is-invalid' : '' }}"
                                            value="{{ old('tag') }}">
                                            <option value="Planning">Planning</option>
                                            <option value="Motivation">Motivation</option>
                                            <option value="Inspiration">Inspiration</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('tag') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label
                                    class="col-form-label form-control-label text-md-right label-title">{{ __('Meta Description') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <textarea name="meta_description" rows="5"
                                            class="form-control {{ $errors->has('meta_description') ? ' is-invalid' : '' }}">{{ old('meta_description') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('meta_description') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label
                                    class="col-form-label form-control-label text-md-right label-title">{{ __('Focus keyphrase') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="text" placeholder="{{ __('Focus keyphrase') }}"
                                            name="focus_keyphrase"
                                            class="form-control {{ $errors->has('focus_keyphrase') ? ' is-invalid' : '' }}"
                                            value="{{ old('focus_keyphrase') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('focus_keyphrase') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <label
                                    class="col-form-label form-control-label text-md-right label-title">{{ __('Schema') }}</label>
                            </div>
                            <div class="col-12 col-md-9 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <textarea name="schema" rows="5" class="form-control {{ $errors->has('schema') ? ' is-invalid' : '' }}">{{ old('schema') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('schema') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="text-md-right col-12 col-md-12 col-lg-12">
                                <button class="btn btn-primary"><span>{{ __('Add') }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/latest/classic/ckeditor.js"></script>
    <script src="{{ asset('admin-assets/js/editorplaceholder.js') }}"></script>
    <!-- A friendly reminder to run on a server, remove this during the integration. -->
    <script>
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
        ClassicEditor
        .create(document.querySelector('.content-editor'))
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    <script>
        Dropzone.options.filesUpload = {
            url: '{{ route('admin.articles.file-upload') }}',
            paramName: "file",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            maxFiles: 1, // Limit to one file
            init: function() {
                // No preloading logic for the Add Page
                console.log("Dropzone initialized for Add Page");
            },
            accept: function(file, done) {
                if (file.name === "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            success: function(file) {
                var response = JSON.parse(file.xhr.responseText);
                $('#image').val(response.name);

                // Remove older files if a new one is uploaded
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            }
        };
    </script>
@endpush
