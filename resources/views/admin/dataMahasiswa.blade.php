@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css', 'resources/js/script.js'])

@section('title', 'Data Mahasiswa')
@section('content')
    <div class="row">
        <h1 class="h1">Data Mahasiswa</h1>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.datamahasiswa.store') }}" id="uploadForm" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @csrf
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <label for="namaMahasiswa">Nama Mahasiswa</label><br>
                                    <input type="text" name="namaMahasiswa" placeholder="Tuliskan nama mahasiswa"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input nama mahasiswa secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>


                                    <br>

                                    <label>Foto Profil Mahasiswa</label><br>
                                    <div class="d-flex flex-column align-items-center">
                                        <!-- Preview image will appear here -->
                                        <div id="image-preview"
                                            class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                            onclick="document.getElementById('uploadInput').click();">
                                            <p class="text-gray-500">No image selected</p>
                                        </div>
                                        <input type="file" name="fotoMhs" id="uploadInput" accept="image/*"
                                            class="form-control" style="display: none;">
                                        <button type="button" class="btn btn-danger mt-2" id="clear-button"
                                            style="display: none;">
                                            Clear Image
                                        </button>
                                    </div>
                                    <div class="invalid-feedback">
                                        Input foto mahasiswa secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>
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
            <!-- Table Section -->
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

            <!-- dataMahasiswa Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NAMA MAHASISWA</th>
                            <th>FOTO PROFIL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="TableBody">
                        <!-- Fill Table Body using Retrieved Data from Database-->
                        @foreach ($dataMahasiswa as $index => $mahasiswa)
                            <tr>
                                <td>{{ $dataMahasiswa->firstItem() + $index }}</td>
                                <td>{{ $mahasiswa->nama_mhs }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/datamahasiswa/' . $mahasiswa->foto_profil_mhs) }}"
                                        class="rounded w-24 h-24 object-cover">
                                </td>
                                <td>
                                    <div class="flex flex-row gap-x-4">
                                        <!-- Edit Modal Button -->
                                        <button type="button" class="btn w-100" id="buttonred" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $mahasiswa->id_mhs }}">
                                            Delete
                                        </button>
                                        <button type="button" class="btn w-100" id="buttonedit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $mahasiswa->id_mhs }}">
                                            Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal delete mahasiswa -->
                            <div class="modal fade" id="deleteModal{{ $mahasiswa->id_mhs }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $mahasiswa->id_mhs }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $mahasiswa->id_mhs }}">Hapus
                                                Data Mahasiswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data mahasiswa ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('admin.datamahasiswa.destroy', $mahasiswa->id_mhs) }}"
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
                            <div class="modal fade" id="editModal{{ $mahasiswa->id_mhs }}" tabindex="-1"
                                aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.datamahasiswa.update', $mahasiswa->id_mhs) }}"
                                            id="editForm" enctype="multipart/form-data" method="POST" novalidate>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit mahasiswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaMhs" class="form-label">Nama Mahasiswa</label>
                                                    <input type="text" class="form-control" name="namaMhs"
                                                        value="{{ $mahasiswa->nama_mhs }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Foto Profil Mahasiswa</label><br>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <!-- Image Preview will appear here -->
                                                        <div id="image-preview-edit-{{ $dataMahasiswa->firstItem() + $index }}"
                                                            class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                            onclick="document.getElementById('editInput-{{ $dataMahasiswa->firstItem() + $index }}').click();">
                                                            <img src="{{ asset('storage/datamahasiswa/' . $mahasiswa->foto_profil_mhs) }}"
                                                                class="rounded"
                                                                style="object-fit: cover; max-width: 100%; max-height: 100%;">
                                                        </div>
                                                        <input type="file" name="fotoMhsEdit"
                                                            id="editInput-{{ $dataMahasiswa->firstItem() + $index }}"
                                                            accept="image/*" class="form-control" style="display: none;">
                                                        <button type="button" class="btn btn-danger mt-2"
                                                            id="clear-button-edit-{{ $dataMahasiswa->firstItem() + $index }}">Clear
                                                            Image</button>
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
                @if ($dataMahasiswa->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo; Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $dataMahasiswa->previousPageUrl() }}" rel="prev">&laquo;
                            Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $dataMahasiswa->lastPage(); $i++)
                    <li class="page-item {{ $dataMahasiswa->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $dataMahasiswa->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next Page Link --}}
                @if ($dataMahasiswa->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $dataMahasiswa->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
        //JS function for image preview in Insert Modal
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
