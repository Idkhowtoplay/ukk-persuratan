@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
    <table id="azuka" class="table striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    </table>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" id="tambah" data-target="#exampleModal">
    Tambah Data
  </button>
</div>

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
                <label for="exampleFormControlInput1" class="form-label">Nama Pekerjaan</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Pekerjaan">
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
        $('#azuka').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('reki') }}",
                type: 'GET'
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'Aksi', name: 'Aksi', orderable: false, searchable: false,
                render: function(data, type, row, meta) {
                        return '<button class="edit btn btn-primary" data-id="' + row.id + '"><i class="bi bi-pen-fill"></i></button>' +
                               ' <button class="hapus btn btn-danger" data-id="' + row.id + '"><i class="bi bi-trash3-fill"></i></button>';
                }            
                }
                                
            ]
        });
    });
</script>
<script>
    $('#tambah').on('click', function() {
        $('#nama').val('');
        $('#simpan').off('click').on('click', function() {
            agatha();
        });
    });
    
</script>
<script>
 function agatha() {
    var formData = new FormData();
    formData.append('nama', $('#nama').val());
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
        url : "{{ route('pekerjaan.store') }}",
        type : "POST",
        data : formData,
        contentType: false,
        processData: false,
        success : function(res) {
            console.log(res);
            alert(res.text)
            $('#tutup').click()
            $('#azuka').DataTable().ajax.reload();
            $('#nama').val('');
        },
        error : function(xhr) {
            console.error(xhr);
            alert(xhr.responseJSON ? xhr.responseJSON.text : 'ada yang salah' )
        }
    });
};
</script>
<script>
    $('#azuka').on('click', '.hapus', function() {
      var id = $(this).data('id');
      if(confirm("Apakah Anda yakin ingin menghapus data ini?")) {
          $.ajax({
              url: '/pekerjaan/delete/' + id,
              type: 'DELETE',
              data: {
                  "_token": "{{ csrf_token() }}"
              },
              success: function(res) {
                  alert(res.text);
                  $('#azuka').DataTable().ajax.reload();
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
    $('#azuka').on('click', '.edit', function() {
      var id = $(this).data('id');
      $.ajax({
          url: '/pekerjaan/edit/' + id,
          type: 'GET',
          success: function(res) {
              $('#nama').val(res.nama);
             
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
    formData.append('nama', $('#nama').val());
    formData.append('_token', "{{ csrf_token() }}");
      $.ajax({
          url: '/pekerjaan/update/' + id,
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(res) {
              alert(res.text);
              $('#exampleModal').modal('hide');
              $('#azuka').DataTable().ajax.reload();
          },
          error: function(xhr) {
              console.error(xhr);
              alert('Terjadi kesalahan');
          }
      });
  }
  
  </script>
@endpush