@extends('admin.layouts.appAdmin')
@vite(['public/css/style.css','public/js/script.js'])

@section('title', "Data Divisi")
@section('content')
<div class="row">
  <h1 class="h1">Data Divisi</h1>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Divisi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("admin.datadivisi.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
              <div class="modal-body">
                <label for="namaDivisi">Nama Divisi</label><br>
                <input type="text" name="namaDivisi" placeholder="Tuliskan nama divisi" class="form-control"
                  required>
                <div class="invalid-feedback">
                    Input nama divisi secara valid!
                </div>
                <div class="valid-feedback">
                    Input valid.
                </div>
                <br>
                
                <label for="id_kabinet">Asal Kabinet</label><br>
                <select name="id_kabinet" class="form-select" required>
                    <option value="" disabled selected>Pilih Kabinet</option>
                    @foreach ($dataKabinet as $kabinet)
                    <option value="{{ $kabinet->id_kabinet }}">{{ $kabinet->nama_kabinet }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Input kabinet secara valid!
                </div>
                <div class="valid-feedback">
                    Input valid.
                </div>
                <br>
                
                <label for="deskripsiDivisi">Deskripsi Divisi</label><br>
                <textarea name="deskripsiDivisi" id="deskripsiDivisi" class="form-control" required style="resize: none;" rows="4" cols="50" placeholder="Tuliskan deskripsi divisi di sini."></textarea>
                <div class="invalid-feedback">
                    Input deskripsi divisi secara valid!
                </div>
                <div class="valid-feedback">
                    Input valid.
                </div>
                <br>

                <label for="tugasDanTanggungJawab">Tugas dan Tanggung Jawab Divisi</label><br>
                <textarea name="tugasDanTanggungJawab" id="tugasDanTanggungJawab" class="form-control" required style="resize: none;" rows="4" cols="50" placeholder="Tuliskan tugas dan tanggung jawab divisi di sini."></textarea>
                <div class="invalid-feedback">
                    Input nama tugas dan tanggung jawab secara valid!
                </div>
                <div class="valid-feedback">
                    Input valid.
                </div>
                <br>
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
    <!-- dataKabinet Table -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NO.</th>
            <th>NAMA DIVISI</th>
            <th>ASAL KABINET</th>
            <th>DESKRIPSI DIVISI</th>
            <th>TUGAS & TANGGUNG JAWAB DIVISI</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody id="TableBody">
          @foreach($dataDivisi as $index => $divisi)
          <tr>
            <td>{{ $dataDivisi->firstItem() + $index }}</td>
            <td>{{ $divisi->nama_divisi }}</td>
            <td>{{ $kabinet->nama_kabinet }}</td>
            <td>{{ $divisi->deskripsi_divisi }}</td>
            <td>{{ $divisi->tugas_dan_tanggung_jawab }}</td>
            <td>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
              <!-- Edit Button -->
              <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                data-bs-target="#editModal{{ $divisi->id_divisi}}">
                Edit
              </button>
              <button type="button" class="btn" id="buttonred" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $divisi->id_divisi}}">
                Delete
              </button>
              </div>
            </td>
          </tr>

        <!-- Modal delete mahasiswa -->
            <div class="modal fade" id="deleteModal{{ $divisi->id_divisi }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $divisi->id_divisi }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $divisi->id_divisi }}">Hapus Data Divsi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data kabinet ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.datadivisi.destroy', $divisi->id_divisi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="buttonredreverse">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $divisi->id_divisi }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.datadivisi.update', $divisi->id_divisi) }}" id="editForm" enctype="multipart/form-data" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Divisi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="namaDivisi" class="form-label">Nama Divisi</label>
                                    <input type="text" class="form-control" name="namaDivisi" value="{{ $divisi->nama_divisi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="id_kabinet">Asal Kabinet</label><br>
                                    <select name="id_kabinet" class="form-select" required>
                                        <!-- Option pertama adalah dosen yang sudah dipilih -->
                                        <option value="{{ $divisi->id_kabinet }}" selected>{{ $divisi->kabinet->nama_kabinet }}</option>
                                        
                                        <!-- Iterasi untuk menampilkan dosen lain selain dosen yang sudah dipilih -->
                                        @foreach ($dataKabinet as $kabinet)
                                            @if ($kabinet->id_kabinet != $divisi->id_kabinet)
                                            <option value="{{ $kabinet->id_kabinet }}">{{ $kabinet->nama_kabinet }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsiDivisi">Deskripsi Divisi</label><br>
                                    <textarea id="deskripsiDivisi" name="deskripsiDivisi" class="form-control" value="{{ $divisi->deskripsi_divisi }}" style="resize: none;" rows="4" cols="50">{{ $divisi->deskripsi_divisi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tugasDanTanggungJawab">Tugas dan Tanggung Jawab Divisi</label><br>
                                    <textarea id="tugasDanTanggungJawab" name="tugasDanTanggungJawab" class="form-control" value="{{ $divisi->tugas_dan_tanggung_jawab }}" style="resize: none;" rows="4" cols="50">{{ $divisi->tugas_dan_tanggung_jawab }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn" id="button">Simpan Perubahan</button>
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
      @if ($dataDivisi->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataDivisi->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataDivisi->lastPage(); $i++)
        <li  class="page-item {{ ($dataDivisi->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataDivisi->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataDivisi->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataDivisi->nextPageUrl() }}" rel="next">Next &raquo;</a>
        </li>
      @else
        <li class="page-item disabled">
          <span class="page-link">Next &raquo;</span>
        </li>
      @endif
    </ul>
  </nav>
</div>
@endsection