@extends('layouts.master')

@section('title', 'Pengeluaran')
{{-- @section('header', 'Pengeluaran') --}}
@section('breadcrumb', 'Pengeluaran')
@section('container-fluid')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Pengeluaran</h5>
            <div class="card-body">
                <form action="/pengeluaran" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Rp. " aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-info" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                      </div>
                </form>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>


@endsection