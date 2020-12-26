@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Contact (Provinsi)</h4>
            <button style="float: right" class="btn btn-success"><i class="nc-icon nc-simple-add"></i> Tambah </button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                    <th scope="col">#</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">URL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ACTION</th>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$contact->provinsi}}</td>
                      <td>{{$contact->url}}</td>
                      <td>{{$contact->no_telp}}</td>
                      <td style="display: flex">
                        <a href="{{ route('update-contact', $contact->id) }}" style="margin-right: 10px;"><i class="nc-icon nc-paper"></i></a>
                        <a href="#" data-toggle="modal" data-record-id="{{ $contact->id }}" data-target="#confirm-delete"><i class="nc-icon nc-simple-remove"></i></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Contact (Kabupaten)</h4>
            <button style="float: right" class="btn btn-success"><i class="nc-icon nc-simple-add"></i> Tambah </button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                    <th scope="col">#</th>
                    <th scope="col">Kabupaten</th>
                    <th scope="col">URL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ACTION</th>
                </thead>
                <tbody>
                    @foreach ($kabupatens as $contact)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$contact->kabupaten}}</td>
                      <td>{{$contact->url}}</td>
                      <td>{{$contact->no_telp}}</td>
                      <td style="display: flex">
                        <a href="{{ route('update-contact', $contact->id) }}" style="margin-right: 10px;"><i class="nc-icon nc-paper"></i></a>
                        <a href="#" data-toggle="modal" data-record-id="{{ $contact->id }}" data-target="#confirm-delete"><i class="nc-icon nc-simple-remove"></i></a>
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
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure to Delete This Data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-ok">Delete</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection