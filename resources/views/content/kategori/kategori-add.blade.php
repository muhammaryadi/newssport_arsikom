@extends('layouts/layoutMaster')

@section('title', 'Tambah Kategori')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/quill/typography.scss',
  'resources/assets/vendor/libs/quill/katex.scss',
  'resources/assets/vendor/libs/quill/editor.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/dropzone/dropzone.scss',
  'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
  'resources/assets/vendor/libs/tagify/tagify.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/quill/katex.js',
  'resources/assets/vendor/libs/quill/quill.js',
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/dropzone/dropzone.js',
  'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js',
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/tagify/tagify.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/app-ecommerce-product-add.js'
])
@endsection

@section('content')
<h4 class="py-3 mb-0">
  <span class="text-muted fw-light">Kategori /</span><span class="fw-medium"> {{ $mode == 'add' ? 'Tambah' : 'Edit' }} Kategori</span>
</h4>

<div class="app-ecommerce">
  <form action="{{ $mode == 'add' ? route('kategori.store') : route('kategori.update', ['kategori' => $kategori->id]) }}" method="POST" id="add-kategori" enctype="multipart/form-data">
  @csrf
  @if($mode == 'edit')
    @method('PUT')
  @endif
  <!-- Add Product -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">{{ $mode == 'add' ? 'Tambah' : 'Edit' }} Kategori</h4>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
      <button type="submit" class="btn btn-primary">Simpan Kategori</button>
    </div>

  </div>

  <div class="row">

    <!-- First column-->
    <div class="col-12 col-lg-8">
      <!-- Product Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Informasi Kategori</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="ecommerce-product-name">Nama</label>
            <input type="text" value="{{ $mode == 'edit' ? $kategori->nama : '' }}" class="form-control" id="ecommerce-product-name" placeholder="Nama Kategori" name="nama_kategori" aria-label="Nama Kategori">
          </div>
        </div>
      </div>
      <!-- /Product Information -->
    </div>
    <!-- /Second column -->
</form>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $("#add-kategori").on("submit", function () {
      var hvalue = $('.ql-editor').html();
      $(this).append("<textarea name='content' style='display:none'>"+hvalue+"</textarea>");
    });

    @if($mode == 'edit')
    var quill = new Quill('#ecommerce-category-description', {
      theme: 'snow'
    });
    quill.root.innerHTML = "{!! $kategori->deskripsi !!}";
    @endif
  });

</script>
@endsection
