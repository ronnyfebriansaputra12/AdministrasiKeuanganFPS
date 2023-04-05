@extends('layouts.master')

@section('title', 'Pemasukan')
{{-- @section('header', 'Pemasukan') --}}
@section('breadcrumb', 'Pemasukan')
@section('container-fluid')


    <div class="container">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fas fa-plus"></i> Insert Data
    </button>

        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-stripped example">
                    <thead>
                        <th>No</th>
                        <th>Pemasukan</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        @foreach ($datas as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ number_format( $p->jumlah_pemasukan) }}</td>
                            <td>{{ date('d-m-Y', strtotime($p->created_at)); }}</td>
                            <td>
                                <button type="button" id="btn-detail" value="{{ $p->id }}"class="btn btn-info btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                  </svg> Detail</button>

                                <button type="button" id="btn-edit" value="{{ $p->id }}"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>

                                <a href="#" id="btn-hapus" class="btn btn-danger btn-sm" data-id="{{ $p->id }}" ><i class="fa-solid fas fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Modal Insert Data -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"                 aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Pemasukan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="/pemasukan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="jumlah_pemasukan" class="form-label">Jumlah Pemasukan</label>
                                <input type="number" class="form-control @error('jumlah_pemasukan') is-invalid @enderror" id="jumlah_pemasukan" value="{{ old('jumlah_pemasukan') }}" name="jumlah_pemasukan" placeholder="Pemasukan" autofocus>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Update Data -->
        <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel"                 aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-center" id="modalUpdateLabel">Pemasukan Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pemasukan/{{ $p->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="id">

                            <div class="mb-3">
                                <label for="jumlah_pemasukan" class="form-label">Jumlah Pemasukan</label>
                                <input type="number" id="pemasukan" class="form-control @error('jumlah_pemasukan') is-invalid @enderror" id="jumlah_pemasukan" value="{{ old('jumlah_pemasukan') }}" name="jumlah_pemasukan" placeholder="Pemasukan" autofocus>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Data -->
        <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel"                 aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-center" id="modalDetailLabel">Pemasukan Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <tr>
                            <td>Jumlah Pemasukan</td>
                            <td>:</td>
                            <td id="jumlah_pemasukan"></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td id="tanggal"></td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>

    $(document).on('click', '#btn-hapus', function(e){
        e.preventDefault();
        var link = $(this).attr('data-id');
        console.log(link);

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Akan di Hapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/pemasukan/"+link+"";
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                }
            })
    })


</script>
<script>

    $(document).ready(function() {
        $('.example').DataTable();
    } );

</script>

<script>
    $(document).on('click', '#btn-edit', function (){
        var id = $(this).val();
        $('#modalUpdate').modal('show');
        $.ajax({
            type: "GET",
            url: "/pemasukan/"+id+"/edit",
            success: function (response) {
                console.log(response.pemasukan.jumlah_pemasukan);
                $('#id').val(response.pemasukan.id);
                $('#pemasukan').val(response.pemasukan.jumlah_pemasukan);

            }
        });
    })

    $(document).on('click', '#btn-detail', function (){
        var id = $(this).val();
        $('#modalDetail').modal('show');
        $.ajax({
            type: "GET",
            url: "/pemasukan/"+id+"/edit",
            success: function (response) {
                console.log(response);
                $('#id').val(response.pemasukan.id);
                $('#pemasukan').val(response.pemasukan.jumlah_pemasukan);
                $('#tanggal').val(response.pemasukan.created_at);

            }
        });
    })

</script>

@endsection
