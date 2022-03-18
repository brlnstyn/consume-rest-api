@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-warning" href="/users">Back</a>
        </div>
    </div>
</div>


<form action="{{ url()->current() }}" method="POST" autocomplete="off">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>First Name</strong>
                <input type="text" name="nama_depan" class="form-control" placeholder="First Name" value="{{ $user['firstName'] }}" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Last Name</strong>
                <input type="text" name="nama_belakang" class="form-control" placeholder="Last Name" value="{{ $user['lastName'] }}" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection