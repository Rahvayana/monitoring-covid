@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Post</h4>
            <a href="{{ route('add-post') }}"><button style="float: right" class="btn btn-success"><i class="nc-icon nc-simple-add"></i> Tambah </button></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$post->judul}}</td>
                      <td>{{date("d-m-Y", strtotime($post->created_at))}}</td>
                      <td style="display: flex">
                        <a href="{{ route('view-post', $post->id) }}" style="margin-right: 10px;"><i class="nc-icon nc-paper"></i></a>
                        <a href="#" data-toggle="modal" data-record-id="{{ $post->id }}" data-target="#confirm-delete"><i class="nc-icon nc-simple-remove"></i></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
