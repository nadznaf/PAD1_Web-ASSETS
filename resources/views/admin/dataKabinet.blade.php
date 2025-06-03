@extends('admin.layouts.appAdmin')
@vite(['resources/css/style.css', 'resources/js/script.js'])

@section('title', 'Data Kabinet')
<!-- Custom Style for Kabinet Table -->
<style>
    /* Base table styles */
    .equal-width-table {
        table-layout: fixed;
        width: 100%;
    }

    .equal-width-table th,
    .equal-width-table td {
        width: calc(100% / 9);
        word-wrap: break-word;
        overflow-wrap: break-word;
        padding: 8px;
    }

    /* Specific column widths */
    .equal-width-table th:nth-child(4),
    .equal-width-table td:nth-child(4),
    .equal-width-table th:nth-child(5),
    .equal-width-table td:nth-child(5) {
        width: 20%;
    }

    .equal-width-table th:nth-child(1),
    .equal-width-table td:nth-child(1) {
        width: 5%;
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
            table-layout: auto;
            /* Adjust table layout for better responsiveness */
            width: 100%;
            /* Ensure the table takes up the full width of the viewport */
            /* Other mobile-specific styles */
        }
    }
</style>

@section('content')
    <div class="row">
        <h1 class="h1">Data Kabinet</h1>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Kabinet</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.datakabinet.store') }}" id="uploadForm" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @csrf
                                <div class="modal-body">
                                    <label for="namaKabinet">Nama Kabinet</label><br>
                                    <input type="text" name="namaKabinet" placeholder="Tuliskan nama kabinet"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input nama Kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label>Logo Kabinet</label><br>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <!-- Preview image will appear here -->
                                            <div id="image-preview2"
                                                class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                onclick="document.getElementById('uploadInput2').click();">
                                                <p class="text-gray-500">No image selected</p>
                                            </div>
                                            <input type="file" name="logoKabinet" id="uploadInput2" accept="image/*"
                                                class="form-control" style="display: none;">
                                            <button type="button" class="btn btn-danger mt-2" id="clear-button2"
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

                                    <label for="visiKabinet">Visi Kabinet</label><br>
                                    <input type="text" name="visiKabinet" placeholder="Tuliskan visi kabinet"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input visi Kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label for="misiKabinet">Misi Kabinet</label><br>
                                    <input type="text" name="misiKabinet" placeholder="Tuliskan misi kabinet"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input Misi Kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label for="maknaKabinet">Makna Kabinet (Opsional)</label><br>
                                    <input type="text" name="maknaKabinet" placeholder="Tuliskan makna kabinet"
                                        class="form-control">
                                    <div class="invalid-feedback">
                                        Input makna Kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label for="deskripsiKabinet">Deskripsi Kabinet</label><br>
                                    <textarea name="deskripsiKabinet" id="deskripsiKabinet" class="form-control" required style="resize: none;"
                                        rows="4" cols="50" placeholder="Tuliskan deskripsi kabinet di sini."></textarea>
                                    <div class="invalid-feedback">
                                        Input deskripsi Kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>
                                    <br>

                                    <label for="tahunAwalKabinet">Tahun Mulai Kabinet</label><br>
                                    <input type="number" name="tahunAwalKabinet" placeholder="Masukkan hanya tahunnya saja"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input tahun mulai kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label for="tahunAkhirKabinet">Tahun Selesai Kabinet</label><br>
                                    <input type="number" name="tahunAkhirKabinet"
                                        placeholder="Masukkan hanya tahunnya saja" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Input tahun selesai kabinet secara valid!
                                    </div>
                                    <div class="valid-feedback">
                                        Input valid.
                                    </div>
                                    <br>

                                    <label>Foto Sampul Kabinet</label><br>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <!-- Preview image will appear here -->
                                            <div id="image-preview"
                                                class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                onclick="document.getElementById('uploadInput').click();">
                                                <p class="text-gray-500">No image selected</p>
                                            </div>
                                            <input type="file" name="fotoKabinet" id="uploadInput" accept="image/*"
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn" id="button">Tambah</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="card-body">
                <div class="row">
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

            <!-- dataKabinet Table -->
            <div class="table-responsive">
                <table class="table table-bordered equal-width-table">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NAMA KABINET</th>
                            <th>LOGO KABINET</th>
                            <th>PERIODE KABINET</th>
                            <th>FOTO SAMPUL KABINET</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <!-- Fill Table Body using Retrieved Data from Database-->
                    <tbody id="TableBody">
                        @foreach ($dataKabinet as $index => $kabinet)
                            <tr>
                                <td>{{ $dataKabinet->firstItem() + $index }}</td>
                                <td>{{ $kabinet->nama_kabinet }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}"
                                        class="rounded w-24 h-24 object-cover">
                                </td>

                                <td>{{ $kabinet->tahun_awal_kabinet }} - {{ $kabinet->tahun_akhir_kabinet }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/datakabinet/' . $kabinet->foto_sampul_kabinet) }}"
                                        class="rounded w-24 h-24 object-cover">
                                </td>
                                <td>
                                    <div class="flex flex-row gap-x-4">
                                        <!-- Edit Modal Button -->
                                        <button type="button" class="btn" id="buttonred" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $kabinet->id_kabinet }}">
                                            Delete
                                        </button>
                                        <button type="button" class="btn" id="buttonedit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $kabinet->id_kabinet }}">
                                            Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal delete mahasiswa -->
                            <div class="modal fade" id="deleteModal{{ $kabinet->id_kabinet }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $kabinet->id_kabinet }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $kabinet->id_kabinet }}">Hapus
                                                Data Kabinet</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data kabinet ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('admin.datakabinet.destroy', $kabinet->id_kabinet) }}"
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
                            <div class="modal fade" id="editModal{{ $kabinet->id_kabinet }}" tabindex="-1"
                                aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.datakabinet.update', $kabinet->id_kabinet) }}"
                                            id="editForm" enctype="multipart/form-data" method="POST" novalidate>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Kabinet</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaKabinet" class="form-label">Nama Kabinet</label>
                                                    <input type="text" class="form-control" name="namaKabinet"
                                                        value="{{ $kabinet->nama_kabinet }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Logo Kabinet</label><br>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <div id="image-preview-edit-{{ $dataKabinet->firstItem() + $index }}"
                                                            class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                            onclick="document.getElementById('editInput-{{ $dataKabinet->firstItem() + $index }}').click();">
                                                            <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}"
                                                                class="rounded"
                                                                style="object-fit: cover; max-width: 100%; max-height: 100%;">
                                                        </div>
                                                        <input type="file" name="logoKabinet"
                                                            id="editInput-{{ $dataKabinet->firstItem() + $index }}"
                                                            accept="image/*" class="form-control" style="display: none;">
                                                        <button type="button" class="btn btn-danger mt-2"
                                                            id="clear-button-edit-{{ $dataKabinet->firstItem() + $index }}">Clear
                                                            Image</button>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="visiKabinet" class="form-label">Visi Kabinet</label>
                                                    <input type="text" class="form-control" name="visiKabinet"
                                                        value="{{ $kabinet->visi_kabinet }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="misiKabinet" class="form-label">Misi Kabinet</label>
                                                    <input type="text" class="form-control" name="misiKabinet"
                                                        value="{{ $kabinet->misi_kabinet }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="maknaKabinet" class="form-label">Makna Kabinet</label>
                                                    <input type="text" class="form-control" name="maknaKabinet"
                                                        value="{{ $kabinet->makna_kabinet }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsiKabinet">Deskripsi Kabinet</label><br>
                                                    <textarea id="deskripsiKabinet" name="deskripsiKabinet" class="form-control"
                                                        value="{{ $kabinet->deskripsi_kabinet }}" style="resize: none;" rows="4" cols="50">{{ $kabinet->deskripsi_kabinet }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tahunAwalKabinet">Tahun Mulai Kabinet</label><br>
                                                    <input type="number" name="tahunAwalKabinet" class="form-control"
                                                        value="{{ $kabinet->tahun_awal_kabinet }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tahunAkhirKabinet">Tahun Selesai Kabinet</label><br>
                                                    <input type="number" name="tahunAkhirKabinet" class="form-control"
                                                        value="{{ $kabinet->tahun_akhir_kabinet }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Foto Sampul Kabinet</label><br>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <!-- Image preview will appear here -->
                                                        <div id="image-preview-edit2-{{ $dataKabinet->firstItem() + $index }}"
                                                            class="border border-gray-400 border-dashed rounded-lg mb-3 p-3"
                                                            style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center; cursor: pointer;"
                                                            onclick="document.getElementById('editInput2-{{ $dataKabinet->firstItem() + $index }}').click();">
                                                            <img src="{{ asset('storage/datakabinet/' . $kabinet->foto_sampul_kabinet) }}"
                                                                class="rounded"
                                                                style="object-fit: cover; max-width: 100%; max-height: 100%;">
                                                        </div>
                                                        <input type="file" name="fotoSampulKabinet"
                                                            id="editInput2-{{ $dataKabinet->firstItem() + $index }}"
                                                            accept="image/*" class="form-control" style="display: none;">
                                                        <button type="button" class="btn btn-danger mt-2"
                                                            id="clear-button-edit2-{{ $dataKabinet->firstItem() + $index }}">Clear
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
                @if ($dataKabinet->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo; Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $dataKabinet->previousPageUrl() }}" rel="prev">&laquo;
                            Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $dataKabinet->lastPage(); $i++)
                    <li class="page-item {{ $dataKabinet->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $dataKabinet->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next Page Link --}}
                @if ($dataKabinet->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $dataKabinet->nextPageUrl() }}" rel="next">Next &raquo;</a>
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
        //JS function for first image preview in Input Modal
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

        //JS function for second image preview in Input Modal
        document.getElementById('uploadInput2').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview2');
            const clearButton = document.getElementById('clear-button2');

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
        document.getElementById('clear-button2').addEventListener('click', function() {
            const imagePreview = document.getElementById('image-preview2');
            const uploadInput = document.getElementById('uploadInput2');

            imagePreview.innerHTML = `<p class="text-gray-500">No image selected</p>`;
            uploadInput.value = '';
            this.style.display = 'none';
        });


        // Pada script bagian edit modal
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
        document.querySelectorAll('[id^="editInput2-"]').forEach((input, index) => {
            input.addEventListener('change', function(event) {
                const imagePreviewEdit = document.getElementById(`image-preview-edit2-${index + 1}`);
                const clearButtonEdit = document.getElementById(`clear-button-edit2-${index + 1}`);

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
            document.getElementById(`clear-button-edit2-${index + 1}`).addEventListener('click', function() {
                const imagePreviewEdit = document.getElementById(`image-preview-edit2-${index + 1}`);
                input.value = '';
                this.style.display = 'none';
                imagePreviewEdit.innerHTML = `<p class="text-gray-500">No image selected</p>`;
            });
        });
    </script>
@endsection
