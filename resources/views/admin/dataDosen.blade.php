@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css', 'resources/js/script.js'])

@section('title', 'Data Dosen Pebimbing')
@section('content')
    <div class="row">
        <h1 class="h1">Data Dosen Pebimbing</h1>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Dosen Pebimbing</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.datadosen.store') }}" id="uploadForm" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @csrf
                                <div class="modal-body">
                                    <label for="namaDosen">Nama Dosen Pebimbing</label><br>
                                    <input type="text" name="namaDosen" placeholder="Tuliskan nama dosen"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input nama Dosen Pebimbing secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label for="nikaDosen">Nomor Induk Karyawan (NIKA)</label><br>
                                    <input type="text" name="nikaDosen" placeholder="Tuliskan NIKA dosen"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input Nomor Induk Karyawan (NIKA) secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label>Foto Profil Dosen Pebimbing</label><br>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <!-- Preview image will appear here -->
                                            <div id="image-preview"
                                                class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                onclick="document.getElementById('uploadInput').click();">
                                                <p class="text-gray-500">No image selected</p>
                                            </div>
                                            <input type="file" name="fotoDosen" id="uploadInput" accept="image/*"
                                                class="form-control" style="display: none;">
                                            <button type="button" class="btn btn-danger mt-2" id="clear-button"
                                                style="display: none;">
                                                Clear Image
                                            </button>
                                        </div>
                                        <div class="invalid-feedback">
                                            Input foto Dosen Pebimbing secara valid!
                                        </div>
                                        <div class="valid-feedback">
                                            Input valid.
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn" id="button">Tambah</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- Show Alert message when any error occur (especially when error storing data) -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><strong>ERROR</strong></li>
                                <li>{{ $error }}</li>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <!-- Search Data in Table -->
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                                </svg>
                            </span>
                            <input type="text" id="searchInput" class="form-control"
                                placeholder="Search in this Category..." onkeyup="searchTable()">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- Button trigger modal -->
                        <button type="button" id="button" class="btn w-100" data-bs-toggle="modal"
                            data-bs-target="#insertData">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <!-- dataDosen Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NAMA DOSEN PEBIMBING</th>
                            <th>NOMOR INDUK KARYAWAN (NIKA)</th>
                            <th>FOTO PROFIL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <!-- Fill Table Body using Retrieved Data from Database-->
                    <tbody id="TableBody">
                        @foreach ($dataDosen as $index => $dosen)
                            <tr>
                                <td>{{ $dataDosen->firstItem() + $index }}</td>
                                <td>{{ $dosen->nama_dosen }}</td>
                                <td>{{ $dosen->nika_dosen }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/datadosen/' . $dosen->foto_profil_dosen) }}"
                                        class="rounded w-24 h-24 object-cover">
                                </td>
                                <td>
                                    <div class="flex flex-row gap-x-4">
                                        <!-- Edit Modal Button -->
                                        <button type="button" class="btn W-100" id="buttonred" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $dosen->id_dosen }}">
                                            Delete
                                        </button>
                                        <button type="button" class="btn W-100" id="buttonedit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $dosen->id_dosen }}">
                                            Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal delete dosen -->
                            <div class="modal fade" id="deleteModal{{ $dosen->id_dosen }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $dosen->id_dosen }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $dosen->id_dosen }}">Hapus
                                                Data Dosen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data dosen ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('admin.datadosen.destroy', $dosen->id_dosen) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn"
                                                    id="buttonredreverse">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $dosen->id_dosen }}" tabindex="-1"
                                aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.datadosen.update', $dosen->id_dosen) }}"
                                            id="editForm" enctype="multipart/form-data" method="POST" novalidate>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Dosen</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaDosen" class="form-label">Nama Dosen</label>
                                                    <input type="text" class="form-control" name="namaDosen"
                                                        value="{{ $dosen->nama_dosen }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nikaDosen" class="form-label">Nomor Induk Karyawan
                                                        (NIKA)
                                                    </label>
                                                    <input type="text" class="form-control" name="nikaDosen"
                                                        value="{{ $dosen->nika_dosen }}">
                                                </div>
                                                <div class="mb-3">
                                                    <!-- Image preview will appear here -->
                                                    <label>Foto Profil Dosen</label><br>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <div id="image-preview-edit-{{ $dataDosen->firstItem() + $index }}"
                                                            class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                            onclick="document.getElementById('editInput-{{ $dataDosen->firstItem() + $index }}').click();">
                                                            <img src="{{ asset('storage/datadosen/' . $dosen->foto_profil_dosen) }}"
                                                                class="rounded"
                                                                style="object-fit: cover; max-width: 100%; max-height: 100%;">
                                                        </div>
                                                        <input type="file" name="fotoDosenEdit"
                                                            id="editInput-{{ $dataDosen->firstItem() + $index }}"
                                                            accept="image/*" class="form-control" style="display: none;">
                                                        <button type="button" class="btn btn-danger mt-2"
                                                            id="clear-button-edit-{{ $dataDosen->firstItem() + $index }}">Clear
                                                            Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn" id="button">Simpan
                                                    Perubahan</button>
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
                @if ($dataDosen->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo; Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $dataDosen->previousPageUrl() }}" rel="prev">&laquo;
                            Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $dataDosen->lastPage(); $i++)
                    <li class="page-item {{ $dataDosen->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $dataDosen->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next Page Link --}}
                @if ($dataDosen->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $dataDosen->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="img-fluid rounded-lg" alt="Image preview" style="max-width: 100%; max-height: 100%;">`;
                    clearButton.style.display = 'block';
                };

                reader.readAsDataURL(file);
            }
        });
        document.getElementById('clear-button').addEventListener('click', function() {
            const imagePreview = document.getElementById('image-preview');
            const uploadInput = document.getElementById('uploadInput');

            imagePreview.innerHTML = `<p class="text-gray-500">No image selected</p>`;
            uploadInput.value = '';
            this.style.display = 'none';
        });

        //JS function for image preview in Edit Modal
        document.querySelectorAll('[id^="editInput-"]').forEach((input, index) => {
            input.addEventListener('change', function(event) {
                const imagePreviewEdit = document.getElementById(`image-preview-edit-${index + 1}`);
                const clearButtonEdit = document.getElementById(`clear-button-edit-${index + 1}`);

                if (event.target.files.length > 0) {
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreviewEdit.innerHTML =
                            `<img src="${e.target.result}" class="img-fluid rounded-lg" alt="Image preview" style="max-width: 100%; max-height: 100%;">`;
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
