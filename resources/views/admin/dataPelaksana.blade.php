@extends('admin.layouts.appAdmin')
@vite(['public/css/style.css','public/js/script.js'])

@section('title', "Data Pelaksana Proker")
@section('content')
<div class="row">
  <h1 class="h1">Data Pelaksana Proker</h1>
</div>
<div class="row">
  <div class="card mb-4">
    <div class="card-header" style="background-color:white !important">
      <!-- Insert Modal -->
      <div class="modal fade" id="insertData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pelaksana Proker</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("admin.datapelaksana.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
              <div class="modal-body">

                <div class="mb-3">
                    <!-- Fill dropdown button content using all data retrieved from mahasiswa's table -->
                    <label for="id_mahasiswa">Mahasiswa</label><br>
                    <select name="id_mahasiswa" class="form-select" required>
                        <option value="" disabled selected>Pilih Mahasiswa</option>
                        @foreach ($dataMahasiswa as $mahasiswa)
                        <option value="{{ $mahasiswa->id_mhs }}">{{ $mahasiswa->nama_mhs }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Input data mahasiswa secara valid!
                    </div>
                    <div class="valid-feedback">
                        Input valid.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="id_kabinet" class="form-label">Asal Kabinet</label>
                    <select name="id_kabinet" id="id_kabinet" class="form-select" required>
                        <option value="" disabled selected>Pilih Asal Kabinet</option>
                        @foreach($dataKabinet as $kabinet)
                            <option value="{{ $kabinet->id_kabinet }}">{{ $kabinet->nama_kabinet }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Input asal kabinet secara valid!
                    </div>
                </div>

                <div class="mb-3">
                    <label for="id_divisi" class="form-label">Asal Divisi</label>
                    <select name="id_divisi" id="id_divisi" class="form-select" required>
                        <option value="" disabled selected>Pilih Asal Divisi</option>
                    </select>
                    <div class="invalid-feedback">
                        Input asal divisi secara valid!
                    </div>
                </div>

                <div class="mb-3">
                    <label for="id_proker" class="form-label">Program Kerja</label>
                    <select name="id_proker" id="id_proker" class="form-select" required>
                        <option value="" disabled selected>Pilih Program Kerja</option>
                    </select>
                    <div class="invalid-feedback">
                        Input asal proker secara valid!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaJabatan" class="form-label">Jabatan Pelaksana</label>
                    <select name="namaJabatan" id="namaJabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                        <option value="Pelaksana">Pelaksana</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Sekretaris II">Sekretaris II</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Bendahara II">Bendahara II</option>
                        <option value="Acara">Acara</option>
                        <option value="Desain, Dekorasi, dan Dokumentasi (DDD)">Desain, Dekorasi, dan Dokumentasi (DDD)</option>
                        <option value="Hubungan Masyarakat (Humas)">Hubungan Masyarakat (Humas)</option>
                        <option value="Publikasi">Publikasi</option>
                        <option value="Sponsorship">Sponsorship</option>
                        <option value="Keamanan">Keamanan</option>
                        <option value="Logistik Perlengkapan Konsumsi (LoPerKo)">Logistik Perlengkapan Konsumsi (LoPerKo)</option>
                        <option value="Kompetisi">Kompetisi</option>
                        <option value="Kesekretariatan">Kesekretariatan</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn" id="button">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
      <!-- Show Alert message when any error occur (especially when error storing data) -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li><strong>ERROR</strong></li>
                        <li>{{ $error }}</li>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endforeach
                </ul>
            </div>
          @endif
        <!-- Search Data in Table -->
        <div class="col-md-10">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
              </span>
              <input type="text" id="searchInput" class="form-control" placeholder="Search in this Category..." onkeyup="searchTable()">
            </div>
        </div>
        <div class="col-md-2">
          <!-- Button trigger modal -->
          <button type="button" id="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#insertData">
            Tambah Data
          </button>
        </div>
      </div>
    </div>
    <br>
    <!-- dataStaff Table -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NO.</th>
            <th>NAMA PELAKSANA</th>
            <th>PROGRAM KERJA</th>
            <th>JABATAN PELAKSANA</th>
            <th>ACTION</th>
          </tr>
        </thead>
        
        <!-- Fill Table Body using Retrieved Data from Database-->
        <tbody id="TableBody">
          @foreach($dataPelaksana as $index => $pelaksana)
          <tr>
            <td>{{ $dataPelaksana->firstItem() + $index }}</td>
            <td>{{ $pelaksana->mahasiswa->nama_mhs}}</td>
            <td>{{ $pelaksana->proker->judul_proker }}</td>
            <td>{{ $pelaksana->jabatan_pelaksana}}</td>
            <td>
                <div class="d-grid gap-2 2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <!-- Edit Button -->
                    <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $pelaksana->id_pelaksana}}">
                        Edit
                    </button>
                    <button type="button" class="btn" id="buttonred" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pelaksana->id_pelaksana}}">
                        Delete
                    </button>
                </div>
            </td>
          </tr>

        <!-- Modal delete -->
            <div class="modal fade" id="deleteModal{{  $pelaksana->id_pelaksana }}" tabindex="-1" aria-labelledby="deleteModalLabel{{  $pelaksana->id_pelaksana }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{  $pelaksana->id_pelaksana }}">Hapus Data Pelaksana Proker</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data Pelaksana Proker ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.datapelaksana.destroy',  $pelaksana->id_pelaksana) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="buttonredreverse">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Edit Modal -->
          <div class="modal fade" id="editModal{{  $pelaksana->id_pelaksana}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <form action="{{ route('admin.datapelaksana.update',  $pelaksana->id_pelaksana) }}" id="editForm" enctype="multipart/form-data" method="POST" class="needs-validation">
                          @csrf
                          @method('PUT')
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel">Edit Pelaksana Proker</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="mb-3">
                                  <!-- Dropdown for Mahasiswa -->
                                  <label for="id_mahasiswa">Mahasiswa</label><br>
                                  <select name="id_mahasiswa" class="form-select" required>
                                      <!-- Option pertama adalah mahasiswa yang sudah dipilih -->
                                      <option value="{{ $pelaksana->mahasiswa->id_mhs }}" selected>{{ $pelaksana->mahasiswa->nama_mhs }}</option>
                                      <!-- Iterasi untuk menampilkan mahasiswa lain selain mahasiswa yang sudah dipilih -->
                                      @foreach ($dataMahasiswa as $mahasiswaOption)
                                          @if ($mahasiswaOption->id_mhs != $pelaksana->mahasiswa->id_mhs)
                                              <option value="{{ $mahasiswaOption->id_mhs }}">{{ $mahasiswaOption->nama_mhs }}</option>
                                          @endif
                                      @endforeach
                                  </select>
                              </div>
                              <div class="mb-3">
                                  <!-- Dropdown for Kabinet -->
                                  <label for="id_kabinet">Asal Kabinet</label><br>
                                  <p>Asal kabinet pada data saat ini: <strong>{{ $pelaksana->proker->divisi->kabinet->nama_kabinet }}</strong></p>
                                  <select name="id_kabinet" id="id_kabinet_edit-{{ $dataPelaksana->firstItem() + $index }}" class="form-select" required>
                                      <option value="" disabled selected>Pilih Asal Kabinet</option>
                                      @foreach($dataKabinet as $kabinet)
                                        <option value="{{ $kabinet->id_kabinet }}">{{ $kabinet->nama_kabinet }}</option>                                      
                                      @endforeach
                                  </select>
                                  <div class="invalid-feedback">
                                      Input data mahasiswa secara valid!
                                  </div>
                                  <div class="valid-feedback">
                                      Input valid.
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <!-- Dropdown for Divisi -->
                                  <label for="id_divisi" class="form-label">Asal Divisi</label>
                                  <p>Asal divisi pada data saat ini: <strong>{{ $pelaksana->proker->divisi->nama_divisi }}</strong></p>
                                  <select name="id_divisi" required id="id_divisi_edit-{{ $dataPelaksana->firstItem() + $index }}" class="form-select" required>
                                      <option value="" disabled selected>Pilih Asal Divisi</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Input asal divisi secara valid!
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <!-- Dropdown for Proker -->
                                  <label for="id_proker" class="form-label">Program Kerja</label>
                                  <p>Program Kerja pada data saat ini: <strong>{{ $pelaksana->proker->judul_proker }}</strong></p>
                                  <select name="id_proker" required id="id_proker_edit-{{ $dataPelaksana->firstItem() + $index }}" class="form-select" required>
                                      <option value="" disabled selected>Pilih Asal Divisi</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Input asal divisi secara valid!
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <label for="namaJabatan" class="form-label">Jabatan Pelaksana</label>
                                  <select name="namaJabatan" id="namaJabatan" class="form-select" required>
                                        <option value="{{$pelaksana->jabatan_pelaksana}}"disabled selected>Jabatan saat ini: {{$pelaksana->jabatan_pelaksana}}</option>
                                        <option value="" disabled selected>Pilih Jabatan</option>
                                        <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                                        <option value="Pelaksana">Pelaksana</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Sekretaris II">Sekretaris II</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="Bendahara II">Bendahara II</option>
                                        <option value="Acara">Acara</option>
                                        <option value="Desain, Dekorasi, dan Dokumentasi (DDD)">Desain, Dekorasi, dan Dokumentasi (DDD)</option>
                                        <option value="Hubungan Masyarakat (Humas)">Hubungan Masyarakat (Humas)</option>
                                        <option value="Publikasi">Publikasi</option>
                                        <option value="Sponsorship">Sponsorship</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Logistik Perlengkapan Konsumsi (LoPerKo)">Logistik Perlengkapan Konsumsi (LoPerKo)</option>
                                        <option value="Kompetisi">Kompetisi</option>
                                        <option value="Kesekretariatan">Kesekretariatan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid option.
                                    </div>
                                </div>
                            </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary" id="button">Simpan Perubahan</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>


          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Pagination links with explicit buttons -->
<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      {{-- Previous Page Link --}}
      @if ($dataPelaksana->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataPelaksana->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataPelaksana->lastPage(); $i++)
        <li  class="page-item {{ ($dataPelaksana->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataPelaksana->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataPelaksana->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataPelaksana->nextPageUrl() }}" rel="next">Next &raquo;</a>
        </li>
      @else
        <li class="page-item disabled">
          <span class="page-link">Next &raquo;</span>
        </li>
      @endif
    </ul>
  </nav>
</div>
<script>
    // JS script for dependent dropdown list Divisi
    document.addEventListener('DOMContentLoaded', function() {
        // Dependent dropdown handling
        $('#id_kabinet').change(function() {
            const id_kabinet = $(this).val();
            const divisiSelect = $('#id_divisi');
            
            if (id_kabinet) {
                $.ajax({
                    url: '{{ route("admin.get.divisi") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_kabinet: id_kabinet
                    },
                    success: function(data) {
                        let options = '<option value="" disabled selected>Pilih Asal Divisi ...</option>';
                        
                        data.forEach(function(divisi) {
                            options += `<option value="${divisi.id_divisi}">${divisi.nama_divisi}</option>`;
                        });
                        
                        divisiSelect.html(options);
                    }
                });
            } else {
                divisiSelect.html('<option value="" disabled selected>Pilih Asal Kabinet Terlebih Dahulu</option>');
            }
        });
        // Form validation
        const forms = document.querySelectorAll('.needs-validation');
        
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    });


    function getElementsByIdPrefix(prefix) {
    return document.querySelectorAll(`[id^="${prefix}"]`);
}
    // JS script for dependent dropdown list Proker
    document.addEventListener('DOMContentLoaded', function() {
        // Dependent dropdown handling
        $('#id_divisi').change(function() {
            const id_divisi = $(this).val();
            const prokerSelect = $('#id_proker');
            
            if (id_divisi) {
                $.ajax({
                    url: '{{ route("admin.get.proker") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_divisi: id_divisi
                    },
                    success: function(data) {
                        let options = '<option value="" disabled selected>Pilih Program Kerja ...</option>';
                        
                        data.forEach(function(proker) {
                            options += `<option value="${proker.id_proker}">${proker.judul_proker}</option>`;
                        });
                        
                        prokerSelect.html(options);
                    }
                });
            } else {
                prokerSelect.html('<option value="" disabled selected>Pilih Asal Divisi Terlebih Dahulu</option>');
            }
        });
        // Form validation
        const forms = document.querySelectorAll('.needs-validation');
        
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    });
        function getElementsByIdPrefix(prefix) {
        return document.querySelectorAll(`[id^="${prefix}"]`);
    }

    // JS script for dependent dropdown list Divisi bagian edit
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[id^="id_divisi_edit-"]').forEach((input, index) => {
            // JS script for dependent dropdown list bagian edit
            $(`#id_kabinet_edit-${index + 1}`).change(function() {
                const id_kabinet = $(this).val();
                const divisiSelect = $(`#id_divisi_edit-${index + 1}`);
                
                if (id_kabinet) {
                    $.ajax({
                        url: '{{ route("admin.get.divisi") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_kabinet: id_kabinet
                        },
                        success: function(data) {
                            let options = '<option value="" disabled selected>Pilih Asal Divisi</option>';
                            
                            data.forEach(function(divisi) {
                                options += `<option value="${divisi.id_divisi}">${divisi.nama_divisi}</option>`;
                            });
                            
                            divisiSelect.html(options);
                        }
                    });
                } else {
                    divisiSelect.html('<option value="" disabled selected>Pilih Asal Kabinet Terlebih Dahulu</option>');
                }
            });
        });
    });

    // JS script for dependent dropdown list Proker bagian edit
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[id^="id_proker_edit-"]').forEach((input, index) => {
            // JS script for dependent dropdown list bagian edit
            $(`#id_divisi_edit-${index + 1}`).change(function() {
                const id_divisi = $(this).val();
                const prokerSelect = $(`#id_proker_edit-${index + 1}`);
                
                if (id_divisi) {
                    $.ajax({
                        url: '{{ route("admin.get.proker") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_divisi: id_divisi
                        },
                        success: function(data) {
                            let options = '<option value="" disabled selected>Pilih Program Kerja</option>';
                            
                            data.forEach(function(proker) {
                                options += `<option value="${proker.id_proker}">${proker.judul_proker}</option>`;
                            });
                            
                            prokerSelect.html(options);
                        }
                    });
                } else {
                    prokerSelect.html('<option value="" disabled selected>Pilih Asal Divisi Terlebih Dahulu</option>');
                }
            });
        });
    });
</script>
@endsection