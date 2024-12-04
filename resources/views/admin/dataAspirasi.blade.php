@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css','resources/js/script.js'])

@section('title', "Data Aspirasi")
@section('content')
<div class="row">
  <h1 class="h1">Data Aspirasi</h1>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Artikel</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("aspirasi.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
              <div class="modal-body">
                <label for="nama_pengirim">Nama Pengirim</label><br>
                <input type="text" name="nama_pengirim" placeholder="Tuliskan nama pengirim" class="form-control"
                  required>
                <div class="invalid-feedback">
                    Input nama pengirim secara valid!
                </div>
                <div class="valid-feedback">
                    Input valid.
                </div>
                <br>

                <label for="judul_aspirasi">Judul Aspirasi</label><br>
                <input type="text" name="judul_aspirasi" placeholder="Tuliskan judul aspirasi" class="form-control"
                  required>
                <div class="invalid-feedback">
                    Input judul aspirasi secara valid!
                </div>
                <div class="valid-feedback">
                    Input valid.
                </div>
                <br>

                <label for="isi_aspirasi">Isi Aspirasi</label><br>
                <textarea name="isi_aspirasi" id="isi_aspirasi" class="form-control" required style="resize: none;" rows="10" cols="500" placeholder="Tuliskan isi aspirasi di sini."></textarea>
                <div class="invalid-feedback">
                    Input konten artikel secara valid!
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
        <div>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
              </span>
              <input type="text" id="searchInput" class="form-control" placeholder="Search in this Category..." onkeyup="searchTable()">
            </div>
        </div>
      </div>
    </div>
    <br>
    <!-- Table -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NO.</th>
            <th>NAMA PENGIRIM</th>
            <th>JUDUL ASPIRASI</th>
            <th>ISI ASPIRASI</th>
            <th>ACTION</th>
          </tr>
        </thead>

        <!-- Fill Table Body using Retrieved Data from Database-->
        <tbody id="TableBody">
          @foreach($dataAspirasi as $index => $aspirasi)
          <tr>
            <td>{{ $dataAspirasi->firstItem() + $index }}</td>
            <td>{{ $aspirasi->nama_pengirim }}</td>
            <td>{{ $aspirasi->judul_aspirasi }}</td>
            <td>{{ $aspirasi->isi_aspirasi }}</td>
            <td>
                <div>
                    <button type="button" class="btn" id="buttonred" data-bs-toggle="modal" data-bs-target="#deleteModal{{  $aspirasi->id_aspirasi}}">
                        Delete
                    </button>
                </div>
            </td>
          </tr>

        <!-- Modal delete artikel -->
            <div class="modal fade" id="deleteModal{{ $aspirasi->id_aspirasi}}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $aspirasi->id_aspirasi}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $aspirasi->id_aspirasi}}">Hapus Data Aspirasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data aspirasi ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.aspirasi.destroy', $aspirasi->id_aspirasi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="buttonredreverse">Hapus</button>
                            </form>
                        </div>
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
      @if ($dataAspirasi->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataAspirasi->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataAspirasi->lastPage(); $i++)
        <li  class="page-item {{ ($dataAspirasi->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataAspirasi->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataAspirasi->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataAspirasi->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
