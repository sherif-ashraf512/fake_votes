@extends('layouts/layoutMaster')

@section('title', 'Product edit')

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
<div class="app-ecommerce">

  <!-- Add Product -->
  <form class="product-form" action="{{route('product-update',$product->id)}}" method="POST" enctype="multipart/form-data">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1">Edit a Product</h4>
      <p class="mb-0">Orders placed across your store</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
      <button type="submit" class="btn btn-primary">Save product</button>
    </div>

  </div>
    @csrf
    @method('put')
  <div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <!-- First column-->
    <div class="col-12 col-lg-8">
      <!-- Product Information -->
      <div class="card mb-6">
        <div class="card-header">
          <h5 class="card-tile mb-0">Product information</h5>
        </div>
        <div class="card-body">
          <div class="mb-6">
            <label class="form-label" for="ecommerce-product-name">Name</label>
            <input type="text" class="form-control" id="ecommerce-product-name" value="{{old('title',$product->title)}}" placeholder="Product title" name="title" aria-label="Product title">
          </div>
          <!-- Description -->
          <div>
            <label class="mb-1">Description (Optional)</label>
            <div class="form-control p-0">
              <div class="comment-toolbar border-0 border-bottom">
                <div class="d-flex justify-content-start">
                  <span class="ql-formats me-0">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-link"></button>
                  </span>
                </div>
              </div>
              <div class="comment-editor border-0 pb-6" id="ecommerce-category-description">
                {!! old('description',$product->description) !!}
              </div>
              <input type="hidden" name="description" id="description-input" value="{!! old('description',$product->description) !!}">
            </div>
          </div>
        </div>
      </div>
      <!-- /Product Information -->
      <!-- Media -->
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 card-title">Product Image</h5>
        </div>
        <img class="w-50 h-50" src="{{asset("assets/$product->image")}}" alt="">
        <div action="" class="card-body">
          <label for="image" class="dropzone dz-clickable">
            <div class="dz-message needsclick">
              <label class="note needsclick btn btn-sm btn-label-primary" for="image" id="btnBrowse">Browse image</label>
            </div>
            <div class="fallback">
              <input style="visibility: hidden" id="image" name="image" type="file" />
            </div>
          </label>
        </div>
      </div>
      <!-- /Media -->
    </div>
    <!-- /Second column -->

    <!-- Second column -->
    <div class="col-12 col-lg-4">
      <!-- Pricing Card -->
      <div class="card mb-6">
        <div class="card-header">
          <h5 class="card-title mb-0">Pricing</h5>
        </div>
        <div class="card-body">
          <!-- Base Price -->
          <div class="mb-6">
            <label class="form-label" for="ecommerce-product-price">Base Price</label>
            <input type="number" class="form-control" id="ecommerce-product-price" placeholder="Price" value="{{old('price',$product->price)}}" name="price" aria-label="Product price">
          </div>

        </div>
      </div>
      <!-- /Pricing Card -->
    </div>
    <!-- /Second column -->
  </div>
</form>
</div>

<script>
  document.querySelector('.product-form').addEventListener('submit', function (e) {
    // Get the HTML content from the .ql-editor div
    var editorContent = document.querySelector('#ecommerce-category-description .ql-editor').innerHTML;

    // Set the content to the hidden input
    document.getElementById('description-input').value = editorContent;

    // Optional: Log to verify
    console.log('Description HTML:', editorContent);
});
</script>

@endsection
