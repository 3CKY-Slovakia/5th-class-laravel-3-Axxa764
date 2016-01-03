@extends('layouts.blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create article</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('article/store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><i class="fa fa-vimeo-square"></i> Video ID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="video" value="{{ old('video') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
                                </div>
                            </div>

                            <textarea class="summernote" name="content"></textarea>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Tags</label>
                                <div class="col-md-6">
                                    @foreach($tags as $tag)
                                        <input name="tags[]" type="checkbox" value="{{$tag->id}}">{{$tag->name }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Create article
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection