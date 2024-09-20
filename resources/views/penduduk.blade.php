@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
    <table id="azusa" class="table striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>No.KK</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
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
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Ngawur">
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" aria-label="Default select example">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="1">Laki Laki</option>
                    <option value="2">Perempuan</option>
                  </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK">
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NO KK</label>
                <input type="number" class="form-control" id="no_kk" placeholder="Masukkan NO KK">
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Agama</label>
                <select name="agama" id="agama" class="form-control">
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">RT</label>
                <input type="text" class="form-control" id="rt" placeholder="Masukkan rt">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">RW</label>
                <input type="text" class="form-control" id="rw" placeholder="Masukkan rw">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat Spesifik</label>
                <input type="text" class="form-control" id="alamat_spesifik" placeholder="Masukkan Alamat">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status Perkawinan</label>
                <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                    <option value="">-- Pilih Status Perkawinan --</option>
                    <option value="Belum kawin">Belum kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status_pendidikan">Status Pendidikan</label>
                <select name="status_pendidikan" id="status_pendidikan" class="form-control">
                    <option value="">-- Pilih Status Pendidikan --</option>
                    <option value="BelumSekolah">Tidak/Belum Sekolah</option>
                    <option value="TamatSD">Tamat SD/Sederajat</option>
                    <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                    <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Strata I">Strata I</option>
                    <option value="Strata II">Strata II</option>
                    <option value="Strata III">Strata III</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan_id">Pekerjaan</label>
                <select id="pekerjaan_id" name="pekerjaan_id" class="form-control" required>
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="tutup" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="simpan" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="readModal" tabindex="-1" aria-labelledby="readLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readLabel">Detail Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless border-right">
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td id="showNama"></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td id="showJenisKelamin"></td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>:</td>
                                        <td id="showNIK"></td>
                                    </tr>
                                    <tr>
                                        <th>No KK</th>
                                        <td>:</td>
                                        <td id="showNoKK"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>:</td>
                                        <td id="showTanggalLahir"></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>:</td>
                                        <td id="showTempatLahir"></td>
                                    </tr>
                                    <tr>
                                        <th>RT</th>
                                        <td>:</td>
                                        <td id="showRT"></td>
                                    </tr>
                                    <tr>
                                        <th>RW</th>
                                        <td>:</td>
                                        <td id="showRW"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Alamat Spesifik</th>
                                        <td>:</td>
                                        <td id="showAlamat"></td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td>:</td>
                                        <td id="showAgama"></td>
                                    </tr>
                                    <tr>
                                        <th>Status Perkawinan</th>
                                        <td>:</td>
                                        <td id="showStatusPerkawinan"></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pendidikan</th>
                                        <td>:</td>
                                        <td id="showStatusPendidikan"></td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td>:</td>
                                        <td id="showPekerjaan"></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
  

@endsection
@push('page_scripts')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
      $('#azusa').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
                url: "{{ route('rakka') }}",
                type: 'GET'
            },
          columns: [
              {data: 'id', name: 'id'},
              {data: 'nik', name: 'nik'},
              {data: 'nama', name: 'nama'},
              {data: 'no_kk', name: 'no_kk'},
              {data: 'jenis_kelamin', name: 'jenis_kelamin'},
              {data: 'Aksi', name: 'Aksi', orderable: false, searchable: false,
              render: function(data, type, row, meta) {
                      return '<button class="edit btn btn-primary" data-id="' + row.id + '"><i class="bi bi-pen-fill"></i></button>' +
                             ' <button class="show btn btn-info" data-id="' + row.id + '"><i class="bi bi-eye-fill"></i></button>'+
                             ' <button class="hapus btn btn-danger" data-id="' + row.id + '"><i class="bi bi-trash3-fill"></i></button>';
              }            
              }
                              
          ]
      });
  });


</script>
<script>
 $('#azusa').on('click', '.show', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '/penduduk/show/' + id,
        type: 'GET',
        success: function(res) {
            console.log(res); // Cek respons dari server
            if (res) {
                // Mengisi elemen-elemen dengan data dari respons
                $('#showNIK').text(res.nik);
                $('#showNama').text(res.nama);
                $('#showNoKK').text(res.no_kk);
                $('#showJenisKelamin').text(res.jenis_kelamin);
                $('#showTempatLahir').text(res.tempat_lahir);
                $('#showTanggalLahir').text(res.tanggal_lahir);
                $('#showAgama').text(res.agama);
                $('#showStatusPerkawinan').text(res.status_perkawinan);
                $('#showPekerjaan').text(res.pekerjaan_id); // Sesuaikan jika 'pekerjaan_id' adalah ID dan bukan nama pekerjaan
                $('#showRT').text(res.rt);
                $('#showRW').text(res.rw);
                $('#showAlamat').text(res.alamat_spesifik);
                $('#showStatusPendidikan').text(res.status_pendidikan);
                 // Tambahkan ini jika ada dalam data

                // Menampilkan modal
                $('#readModal').modal('show');
            } else {
                alert('Data tidak ditemukan');
            }
        },
        error: function(xhr) {
            console.error(xhr); // Log error jika terjadi
            alert('Terjadi kesalahan saat mengambil data');
        }
    });
});


</script>
<script>
    $('#tambah').on('click', function() {
        $('pekejaan_id').val('')
        $('#nama').val('');
        $('#nik').val('');
        $('#no_kk').val('');
        $('#jenis_kelamin').val('');
        $('#tempat_lahir').val('');
        $('#tanggal_lahir').val('');
        $('#agama').val('');
        $('#rt').val('');
        $('#rw').val('');
        $('#alamat_spesifik').val('');
        $('#status_perkawinan').val('');
        $('#status_pendidikan').val('');

        $('#simpan').off('click').on('click', function() {
            kyot();

    });

});
    
</script>

<script>
  function kyot() {
    var formData = new FormData();
    formData.append('pekerjaan_id', $('#pekerjaan_id').val());
    formData.append('nama', $('#nama').val());
    formData.append('jenis_kelamin', $('#jenis_kelamin').val());
    formData.append('nik', $('#nik').val());
    formData.append('no_kk', $('#no_kk').val());
    formData.append('tanggal_lahir', $('#tanggal_lahir').val());
    formData.append('tempat_lahir', $('#tempat_lahir').val());
    formData.append('agama', $('#agama').val());
    formData.append('rt', $('#rt').val());
    formData.append('rw', $('#rw').val());
    formData.append('alamat_spesifik', $('#alamat_spesifik').val());
    formData.append('status_perkawinan', $('#status_perkawinan').val());
    formData.append('status_pendidikan', $('#status_pendidikan').val());
    formData.append('_token', "{{ csrf_token() }}");
    $.ajax({
        url : "{{ route('penduduk.store') }}",
        type : "POST",
        data : formData,
        contentType : false,
        processData : false,
        success : function(res) {
            console.log(res);
            alert(res.text)
            $('#tutup').click()
            $('#azusa').DataTable().ajax.reload();
            $('pekerjaan_id').val('')
            $('#nama').val('');
            $('#nik').val('');
            $('#no_kk').val('');
            $('#jenis_kelamin').val('');
            $('#tempat_lahir').val('');
            $('#tanggal_lahir').val('');
            $('#agama').val('');
            $('#rt').val('');
            $('#rw').val('');
            $('#alamat_spesifik').val('');
            $('#status_perkawinan').val('');
            $('#status_pendidikan').val('');
        },
        error : function(xhr) {
            console.error(xhr);
            alert(xhr.responseJSON ? xhr.responseJSON.text : 'ada yang salah' )
        }
    });
};
</script>
<script>
  $('#azusa').on('click', '.hapus', function() {
    var id = $(this).data('id');
    if(confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        $.ajax({
            url: '/penduduk/delete/' + id,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(res) {
                alert(res.text);
                $('#azusa').DataTable().ajax.reload();
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
  $('#azusa').on('click', '.edit', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '/penduduk/edit/' + id,
        type: 'GET',
        success: function(res) {
          $('#pekerjaan_id').val(res.pekerjaan_id),
            $('#nama').val(res.nama);
            $('#jenis_kelamin').val(res.jenis_kelamin),
            $('#nik').val(res.nik),
            $('#no_kk').val(res.no_kk),
            $('#tanggal_lahir').val(res.tanggal_lahir),
            $('#tempat_lahir').val(res.tempat_lahir),
            $('#agama').val(res.agama),
            $('#rt').val(res.rt),
            $('#rw').val(res.rw),
            $('#alamat_spesifik').val(res.alamat_spesifik),
            $('#status_perkawinan').val(res.status_perkawinan),
            $('#status_pendidikan').val(res.status_pendidikan),
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
    formData.append('pekerjaan_id', $('#pekerjaan_id').val());
    formData.append('nama', $('#nama').val());
    formData.append('jenis_kelamin', $('#jenis_kelamin').val());
    formData.append('nik', $('#nik').val());
    formData.append('no_kk', $('#no_kk').val());
    formData.append('tanggal_lahir', $('#tanggal_lahir').val());
    formData.append('tempat_lahir', $('#tempat_lahir').val());
    formData.append('agama', $('#agama').val());
    formData.append('rt', $('#rt').val());
    formData.append('rw', $('#rw').val());
    formData.append('alamat_spesifik', $('#alamat_spesifik').val());
    formData.append('status_perkawinan', $('#status_perkawinan').val());
    formData.append('status_pendidikan', $('#status_pendidikan').val());
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
        url: '/penduduk/update/' + id,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            alert(res.text);
            $('#exampleModal').modal('hide');
            $('#azusa').DataTable().ajax.reload();
        },
        error: function(xhr) {
            console.error(xhr);
            alert('Terjadi kesalahan');
        }
    });
}
</script>


@endpush
