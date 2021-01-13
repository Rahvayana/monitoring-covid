
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
            <form action="{{ route('save-contact', $contact->id) }}" method="POST">@csrf
                <table class="table">
                    <tr>
                        <td>Provinsi:</td>
                        @if ($contact->provinsi)
                        <td><input type="text" class="form-control" name="provinsi" id="provinsi" value="{{$contact->provinsi??$contact->kabupaten}}"></td>
                            
                        @else
                        <td><input type="text" class="form-control" name="kabupaten" id="kabupaten" value="{{$contact->provinsi??$contact->kabupaten}}"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>URL:</td>
                        <td><input type="text" name="url" class="form-control" id="url" value="{{$contact->url}}"></td>
                    </tr>
                    <tr>
                        <td>No Telp:</td>
                        <td><input type="text" class="form-control" name="no_telp" id="no_telp" value="{{$contact->no_telp}}"></td>
                    </tr>
                </table>
                <button class="btn btn-success">Update</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  @endsection