@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css','resources/js/script.js'])

@section('title', "Data Staff")
@section('content')
<div class="row">
  <h1 class="h1">Data Staff</h1>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Staff</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("admin.datastaff.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                    <label>Foto Pose Staff (Foto Non-Formal)</label><br>
                    <div class="d-flex flex-column align-items-center">
                      <!-- Preview image will appear here -->
                        <div id="image-preview" class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                            onclick="document.getElementById('uploadInput').click();">
                            <p class="text-gray-500">No image selected</p>
                        </div>
                        <input type="file" name="fotoPoseStaff" id="uploadInput" accept="image/*" class="form-control" style="display: none;">
                        <button type="button" class="btn btn-danger mt-2" id="clear-button" style="display: none;">
                            Clear Image
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="namaJabatan" class="form-label">Jabatan</label>
                    <select name="namaJabatan" id="namaJabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <optgroup label="Jabatan Pengurus Harian">
                            <option value="Ketua">Ketua</option>
                            <option value="Sekretaris Jenderal">Sekretaris Jenderal</option>
                            <option value="Sekretaris I">Sekretaris I</option>
                            <option value="Sekretaris II">Sekretaris II</option>
                            <option value="Bendahara I">Bendahara I</option>
                            <option value="Bendahara II">Bendahara II</option>
                        </optgroup>
                        <optgroup label="Jabatan Divisi">
                            <option value="Kepala Divisi">Kepala Divisi</option>
                            <option value="Wakil Kepala Divisi">Wakil Kepala Divisi</option>
                            <option value="Staff">Staff</option>
                        </optgroup>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tugasStaff">Tugas Staff</label><br>
                    <textarea name="tugasStaff" id="tugasStaff" class="form-control" required style="resize: none;" rows="4" cols="50" placeholder="Tuliskan tugas staff di sini."></textarea>
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
            <th>NAMA STAFF</th>
            <th>ASAL KABINET</th>
            <th>ASAL DIVISI</th>
            <th>FOTO POSE STAFF</th>
            <th>JABATAN</th>
            <th>TUGAS STAFF</th>
            <th>ACTION</th>
          </tr>
        </thead>

        <!-- Fill Table Body using Retrieved Data from Database-->
        <tbody id="TableBody">
          @foreach($dataStaff as $index => $staff)
          <tr>
            <td>{{ $dataStaff->firstItem() + $index }}</td>
            <td>{{ $staff->mahasiswa->nama_mhs}}</td>
            <td>{{ $staff->divisi->kabinet->nama_kabinet }}</td>
            <td>{{ $staff->divisi->nama_divisi }}</td>
            <td class="text-center">
              <img src="{{ asset('storage/datastaff/' . $staff->foto_pose_staff) }}" class="rounded w-24 h-24 object-cover">
            </td>
            <td>{{ $staff->nama_jabatan}}</td>
            <td>{{ $staff->tugas_staff }}</td>
            <td>
                <div class="d-grid gap-2 2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <!-- Edit Button -->
                    <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $staff->id_staff}}">
                        Edit
                    </button>
                    <button type="button" class="btn" id="buttonred" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $staff->id_staff}}">
                        Delete
                    </button>
                </div>
            </td>
          </tr>

        <!-- Modal delete -->
            <div class="modal fade" id="deleteModal{{ $staff->id_staff }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $staff->id_staff }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $staff->id_staff }}">Hapus Data Staff</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data staff ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.datastaff.destroy', $staff->id_staff) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="buttonredreverse">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Edit Modal -->
          <div class="modal fade" id="editModal{{ $staff->id_staff }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <form action="{{ route('admin.datastaff.update', $staff->id_staff) }}" id="editForm" enctype="multipart/form-data" method="POST" class="needs-validation">
                          @csrf
                          @method('PUT')
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel">Edit Staff</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="mb-3">
                                  <!-- Dropdown for Mahasiswa -->
                                  <label for="id_mahasiswa">Mahasiswa</label><br>
                                  <select name="id_mahasiswa" class="form-select" required>
                                      <!-- Option pertama adalah mahasiswa yang sudah dipilih -->
                                      <option value="{{ $staff->mahasiswa->id_mhs }}" selected>{{ $staff->mahasiswa->nama_mhs }}</option>
                                      <!-- Iterasi untuk menampilkan mahasiswa lain selain mahasiswa yang sudah dipilih -->
                                      @foreach ($dataMahasiswa as $mahasiswaOption)
                                          @if ($mahasiswaOption->id_mhs != $staff->mahasiswa->id_mhs)
                                              <option value="{{ $mahasiswaOption->id_mhs }}">{{ $mahasiswaOption->nama_mhs }}</option>
                                          @endif
                                      @endforeach
                                  </select>
                              </div>
                              <div class="mb-3">
                                  <!-- Dropdown for Kabinet -->
                                  <label for="id_kabinet">Asal Kabinet</label><br>
                                  <p>Asal kabinet pada data saat ini: <strong>{{ $staff->divisi->kabinet->nama_kabinet }}</strong></p>
                                  <select name="id_kabinet" id="id_kabinet_edit-{{ $dataStaff->firstItem() + $index }}" class="form-select" required>
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
                                  <p>Asal divisi pada data saat ini: <strong>{{ $staff->divisi->nama_divisi }}</strong></p>
                                  <select name="id_divisi" required id="id_divisi_edit-{{ $dataStaff->firstItem() + $index }}" class="form-select" required>
                                      <option value="" disabled selected>Pilih Asal Divisi</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      Input asal divisi secara valid!
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <!-- Image Upload Section -->
                                  <label>Foto Sampul Divisi</label><br>
                                  <div class="d-flex flex-column align-items-center">
                                      <div id="image-preview-edit-{{ $dataStaff->firstItem() + $index }}" class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                          style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                          onclick="document.getElementById('editInput-{{ $dataStaff->firstItem() + $index }}').click();">
                                          <img src="{{ asset('storage/datastaff/' . $staff->foto_pose_staff) }}" class="rounded" style="object-fit: cover; max-width: 100%; max-height: 100%;">
                                      </div>
                                      <input type="file" name="fotoSampulDivisi" id="editInput-{{ $dataStaff->firstItem() + $index }}" accept="image/*" class="form-control" style="display: none;">
                                      <button type="button" class="btn btn-danger mt-2" id="clear-button-edit-{{ $dataStaff->firstItem() + $index }}">Clear Image</button>
                                  </div>
                              </div>
                              <div class="mb-3">
                                <label for="namaJabatan" class="form-label">Jabatan</label>
                                <select name="namaJabatan" id="namaJabatan" class="form-select" required>
                                    <option value="{{$staff->nama_jabatan}}" selected>Jabatan saat ini: {{$staff->nama_jabatan}}</option>
                                    <optgroup label="Jabatan Pengurus Harian">
                                        <option value="Ketua">Ketua</option>
                                        <option value="Sekretaris Jenderal">Sekretaris Jenderal</option>
                                        <option value="Sekretaris I">Sekretaris I</option>
                                        <option value="Sekretaris II">Sekretaris II</option>
                                        <option value="Bendahara I">Bendahara I</option>
                                        <option value="Bendahara II">Bendahara II</option>
                                    </optgroup>
                                    <optgroup label="Jabatan Divisi">
                                        <option value="Kepala Divisi">Kepala Divisi</option>
                                        <option value="Wakil Kepala Divisi">Wakil Kepala Divisi</option>
                                        <option value="Staff">Staff</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                              <label for="tugasStaff">Tugas Staff</label><br>
                              <textarea name="tugasStaff" id="tugasStaff" class="form-control" required style="resize: none;" rows="4" cols="50">{{$staff->tugas_staff}}</textarea>
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
      @if ($dataStaff->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataStaff->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataStaff->lastPage(); $i++)
        <li  class="page-item {{ ($dataStaff->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataStaff->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataStaff->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataStaff->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
    // JS script for dependent dropdown list
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
