
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
<script src="{{asset('ckeditor5/build/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#post' ), {
            
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'fontSize',
                    'fontFamily',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',
            
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: q4bn1i51fajk-g5rd5klxqbye' );
            console.error( error );
    } );
</script>
@endsection