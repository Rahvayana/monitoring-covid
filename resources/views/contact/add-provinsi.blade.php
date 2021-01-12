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
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kabupaten</th>
                        <th scope="col">URL</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($kabupatens as $kabupaten)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$kabupaten->kabupaten}}</td>
                      <td>{{$kabupaten->url}}</td>
                      <td>{{$kabupaten->no_telp}}</td>
                      <td style="display: flex">
                        <a href="{{ route('update-contact', $kabupaten->id) }}" style="margin-right: 10px;"><span class="badge bg-success"><i class="fa fa-book"></i></span></a>
                        <a href="#" data-toggle="modal" data-record-id="{{ $kabupaten->id }}" data-target="#confirm-delete"><span class="badge bg-red"><i class="fa fa-trash"></i></span></a>
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
