@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css','resources/js/script.js'])

@section('title', "Data Divisi")
@section('content')
<div class="row">
  <h1 class="h1">Data Color Pallete Kabinet untuk Keperluan Tampilan Gaya UI Web ASSETS</h1>
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
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Color Pallete</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("admin.datacolorpallete.store")}}" id="uploadForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            <div class="modal-body">
                <!-- Fill dropdown button content using all data retrieved from kabinet's table -->
                <label for="id_kabinet">Kabinet</label><br>
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
                <label for="color-select">Kode Hex Primary Color</label><br><br>
                <!-- Color Picker and Color Preview will appear here -->
                <div class="d-flex justify-content-center">
                  <fieldset>
                    <input
                      type="color"
                      id="color-select"
                      name="primaryColor"
                      class="mx-3 h-48 w-48 hover:cursor-pointer"
                      onchange="updateHexCode()"
                    />
                  </fieldset>
                </div>
                <!-- Elemen untuk menampilkan kode hex -->
                <div class="d-flex justify-content-center mt-3">
                  <p id="hex-code" class="font-bold text-lg">#000000</p> <!-- Default value -->
                </div>
                <br>

                <label for="color-select">Kode Hex Secondary Color</label><br><br>
                <!-- Color Picker and Color Preview will appear here -->
                <div class="d-flex justify-content-center">
                  <fieldset>
                    <input
                      type="color"
                      id="color-select2"
                      name="secondaryColor"
                      class="mx-3 h-48 w-48 hover:cursor-pointer"
                      onchange="updateHexCode2()"
                    />
                  </fieldset>
                </div>
                <!-- Elemen untuk menampilkan kode hex -->
                <div class="d-flex justify-content-center mt-3">
                  <p id="hex-code2" class="font-bold text-lg">#000000</p> <!-- Default value -->
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
        <div class="col-sm-10 col-12">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
              </svg>
            </span>
            <input type="text" id="searchInput" class="form-control" placeholder="Search in this Category..." onkeyup="searchTable()">
          </div>
        </div>
        <div class="col-sm-2 col-12 mt-2 mt-sm-0 d-flex justify-content-sm-end">
          <!-- Button trigger modal -->
          <button type="button" id="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#insertData">
            Tambah Data
          </button>
        </div>
      </div>
    </div>
    <br>
    <!-- dataColorPallete Table -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NO.</th>
            <th>NAMA KABINET</th>
            <th>PRIMARY COLOR </th>
            <th>SECONDARY COLOR </th>
            <th>ACTION</th>
          </tr>
        </thead>

        <!-- Fill Table Body using Retrieved Data from Database-->
        <tbody id="TableBody">
          @foreach($dataColorPallete as $index => $color)
          <tr>
            <td>{{ $dataColorPallete->firstItem() + $index }}</td>
            <td>{{ $color->kabinet->nama_kabinet}}</td>
            <td>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <div class="flex-none w-6 h-6 rounded" style="background-color: {{ $color->primary_color }}"></div>
                    <span class="ml-2">{{ $color->primary_color }}</span>
                </div>
            </td>
            <td>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <div class="flex-none w-6 h-6 rounded" style="background-color: {{ $color->secondary_color }}"></div>
                    <span class="ml-2">{{ $color->secondary_color }}</span>
                </div>
            <td>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-xl-start">
              <!-- Edit Button -->
              <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                data-bs-target="#editModal{{ $color->id_color_pallete}}">
                Edit
              </button>
              <button type="button" class="btn" id="buttonred" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $color->id_color_pallete}}">
                Delete
              </button>
              </div>
            </td>
          </tr>

        <!-- Modal delete -->
            <div class="modal fade" id="deleteModal{{ $color->id_color_pallete }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $color->id_color_pallete }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $color->id_color_pallete }}">Hapus Data Color Pallete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data Color Pallete ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.datacolorpallete.destroy', $color->id_color_pallete) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" id="buttonredreverse">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $color->id_color_pallete }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.datacolorpallete.update', $color->id_color_pallete) }}" id="editForm" enctype="multipart/form-data" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Color Pallete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="id_kabinet">Asal Kabinet</label><br>
                                    <!-- Fill dropdown button content using all data retrieved from kabinet's table -->
                                    <select name="id_kabinet" class="form-select" required>
                                        <!-- Option pertama adalah dosen yang sudah dipilih -->
                                        <option value="{{ $color->id_kabinet }}" selected>{{ $color->kabinet->nama_kabinet }}</option>

                                        <!-- Iterasi untuk menampilkan dosen lain selain dosen yang sudah dipilih -->
                                        @foreach ($dataKabinet as $kabinet)
                                            @if ($kabinet->id_kabinet != $color->id_kabinet)
                                            <option value="{{ $kabinet->id_kabinet }}">{{ $kabinet->nama_kabinet }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="primary-color-select-update">Kode Hex Primary Color</label><br><br>
                                  <div class="d-flex justify-content-center">
                                      <fieldset>
                                          <input
                                              type="color"
                                              id="primary-color-select-update-{{$dataColorPallete->firstItem() + $index }}"
                                              name="primaryColor"
                                              class="mx-3 h-48 w-48 hover:cursor-pointer"
                                              value="{{ $color->primary_color }}"
                                          />
                                      </fieldset>
                                  </div>
                                  <!-- Elemen untuk menampilkan kode hex -->
                                  <div class="d-flex justify-content-center mt-3">
                                      <p id="primary-hex-code-update-{{$dataColorPallete->firstItem() + $index }}" class="font-bold text-lg">
                                          {{ $color->primary_color }}
                                      </p>
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <label for="secondary-color-select-update">Kode Hex Secondary Color</label><br><br>
                                  <div class="d-flex justify-content-center">
                                      <fieldset>
                                          <input
                                              type="color"
                                              id="secondary-color-select-update-{{$dataColorPallete->firstItem() + $index }}"
                                              name="secondaryColor"
                                              class="mx-3 h-48 w-48 hover:cursor-pointer"
                                              value="{{ $color->secondary_color }}"
                                          />
                                      </fieldset>
                                  </div>
                                  <!-- Elemen untuk menampilkan kode hex -->
                                  <div class="d-flex justify-content-center mt-3">
                                      <p id="secondary-hex-code-update-{{$dataColorPallete->firstItem() + $index }}" class="font-bold text-lg">
                                          {{ $color->secondary_color }}
                                      </p>
                                  </div>
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
      @if ($dataColorPallete->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Previous</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $dataColorPallete->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @for ($i = 1; $i <= $dataColorPallete->lastPage(); $i++)
        <li  class="page-item {{ ($dataColorPallete->currentPage() == $i) ? 'active' : '' }}">
          <a  class="page-link" href="{{ $dataColorPallete->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      {{-- Next Page Link --}}
      @if ($dataColorPallete->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $dataColorPallete->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
  // fungsi untuk primary color preview bagian upload
    function updateHexCode() {
      // Ambil nilai dari color picker
      const colorValue = document.getElementById('color-select').value;
      // Update nilai hex di bawahnya
      document.getElementById('hex-code').innerText = colorValue;
    }

    // fungsi untuk secondary color preview bagian upload
    function updateHexCode2() {
      // Ambil nilai dari color picker
      const colorValue = document.getElementById('color-select2').value;
      // Update nilai hex di bawahnya
      document.getElementById('hex-code2').innerText = colorValue;
    }

    // fungsi untuk third color preview bagian upload
    function updateHexCode3() {
      // Ambil nilai dari color picker
      const colorValue = document.getElementById('color-select3').value;
      // Update nilai hex di bawahnya
      document.getElementById('hex-code3').innerText = colorValue;
    }

    // fungsi untuk fourth color preview bagian upload
    function updateHexCode4() {
      // Ambil nilai dari color picker
      const colorValue = document.getElementById('color-select4').value;
      // Update nilai hex di bawahnya
      document.getElementById('hex-code4').innerText = colorValue;
    }

  // fungsi untuk color preview bagian edit
  document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk bagian edit primary color
    const primaryColorPickers = document.querySelectorAll('[id^="primary-color-select-update-"]');
    const primaryHexCodes = document.querySelectorAll('[id^="primary-hex-code-update-"]');

    primaryColorPickers.forEach((picker, index) => {
        picker.addEventListener('input', function() {
            if(primaryHexCodes[index]) {
                primaryHexCodes[index].innerText = this.value;
            }
        });
    });

    // Fungsi untuk bagian edit secondary color
    const secondaryColorPickers = document.querySelectorAll('[id^="secondary-color-select-update-"]');
    const secondaryHexCodes = document.querySelectorAll('[id^="secondary-hex-code-update-"]');

    secondaryColorPickers.forEach((picker, index) => {
        picker.addEventListener('input', function() {
            if(secondaryHexCodes[index]) {
                secondaryHexCodes[index].innerText = this.value;
            }
        });
    });
    // Fungsi untuk bagian edit third color
    const thirdColorPickers = document.querySelectorAll('[id^="third-color-select-update-"]');
    const thirdHexCodes = document.querySelectorAll('[id^="third-hex-code-update-"]');

    thirdColorPickers.forEach((picker, index) => {
        picker.addEventListener('input', function() {
            if(thirdHexCodes[index]) {
              thirdHexCodes[index].innerText = this.value;
            }
        });
    });
    // Fungsi untuk bagian edit fourth color
    const fourthColorPickers = document.querySelectorAll('[id^="fourth-color-select-update-"]');
    const fourthHexCodes = document.querySelectorAll('[id^="fourth-hex-code-update-"]');

    fourthColorPickers.forEach((picker, index) => {
        picker.addEventListener('input', function() {
            if(fourthHexCodes[index]) {
              fourthHexCodes[index].innerText = this.value;
            }
        });
    });
});
</script>
@endsection
