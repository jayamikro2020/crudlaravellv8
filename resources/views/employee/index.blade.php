<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Data Pegawai</title>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ '/' }}">JayaMikro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ '/' }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ '/employee' }}">Employee</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex">
         
              <form action="/employee" method="GET">
                <input type="search" name="search" class="form-control me-2" placeholder="Cari Nama Pegawai" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>

              </form>
          
            
          </form>
        </div>
      </div>
    </nav>

    </div>
 
    <div class="container">
<h1>Data Pegawai <a href="/employee/create" class="btn btn-success mb-3" >Tambah+</a>
<a href="/exportpdf" class="btn btn-info mb-3" >Export PDF</a>
<a href="/exportexcel" class="btn btn-success mb-3" >Export Excel</a>




</h1>
<form action="/importexcel" method="POST" enctype="multipart/form-data">
@csrf
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Import Data Excel
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="file" name="file" required>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

      <div class="row">
        {{-- @if($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
           {{ $message }}
          </div>
        @endif --}}
        <table class="table">
              <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">No Telpon</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Aksi</th>
                 </tr>
              </thead>
              <tbody>
              @foreach($data as $index => $row )
                  <tr>
                    <th scope="row">{{ $index + $data -> firstItem() }}</th>
                    <td>{{ $row -> nama }}</td>
                    <td>
                      <img src="{{  asset('foto/'.$row -> foto) }}" alt="" width="40px">
                    </td>
                    <td>{{ $row -> jeniskelamin }}</td>
                    <td>0{{ $row -> notelpon }}</td>
                    <td>{{ $row -> created_at -> format('D M Y') }}</td>
                    <td>
                      <a href="/employee/edit/{{ $row -> id }}" type="button" class="btn btn-primary">Edit</a>
                      <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row -> id }}" data-nama="{{ $row -> nama }}">Delete</a>
                    </td>
                  </tr>

              @endforeach
              </tbody>
              </table>
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
           
             <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
             
             <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

              <script>
                $('.delete').click(function(){
                  var id = $(this).attr('data-id');
                  var nama = $(this).attr('data-nama');
                swal({
                title: "Yakin?",
                text: "Kamu akan menghapus data pegawai dengan nama: "+nama+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  window.location = "/employee/delete/"+id+""
                  swal("Data berhasil di hapus!", {
                    icon: "success",
                  });
                } else {
                  swal("Data tidak jadi dihapus!");
                }
              });
                });
             
              </script>


<script>
@if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
@endif
</script>
      </div>
     

      {{ $data->links() }}
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS --> --}}
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>

</html>