
@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Post</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('update-post',$post->id) }}">@csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" name="judul" value="{{$post->judul}}" class="form-control" placeholder="Judul">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Post</label>
                    <textarea name="post" id="post" cols="30" rows="10">{!!$post->post!!}</textarea>
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-round">Sumbit</button>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  @endsection

  @section('script')
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script src="{{asset("js/jquery.table2excel.js")}}"></script>

<script>
  CKEDITOR.replace('post', {
            filebrowserUploadUrl: "{{route('post.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
  @endsection