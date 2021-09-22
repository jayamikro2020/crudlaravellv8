@extends('layout.main')
@section('title','Tambah Pegawai')
@section('container')
    <h1 class="text-center mb-4">Tambah Data Pegawai</h1>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
        <div class="card" >
          <div class="card-body">
            <form action="/employee" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="notelpon" class="form-label">No Telpon</label>
                    <input type="number" name="notelpon" class="form-control" id="notelpon" >
                </div>
                
                <div class="mb-3">
                    <label for="foto" class="form-label">Masukkan Foto</label>
                    <input type="file" name="foto" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>


            
          </div>
          





       
      </div>
     
    </div>
@endsection