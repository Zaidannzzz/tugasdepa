@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Silahkan Upload Bukti Pembayaran</div>
                    <div class="card-body">
                        <form action="/bukti" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                                <label for="bank">BANK:</label>
                                <input type="text" id="bank" name="bank" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Atas Nama:</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                        <img src="images/{{ Session::get('image') }}">
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group mt-3">
                            <label for="image">Upload Bukti Pembayaran</label>
                            <input type="file" name="image" id="image">
                        </div>
                        </form>
                        <div class="row mb-0 mt-5">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Unggah Bukti Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
