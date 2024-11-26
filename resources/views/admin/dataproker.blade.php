@extends('admin.layouts.appAdmin')
@vite(['public/css/style.css','public/js/script.js'])

@section('title', "Data Proker")
<!-- Custom Style for Kabinet Table -->
<style>
  /* Base table styles */
  .equal-width-table {
    table-layout: fixed;
    width: 100%;
  }

  .equal-width-table th,
  .equal-width-table td {
    width: calc(100% / 8);
    word-wrap: break-word;
    overflow-wrap: break-word;
    padding: 8px;
  }

  /* Specific column widths */
  .equal-width-table th:nth-child(4),
  .equal-width-table td:nth-child(4),
  .equal-width-table th:nth-child(5),
  .equal-width-table td:nth-child(5) {
    width: 15%;
  }
  .equal-width-table th:nth-child(7),
  .equal-width-table td:nth-child(7) {
    width: 18%;
  }
  .equal-width-table th:nth-child(6),
  .equal-width-table td:nth-child(6) {
    width: 8%;
  }

  .equal-width-table th:nth-child(1),
  .equal-width-table td:nth-child(1) {
    width: 5%;
  }
  .equal-width-table th:nth-child(2),
  .equal-width-table td:nth-child(2) {
    width: 10%;
  }
  .equal-width-table th:nth-child(8),
  .equal-width-table td:nth-child(8) {
    width: 10%;
  }

  /* Action buttons container */
  .action-buttons {
    display: flex;
    flex-direction: column;
    gap: 4px;
    align-items: center;
  }

  /* Action buttons */
  .action-buttons .btn {
    width: 100%;
    padding: 4px 8px;
    font-size: 0.875rem;
    margin: 2px 0;
  }

  @media (max-width: 768px) {
      .equal-width-table {
          /* Mobile-specific styles */
          table-layout: auto; /* Adjust table layout for better responsiveness */
          width: 100%; /* Ensure the table takes up the full width of the viewport */
          /* Other mobile-specific styles */
      }
  }
</style>
@section('content')
<div class="row">
  <h1 class="h1">Data Proker</h1>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Proker</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("admin.dataproker.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
              <div class="modal-body">

                <div class="mb-3">
                    <label for="id_kabinet" class="form-label">Asal Kabinet Penyelenggara Program Kerja</label>
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
                    <label for="id_divisi" class="form-label">Divisi Penyelenggara Program Kerja</label>
                    <select name="id_divisi" id="id_divisi" class="form-select" required>
                        <option value="" disabled selected>Pilih Asal Divisi</option>
                    </select>
                    <div class="invalid-feedback">
                        Input asal divisi secara valid!
                    </div>
                </div>

                <div class="mb-3">
                    <label for="judulProker" class="form-label">Judul Program Kerja</label>
                    <input type="text" class="form-control" name="judulProker" placeholder="Tuliskan judul program kerja">
                </div>

                <div class="mb-3">
                    <label for="deskripsiProker">Penjelasan Mengenai Program Kerja</label><br>
                    <textarea name="deskripsiProker" id="deskripsiProker" class="form-control" required style="resize: none;" rows="4" cols="50" placeholder="Tuliskan penjelasan mengenai program kerja"></textarea>
                    <div class="invalid-feedback">
                        Input penjelasan proker secara valid!
                    </div>
                    <div class="valid-feedback">
                        Input valid.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsiKegiatanProker">Penjelasan Kegiatan yang Dilakukan pada Program Kerja</label><br>
                    <textarea name="deskripsiKegiatanProker" id="deskripsiKegiatanProker" class="form-control" required style="resize: none;" rows="4" cols="50" placeholder="Tuliskan penjelasan mengenai kegiatan yang dilakukan program kerja"></textarea>
                    <div class="invalid-feedback">
                        Input penjelasan kegiatan proker secara valid!
                    </div>
                    <div class="valid-feedback">
                        Input valid.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="statusProker" class="form-label">Status Program Kerja</label>
                    <select name="statusProker" id="statusProker" class="form-select" required>
                        <option value="" disabled selected>Pilih Status Program Kerja</option>
                        <option value="Bersiap">Bersiap</option>
                        <option value="Sedang Berjalan">Sedang Berjalan</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>

                <div class="mb-3">
                  <label for="tanggal_kegiatan">Tanggal Kegiatan:</label>
                  <div id="tanggal-kegiatan-container">
                      <div class="input-group mb-2">
                          <input type="date" class="form-control" name="tanggal_kegiatan[]" required>
                      </div>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="addTanggalKegiatan()">Tambah Tanggal</button>
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
        <div class="col-md-8">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
              </span>
              <input type="text" id="searchInput" class="form-control" placeholder="Search in this Category..." onkeyup="searchTable()">
            </div>
        </div>
        <div class="col-md-4">
          <!-- Button trigger modal -->
          <button type="button" id="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#insertData">
            Tambah Data
          </button>
        </div>
      </div>
    </div>
    <br>
    <!-- data proker Table -->
    <div class="table-responsive">
      <table class="table table-bordered equal-width-table">
        <thead>
          <tr>
            <th>NO.</th>
            <th>JUDUL PROKER</th>
            <th>PENYELENGGARA</th>
            <th>PENJELASAN PROKER</th>
            <th>DESKRIPSI KEGIATAN</th>
            <th>STATUS PROKER</th>
            <th>WAKTU KEGIATAN</th>
            <th>ACTION</th>
          </tr>
        </thead>
        
        <!-- Fill Table Body using Retrieved Data from Database-->
        <tbody id="TableBody">
          @foreach($dataProker as $index => $proker)
          <tr>
            <td>{{ $dataProker->firstItem() + $index }}</td>
            <td>{{ $proker->judul_proker}}</td>
            <td>
                <strong>Kabinet Penyelenggara:</strong> <br>{{ $proker->divisi->nama_divisi }} <br> <hr>
                <strong>Divisi Penyelenggara:</strong> <br>{{ $proker->divisi->kabinet->nama_kabinet }} <br>  
            </td>            
            <td>{{ $proker->deskripsi_proker }}</td>
            <td>{{ $proker->deskripsi_kegiatan_proker }}</td>
            <td>{{ $proker->status_proker}}</td>
            <!-- Tampilkan Tanggal Kegiatan -->
            <td>
                @foreach ($proker->waktu_proker as $tanggal)
                    {{ \Carbon\Carbon::parse($tanggal->tanggal_kegiatan)->isoFormat('dddd, DD-MM-YYYY') }}<hr><br>
                @endforeach
            </td>
            <td>
                <div>
                    <!-- Edit Button -->
                    <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $proker->id_proker}}">
                        Edit
                    </button>
                </div>
            </td>
          </tr>

          <!-- Edit Modal -->
          <div class="modal fade" id="editModal{{  $proker->id_proker }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <form action="{{ route('admin.dataproker.update',  $proker->id_proker) }}" class="editForm" enctype="multipart/form-data" method="POST" class="needs-validation">
                  @csrf
                          @method('PUT')
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel">Edit Data Program Kerja</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                    <!-- Dropdown for Kabinet -->
                                    <label for="id_kabinet">Asal Kabinet</label><br>
                                    <p>Kabinet penyelenggara Program Kerja saat ini: <strong>{{ $proker->divisi->kabinet->nama_kabinet }}</strong></p>
                                    <select name="id_kabinet" id="id_kabinet_edit-{{ $dataProker->firstItem() + $index }}" class="form-select" required>
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
                                    <p>Kabinet penyelenggara Program Kerja saat ini: <strong>{{ $proker->divisi->nama_divisi }}</strong></p>
                                    <select name="id_divisi" required id="id_divisi_edit-{{ $dataProker->firstItem() + $index }}" class="form-select" required>
                                        <option value="" disabled selected>Pilih Asal Divisi</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Input asal divisi secara valid!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="judulProker" class="form-label">Judul Program Kerja</label>
                                    <input type="text" class="form-control" name="judulProker" value={{$proker->judul_proker}}>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsiProker">Penjelasan Mengenai Program Kerja</label><br>
                                    <textarea name="deskripsiProker" id="deskripsiProker" class="form-control" required value="{{ $proker->deskripsi_proker }}" style="resize: none;" rows="4" cols="50">{{ $proker->deskripsi_proker }}</textarea>
                                    <div class="invalid-feedback">
                                        Input penjelasan proker secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsiKegiatanProker">Penjelasan Kegiatan yang Dilakukan pada Program Kerja</label><br>
                                    <textarea name="deskripsiKegiatanProker" id="deskripsiKegiatanProker" class="form-control" required value="{{ $proker->deskripsi_kegiatan_proker }}" style="resize: none;" rows="4" cols="50">{{ $proker->deskripsi_kegiatan_proker }}</textarea>
                                    <div class="invalid-feedback">
                                        Input penjelasan kegiatan proker secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="statusProker" class="form-label">Status Program Kerja</label>
                                    <select name="statusProker" id="statusProker" class="form-select" required onchange="updateSelectColor()">
                                        <option value="{{$proker->status_proker}}" selected>Status saat ini: {{$proker->status_proker}}</option>
                                        <option value="Bersiap">Bersiap</option>
                                        <option value="Sedang Berjalan">Sedang Berjalan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Dibatalkan">Dibatalkan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid option.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_kegiatan">Tanggal Kegiatan:</label>
                                    <div id="edit-tanggal-kegiatan-container-{{ $dataProker->firstItem() + $index }}">
                                        @foreach ($proker->waktu_proker as $tanggal)
                                            <div class="input-group mb-2">
                                                <input type="date" class="form-control" name="tanggal_kegiatan_edit[]" 
                                                      value="{{ \Carbon\Carbon::parse($tanggal->tanggal_kegiatan)->format('Y-m-d') }}" required>
                                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Hapus</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary" 
                                            onclick="addTanggalKegiatanInEdit('edit-tanggal-kegiatan-container-{{ $dataProker->firstItem() + $index }}')">
                                        Tambah Tanggal
                                    </button>
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
      @if ($dataProker->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataProker->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataProker->lastPage(); $i++)
        <li  class="page-item {{ ($dataProker->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataProker->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataProker->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataProker->nextPageUrl() }}" rel="next">Next &raquo;</a>
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

let editTanggalKegiatanContainer = [];

function addTanggalKegiatanInEdit(containerId) {
  const container = document.getElementById(containerId);

  // Create a div to wrap the input and button
  const newField = document.createElement('div');
  newField.className = 'input-group mb-2';

  // Create the date input
  const newInput = document.createElement('input');
  newInput.type = 'date';
  newInput.name = 'tanggal_kegiatan_edit[]'; // Use array name
  newInput.className = 'form-control';
  newInput.required = true;

  // Create the delete button
  const newDelete = document.createElement('button');
  newDelete.type = 'button';
  newDelete.className = 'btn btn-danger';
  newDelete.textContent = 'Hapus';
  newDelete.onclick = function() {
    removeTanggalKegiatanInEdit(this);
  };

  // Append the input and button to the wrapper div
  newField.appendChild(newInput);
  newField.appendChild(newDelete);

  // Append the wrapper div to the container
  container.appendChild(newField);

  // Add the new input to the editTanggalKegiatanContainer array
  editTanggalKegiatanContainer.push(newInput);
}

function removeTanggalKegiatanInEdit(button) {
  const inputField = button.parentElement;
  const container = inputField.parentElement;
  container.removeChild(inputField);

  // Remove the input from the editTanggalKegiatanContainer array
  const index = editTanggalKegiatanContainer.indexOf(inputField.children[0]);
  if (index !== -1) {
    editTanggalKegiatanContainer.splice(index, 1);
  }
}

// Add a new function to get the values from the editTanggalKegiatanContainer array
function getEditTanggalKegiatanValues() {
  return editTanggalKegiatanContainer.map(input => input.value);
}


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".editForm").forEach(function (form) {
        form.addEventListener("submit", function (e) {
        // Get the values from the editTanggalKegiatanContainer array
        const tanggalKegiatanValues = getEditTanggalKegiatanValues();

        // Create a hidden input field to store the tanggal_kegiatan_edit values
        const tanggalKegiatanInput = document.createElement('input');
        tanggalKegiatanInput.type = 'hidden';
        tanggalKegiatanInput.name = 'tanggal_kegiatan_edit_baru';
        tanggalKegiatanInput.value = JSON.stringify(tanggalKegiatanValues);

        // Append the hidden input field to the form
        this.appendChild(tanggalKegiatanInput);

        // Submit the form
        this.submit();
        });
    });
});


function addTanggalKegiatan() {
      const container = document.getElementById('tanggal-kegiatan-container');
      
      // Create a div to wrap the input and button
      const newField = document.createElement('div');
      newField.className = 'input-group mb-2';

      // Create the date input
      const newInput = document.createElement('input');
      newInput.type = 'date';
      newInput.name = 'tanggal_kegiatan[]';
      newInput.className = 'form-control';
      
      // Create the close button
      const newDelete = document.createElement('button');
      newDelete.type = 'button';
      newDelete.className = 'btn btn-danger';
      newDelete.textContent = 'Hapus';
      newDelete.onclick = function() {
          container.removeChild(newField);
      };

      // Append the input and button to the wrapper div
      newField.appendChild(newInput);
      newField.appendChild(newDelete);

      // Append the wrapper div to the container
      container.appendChild(newField);
  }

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

</script>
@endsection