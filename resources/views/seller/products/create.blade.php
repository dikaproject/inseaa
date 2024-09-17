@extends('seller.components.base')

@section('title', 'Tambah Produk')

@section('content')

    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tambah Produk Baru</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('seller.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Tambah Produk</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Kembali</span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Produk Baru</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form Tambah Produk -->
                            <form action="{{ route('seller.products.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Produk</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Singkat</label>
                                    <input type="text" name="description" id="description" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="details_product" class="form-label">Deskripsi Lengkap Produk</label>
                                    <textarea name="details_product" id="tinymce" class="form-control"></textarea>
                                </div>

                                <!-- Tombol untuk meminta AI generate deskripsi -->
                                <div class="mb-3">
                                    <label for="ask_ai" class="form-label">Ask AI to Generate Description</label>
                                    <button type="button" id="ask_ai" class="btn btn-info">Ask AI</button>
                                    <small class="text-muted">AI akan menghasilkan deskripsi lengkap berdasarkan input
                                        Anda.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug Produk</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        placeholder="Slug Produk">
                                </div>
                                <div class="mb-3">
                                    <label for="alt_text" class="form-label">Alt Text</label>
                                    <input type="text" name="alt_text" id="alt_text" class="form-control"
                                        placeholder="Alt Text" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="images">Unggah Gambar Produk</label>
                                    <input type="file" name="images[]" id="images" class="form-control" required
                                        accept="image/png, image/jpeg" multiple>
                                    <small class="text-muted">Anda dapat mengunggah lebih dari satu gambar.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select name="category_id" id="category" class="form-select" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Unggah Produk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>

    <!-- Modal untuk input prompt AI -->
    <div id="aiModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    Ask AI to Generate Product Description
                </h5>
                 <h5 style="font-size: 14px; color: #555; font-weight: normal; margin-top: 10px; line-height: 1.5;">
                If you need Indonesian or another language, use the product name + language
                (supports English, Indonesian, and Japanese languages).
            </h5>

            <!-- Contoh Penggunaan -->
            <h5 style="font-size: 14px; color: #777; font-style: italic; margin-top: 5px; margin-bottom: 20px; line-height: 1.5;">
                Example: Indomie Goreng Indonesia (in Indonesian language)
            </h5>
                <span class="close" id="closeModal">&times;</span>
            </div>
            <div class="modal-body">
                <label for="ai_prompt_modal" class="form-label">Describe your product:</label>
                <input type="text" id="ai_prompt_modal" class="form-control"
                    placeholder="Enter product details (e.g., Banana Leaves)">
                <div class="text-center mt-3" id="aiLoading" style="display:none;">
                    <span>Generating in progress...</span>
                    <div class="spinner-border" role="status">
                        <div class="spinner-circle"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalFooter">Close</button>
                <button type="button" id="generateWithAI" class="btn btn-info">Generate</button>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* CSS untuk modal pop-up */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s;
            width: 40%;
            /* Jangan terlalu besar, sekitar 40% dari layar */
            max-width: 500px;
        }

        /* Header style */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        /* Close button */
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
        }

        /* Modal Footer */
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        /* Button Styling */
        .btn {
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Spinner style */
        .spinner-border {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: text-bottom;
            border: 0.25em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spin 0.75s linear infinite;
        }

        /* Spinner Animation */
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        /* Animation for modal */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive modal untuk perangkat kecil */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
            }
        }
    </style>
@endsection

@section('scripts_tinymce')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin">
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#tinymce',
            width: '100%',
            height: 300,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'emoticons', 'template', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menubar: 'file edit view insert format tools table help',
        });
    </script>
@endsection

@section('scripts')
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                Toastify({
                    text: "{{ $error }}",
                    duration: 3000,
                    gravity: 'top',
                    position: 'center',
                    backgroundColor: 'linear-gradient(to right, #ff4b1f, #ff9068)',
                    stopOnFocus: true,
                }).showToast();
            @endforeach
        </script>
    @endif

    <!-- Script untuk menangani request ke AI dan pop-up modal -->
    <script>
        // Fungsi untuk menutup modal dan mereset prompt
        function closeModal() {
            const modal = document.getElementById('aiModal');
            modal.style.display = 'none';
            document.getElementById('ai_prompt_modal').value = '';
        }

        // Tampilkan modal saat tombol "Ask AI" ditekan
        document.getElementById('ask_ai').addEventListener('click', function() {
            document.getElementById('aiModal').style.display = 'flex';
            document.getElementById('ai_prompt_modal').focus();
        });

        // Tutup modal saat tombol 'X' atau 'Close' ditekan
        document.getElementById('closeModal').addEventListener('click', closeModal);
        document.getElementById('closeModalFooter').addEventListener('click', closeModal);

        // Tutup modal saat klik di luar konten modal
        window.onclick = function(event) {
            const modal = document.getElementById('aiModal');
            if (event.target === modal) {
                closeModal();
            }
        };

        // Tutup modal dengan tombol 'Escape'
        window.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Proses request ke AI saat tombol "Generate" di modal ditekan
        document.getElementById('generateWithAI').addEventListener('click', function() {
            const prompt = document.getElementById('ai_prompt_modal').value.trim();
            const loadingIndicator = document.getElementById('aiLoading');

            if (prompt === '') {
                alert('Please enter product details for AI to generate description.');
                return;
            }

            // Tampilkan indikator loading
            loadingIndicator.style.display = 'block';

            // Tutup modal
            closeModal();

            // Kirim request ke API backend menggunakan fetch
            fetch('{{ route('ask-ai') }}', { // Gunakan helper route Laravel
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ prompt: prompt })
                })
                .then(response => response.json())
                .then(data => {
                    // Sembunyikan indikator loading
                    loadingIndicator.style.display = 'none';

                    console.log('AI Response:', data);

                    if (data.error) {
                        console.error('Error:', data.error);
                        alert('Failed to generate content: ' + data.error);
                        return;
                    }

                    // Isi data hasil dari AI ke form dengan efek ketikan
                    typeEffect(document.getElementById('name'), data.name, 30);
                    typeEffect(document.getElementById('description'), data.description, 30);
                    document.getElementById('slug').value = data.slug;
                    document.getElementById('alt_text').value = data.alt_text;
                    tinymce.get('tinymce').setContent(data.details_product);
                })
                .catch(error => {
                    console.error('Error in /ask-ai request:', error);
                    loadingIndicator.style.display = 'none';
                    alert('An error occurred while generating the content.');
                });
        });

        // Fungsi efek mengetik
        function typeEffect(element, text, speed = 30) {
            let index = 0;
            element.value = ''; // Kosongkan field sebelum mulai mengetik

            function type() {
                if (index < text.length) {
                    element.value += text.charAt(index);
                    index++;
                    setTimeout(type, speed);
                }
            }

            type();
        }
    </script>
@endsection
