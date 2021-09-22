@extends('layout.main')
@section('title','Tambah Pegawai')
@section('container')
    <h1 class="text-center mb-4">Edit Data Pegawai</h1>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
        <div class="card" >
          <div class="card-body">
            <form action="/employee/update/{{ $data -> id }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" value=" {{ $data -> nama }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                      <option selected value="{{ $data -> jeniskelamin }}">{{ $data -> jeniskelamin }}</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="notelpon" class="form-label">No Telpon</label>
                    <input type="number" value="0{{ $data -> notelpon }}" name="notelpon" class="form-control" id="notelpon" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>


            
          </div>
          





       
      </div>
     
    </div>
@endsection