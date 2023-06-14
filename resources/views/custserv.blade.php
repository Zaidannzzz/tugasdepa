@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Service</div>
                    <div class="card-body">
                        <form method="POST" action="/customerservice">
                        @csrf
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label no-padding-right" for="desc">Description</label>
                                <input type="text" id="desc" placeholder="Description" class="form-control" name="description" required="" />
                            </div>
                            <div class="row mb-0 mt-5">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
