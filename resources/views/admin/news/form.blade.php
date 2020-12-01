@extends('layouts.admin')


@section('content')
    {{-- TITLE --}}
    <div class="row">
        <div class="col">
            <h1 class="h1 pb-4">
                @if(empty($news)) {{ __('pages.admin.createNews') }}
                @else {{ __('pages.admin.editNews', ['id' => $news->id]) }}
                @endif
            </h1>
        </div>
    </div>

    <div class="row">
        {{-- FORM --}}
        <div class="col-6">
            {{-- TODO: after backend validation tested, apply JS validation --}}
            <form method="post" enctype="multipart/form-data"
                  action="@if(empty($news)) {{ route('admin.news.store') }}">
                @else {{ route('admin.news.update', $news) }} "> @method('PUT')
                @endif
                @csrf
                {{-- Title --}}
                <div class="form-group mt-3">
                    <label for="title">Title<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="title" id="title"
                           value="{{ old('title', optional($news)->title) }}" required>
                    @error('title') <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Description --}}
                <div class="form-group">
                    <label for="description">Description<sup class="text-danger">*</sup></label>
                    <textarea class="form-control" name="description"
                              id="description" required
                              rows="2">{{ old('description', optional($news)->description) }}</textarea>
                    @error('description') <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Content --}}
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content"
                              id="content" rows="5">{!! old('content', optional($news)->content) !!}</textarea>
                    @error('content') <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Image --}}
                <div class="form-group">
                    <label for="title">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image') <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Link --}}
                <div class="form-group mt-3">
                    <label for="link">Link for external article</label>
                    <input type="text" class="form-control" name="link" id="link"
                           value="{{ old('link', optional($news)->link) }}">
                    @error('link') <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Category --}}
                <div class="form-group">
                    <label for="category_id">Category<sup class="text-danger">*</sup></label>
                    <select class="form-control" name="category_id" id="category_id">
                        @forelse($categories as $cat)
                            {{-- TODO several categories --}}
                            <option @if(old('category_id') == $cat->id) selected @endif
                            value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @empty
                            <option value="0">No categories</option>
                        @endforelse
                    </select>
                    @error('category_id')<small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Source --}}
                <div class="form-group">
                    <label for="source_id">Source<sup class="text-danger">*</sup></label>
                    <select class="form-control" name="source_id" id="source_id">
                        @forelse($sources as $source)
                            <option value="{{ $source->id }}"
                                    @if(old('source_id', optional($news)->source_id) == $source->id) selected
                                @endif>{{ $source->name }}</option>
                        @empty
                            <option value="0">No sources</option>
                        @endforelse
                    </select>
                    @error('source_id') <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Submit --}}
                <button type="submit" class="btn btn-primary">
                    @if(empty($news)) {{ __('elements.button.create') }}
                    @else {{ __('elements.button.save') }}
                    @endif</button>
            </form>
        </div>

        {{-- IMAGE --}}
        <div class="col-6">
            @if($news)
                <img src="{{ Storage::disk('uploads')->url($news->image) }}" alt="" class="img-100">
            @endif
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        let route_prefix = "/filemanager";
        let options = {
            baseHref: '{{ env('APP_URL') }}/',
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        };
        CKEDITOR.replace('content', options);
    </script>
@endpush

