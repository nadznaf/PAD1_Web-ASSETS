@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css','resources/js/script.js'])

@section('title', "Data Dokumentasi Proker")
@section('content')
<div class="row">
  <h1 class="h1">Data Dokumentasi Program Kerja</h1>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Dokumentasi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("admin.datadokumentasi.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
              <div class="modal-body">

                <div class="mb-3">
                    <!-- Fill dropdown button content using all data retrieved from mahasiswa's table -->
                    <label for="id_proker">Program Kerja</label><br>
                    <select name="id_proker" class="form-select" required>
                        <option value="" disabled selected>Pilih Program Kerja</option>
                        @foreach ($dataProker as $proker)
                        <option value="{{ $proker->id_proker }}">{{ $proker->judul_proker }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Pilih data proker secara valid!
                    </div>
                    <div class="valid-feedback">
                        Pilih valid.
                    </div>
                </div>

                <div class="mb-3">
                    <label>Foto Dokumentasi</label><br>
                    <div class="d-flex flex-column align-items-center">
                      <!-- Preview image will appear here -->
                        <div id="image-preview" class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                            onclick="document.getElementById('uploadInput').click();">
                            <p class="text-gray-500">No image selected</p>
                        </div>
                        <input type="file" name="dokumentasiFoto" id="uploadInput" accept="image/*" class="form-control" style="display: none;">
                        <button type="button" class="btn btn-danger mt-2" id="clear-button" style="display: none;">
                            Clear Image
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="hariDokumentasi">Keterangan Hari Dokumentasi</label><br>
                    <input type="number" name="hariDokumentasi" placeholder="Tuliskan Informasi Hari Keberapa pada Program Kerja" class="form-control"
                    required>
                    <div class="invalid-feedback">
                        Input tugas staff secara valid!
                    </div>
                    <div class="valid-feedback">
                        Input valid.
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
            <th>PROGRAM KERJA</th>
            <th>FOTO DOKUMENTASI</th>
            <th>KETERANGAN HARI PROGRAM KERJA</th>
            <th>ACTION</th>
          </tr>
        </thead>

        <!-- Fill Table Body using Retrieved Data from Database-->
        <tbody id="TableBody">
          @foreach($dataDokumentasi as $index => $dokumentasi)
          <tr>
            <td>{{ $dataDokumentasi->firstItem() + $index }}</td>
            <td>{{ $dokumentasi->proker->judul_proker }}</td>
            <td class="text-center">
              <img src="{{ asset('storage/datadokumentasi/' . $dokumentasi->isi_dokumentasi) }}" class="rounded w-24 h-24 object-cover">
            </td>
            <td>{{ $dokumentasi->keterangan_hari}}</td>
            <td>
                <div class="d-grid gap-2 2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <!-- Edit Button -->
                    <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $dokumentasi->id_dokumentasi}}">
                        Edit
                    </button>
                    <button type="button" class="btn" id="buttonred" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $dokumentasi->id_dokumentasi}}">
                        Delete
                    </button>
                </div>
            </td>
          </tr>

        <!-- Modal delete -->
            <div class="modal fade" id="deleteModal{{ $dokumentasi->id_dokumentasi }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $dokumentasi->id_dokumentasi }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $dokumentasi->id_dokumentasi }}">Hapus Data Dokumentasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data dokumentasi ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.datadokumentasi.destroy', $dokumentasi->id_dokumentasi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="buttonredreverse">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Edit Modal -->
          <div class="modal fade" id="editModal{{ $dokumentasi->id_dokumentasi }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <form action="{{ route('admin.datadokumentasi.update', $dokumentasi->id_dokumentasi) }}" id="editForm" enctype="multipart/form-data" method="POST" class="needs-validation">
                          @csrf
                          @method('PUT')
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel">Edit Data Dokumentasi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="mb-3">
                                  <!-- Dropdown for Proker -->
                                  <label for="id_proker">Program Kerja</label><br>
                                  <select name="id_proker" class="form-select" required>
                                      <!-- Option pertama adalah proker yang sudah dipilih -->
                                      <option value="{{ $dokumentasi->proker->id_proker }}" selected>{{ $dokumentasi->proker->judul_proker }}</option>
                                      <!-- Iterasi untuk menampilkan proker lain selain proker yang sudah dipilih -->
                                      @foreach ($dataProker as $prokerOption)
                                          @if ($prokerOption->id_proker !== $dokumentasi->proker->id_proker)
                                              <option value="{{ $prokerOption->id_proker }}">{{ $prokerOption->judul_proker }}</option>
                                          @endif
                                      @endforeach
                                  </select>
                              </div>

                              <div class="mb-3">
                                  <!-- Image Upload Section -->
                                  <label>Foto Dokumentasi</label><br>
                                  <div class="d-flex flex-column align-items-center">
                                      <div id="image-preview-edit-{{ $dataDokumentasi->firstItem() + $index }}" class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                          style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                          onclick="document.getElementById('editInput-{{ $dataDokumentasi->firstItem() + $index }}').click();">
                                          <img src="{{ asset('storage/datadokumentasi/' . $dokumentasi->isi_dokumentasi) }}" class="rounded" style="object-fit: cover; max-width: 100%; max-height: 100%;">
                                      </div>
                                      <input type="file" name="dokumentasiFoto" id="editInput-{{ $dataDokumentasi->firstItem() + $index }}" accept="image/*" class="form-control" style="display: none;">
                                      <button type="button" class="btn btn-danger mt-2" id="clear-button-edit-{{ $dataDokumentasi->firstItem() + $index }}">Clear Image</button>
                                  </div>
                              </div>
                            <div class="mb-3">
                              <label for="tugasStaff">Keterangan Hari Proker</label><br>
                              <input type="number" name="hariDokumentasi" value="{{$dokumentasi->keterangan_hari}}" class="form-control">
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
      @if ($dataDokumentasi->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataDokumentasi->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataDokumentasi->lastPage(); $i++)
        <li  class="page-item {{ ($dataDokumentasi->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataDokumentasi->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataDokumentasi->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataDokumentasi->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
    //JS function for image preview in Input Modal
    document.getElementById('uploadInput').addEventListener('change', function(event) {
      const imagePreview = document.getElementById('image-preview');
      const clearButton = document.getElementById('clear-button');

      if (event.target.files.length > 0) {
          const file = event.target.files[0];
          const reader = new FileReader();

          reader.onload = function(e) {
              imagePreview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded-lg" alt="Image preview" style="max-width: 100%; max-height: 100%;">`;
              clearButton.style.display = 'block';
          };

          reader.readAsDataURL(file);
      }
  });


function getElementsByIdPrefix(prefix) {
  return document.querySelectorAll(`[id^="${prefix}"]`);
}
// JS function for image preview in Edit Modal
document.querySelectorAll('[id^="editInput-"]').forEach((input, index) => {
  input.addEventListener('change', function(event) {
    const imagePreviewEdit = document.getElementById(`image-preview-edit-${index + 1}`);
    const clearButtonEdit = document.getElementById(`clear-button-edit-${index + 1}`);

    if (event.target.files.length > 0) {
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function(e) {
        imagePreviewEdit.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded-lg" alt="Image preview" style="max-width: 100%; max-height: 100%;">`;
        clearButtonEdit.style.display = 'block';
      };

      reader.readAsDataURL(file);
    }
  });

  document.getElementById(`clear-button-edit-${index + 1}`).addEventListener('click', function() {
    const imagePreviewEdit = document.getElementById(`image-preview-edit-${index + 1}`);
    input.value = '';
    this.style.display = 'none';
    imagePreviewEdit.innerHTML = `<p class="text-gray-500">No image selected</p>`;
  });
});
</script>
@endsection
