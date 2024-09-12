@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')
<h2>Daftar User</h2>
<div class="container">
    <table id="tes" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" id="tambah" data-target="#exampleModal">
    Tambah Data
  </button>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @csrf
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Ngawur">
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Masukkan Email Ngawur">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Profile</label>
                <input type="file" class="form-control" id="profile" name="profile">
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" id="tutup" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="simpan" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('page_scripts')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
    $('#tes').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('nigai') }}",
            type: 'GET'
        },
        columns: [
            { data: 'id', name: 'id' },
            { 
                data: 'profile', 
                name: 'profile', 
                render: function(data, type, full, meta) {
                    // Set default path ke 'storage/profiles/' jika tidak ada direktori dalam data
                    let imagePath = data.includes('profiles/') ? `storage/${data}` : `storage/profiles/${data}`;
                    // Gunakan langsung path di dalam tag img tanpa menggunakan Blade
                    return `<img src="/${imagePath}" alt="Profile Image" width="50">`;
                },
                orderable: false, 
                searchable: false
            },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            
            { 
                data: 'Aksi', 
                name: 'Aksi',
                orderable: false, 
                searchable: false
            }
        ]
    });
});

</script>
<script>
    $('#tambah').on('click', function() {
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#profile').val('');
    
    // Remove any attached event handlers to avoid multiple bindings
    $('#simpan').off('click').on('click', function() {
        lah();
        
    });
});
</script>

<script>
   function lah() {
    var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('email', $('#email').val());
    formData.append('password', $('#password').val());
    formData.append('profile', $('#profile')[0].files[0]);
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
        url: "{{ route('user.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            console.log(res);
            alert(res.text);
            $('#tutup').click();
            $('#tes').DataTable().ajax.reload();
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
            $('#profile').val('');
        },
        error: function(xhr) {
            console.error(xhr);
            alert(xhr.responseJSON ? xhr.responseJSON.text : 'Something went wrong');
        }
    });
};

</script>
<script>
  $('#tes').on('click', '.hapus', function() {
    var id = $(this).data('id');
    if(confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        $.ajax({
            url: '/user/delete/' + id,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(res) {
                alert(res.text);
                $('#tes').DataTable().ajax.reload();
            },
            error: function(xhr) {
                console.error(xhr);
                alert('Terjadi kesalahan');
            }
        });
    }
});

</script>
<script>
  $('#tes').on('click', '.edit', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '/user/edit/' + id,
        type: 'GET',
        success: function(res) {
            $('#name').val(res.name);
            $('#email').val(res.email);
            $('#password').val(''); // Biarkan kosong jika tidak ingin mengubah password
            $('#exampleModal').modal('show');
            $('#simpan').off('click').on('click', function() {
                updateData(id);
            });
        },
        error: function(xhr) {
            console.error(xhr);
            alert('Terjadi kesalahan');
        }
    });
});

function updateData(id) {
    var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('email', $('#email').val());
    formData.append('password', $('#password').val());
    if ($('#profile')[0].files[0]) { // Check if a new file is selected
        formData.append('profile', $('#profile')[0].files[0]);
    }
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
        url: '/user/update/' + id,
        type: 'POST', // Laravel generally handles updates with POST, unless you set it explicitly with PUT or PATCH
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            alert(res.text);
            $('#exampleModal').modal('hide');
            $('#tes').DataTable().ajax.reload();
        },
        error: function(xhr) {
            console.error(xhr);
            alert('Terjadi kesalahan');
        }
    });
}
</script>

@endpush
