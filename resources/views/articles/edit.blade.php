@extends('layouts.blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit article</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('article/update/'.$article->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ $article->title }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><i class="fa fa-vimeo-square"></i> Video ID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="video" value="{{ $article->video }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description">{{ $article->description }}</textarea>
                                </div>
                            </div>

                            <textarea class="summernote" name="content">{{ $article->content }}</textarea>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Tags</label>
                                <div class="col-md-6">
                                    @foreach($tags as $tag)
                                        <input {{ $checkedTags->contains($tag)? "checked='checked'" :""}} name="tags[]" type="checkbox" value="{{$tag->id}}">{{ $tag->name }}</input>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Update article
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