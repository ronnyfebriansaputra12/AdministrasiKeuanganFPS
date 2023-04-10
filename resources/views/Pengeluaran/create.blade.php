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
                <form class="row g-3" method="post" id="input" action="/pengeluaran">
                    @csrf
                  <div class="input-group mb-3">
                        <input type="text" class="form-control" id="id_pemasukan" name="id_pemasukan" placeholder=" Pemasukan Rp. " aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-success" type="button" id="convert"><i class="fa fa-check"></i></button>
                        <button class="btn btn-info" type="button" id="btn-show"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </div>

                  </form>
            </div>
        </div>
    </div>
</div>

        <!-- Modal cek data Data -->
        <div class="modal fade" id="modalGetData" tabindex="-1" aria-labelledby="modalGetDataLabel"                 aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-center" id="modalGetDataLabel">Pemasukan Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-stripped data">
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
                                      <button class="btn btn-sm btn-info" id="select" data-pemasukan = {{ $p->jumlah_pemasukan }}><i class="fa fa-check"></i> Select</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
        $(document).on('click', '#btn-show', function (){
        var id = $(this).val();
        $('#modalGetData').modal('show');
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


    $(document).ready(function(){
      $(document).on('click', '#select', function(){
        var pemasukan = $(this).data('pemasukan');
        $('#id_pemasukan').val(pemasukan);
        $('#modalGetData').modal('hide');
      })
    })

    $(document).ready(function(){
            var uangMasuk = document.getElementById('id_pemasukan');
            $(document).on('click', '#convert', function(){
            if(uangMasuk.value == 0){
                alert('Silahkan pilih data pemasukan terlebih dahulu')
            }else{
                var wasit = uangMasuk.value - 100000;
                $('#input').append('<d class="mb-3 col-md-6"><label for="Gaji Wasit" class="form-label">Gaji wasit</label><input type="number" name="wasit" class="form-control" id="gaji-wasit" value="'+100000+'"></d iv>');
                
                var laundry = wasit - 50000;
                $('#input').append('<div class="mb-3 col-md-6"><label for="Laundry" class="form-label">Laundry</label><input type="number" name="laundry" class="form-control" id="laundry" value="'+50000+'"></div>');

                var fotographer = laundry - 100000;
                $('#input').append('<div class="mb-3 col-md-6"><label for="Fotographer" class="form-label">Fotographer</label><input type="number" name="fotografer" class="form-control" id="fotographer" value="'+100000+'"></div>');


                var korlap = fotographer - 50000;
                $('#input').append('<div class="mb-3 col-md-6"><label for="Korlap" class="form-label">Korlap</label><input type="number" name="korlap" class="form-control" id="korlap" value="'+50000+'"></div>');


                var admin = korlap - 50000;
                $('#input').append('<div class="mb-3 col-md-6"><label for="Admin" class="form-label">Admin</label><input type="number" name="admin" class="form-control" id="admin" value="'+50000+'"></div>');

                var sewa_lapangan = admin - 100000;
                $('#input').append('<div class="mb-3 col-md-4"><label for="Sewa Lapangan" class="form-label">Sewa Lapangan</label><input type="number" name="sewa_lapangan" class="form-control" id="sewa-lapangan" value="'+100000+'"></div>');


                var air_mineral = sewa_lapangan - 150000;
                $('#input').append('<div class="mb-3 col-md-2"><label for="Air Mineral" class="form-label">Air Mineral</label><input type="number" name="air_mineral" class="form-control" id="air-mineral" value="'+15000+'"></div>');


                var konten_kreator = air_mineral - 50000;
                $('#input').append('<div class="mb-3 col-md-6"><label for="Konten Kreator" class="form-label">Konten Kreator</label><input type="number" name="konten_kreator" class="form-control" id="konten-kreator" value="'+50000+'"></div>');

                var kid_man = konten_kreator - 20000;
                $('#input').append('<div class="mb-3 col-md-6"><label for="Kid Man" class="form-label">Kid Man</label><input type="number" name="kid_man" class="form-control" id="kid_man" value="'+20000+'"></div>');

                $('#input').append('<h5>Laba : '+kid_man+'</h5>')
                
                $('#input').append('<button type="submit" class="btn btn-primary">Save</button>')

        }
            });
        });

    $(document).ready(function() {
        $('.data').DataTable();
    } );
</script>

@endsection