@extends('layouts.admin')

@section('page-title')
    {{ $product->name . ' Güncelle' }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route(\App\Constants\RouteNameConstants::PRODUCTS) }}">Ürünler</a>
    </li>
    <li class="breadcrumb-item {{ (request()->segment(1) === 'products') ? 'active' : '' }}">
        <a href="{{ route(\App\Constants\RouteNameConstants::PRODUCTS_EDIT, ['product' => $product->id]) }}">Ürün Güncelle</a>
    </li>
@endsection

@section('page-content')
    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ $product->name }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route(\App\Constants\RouteNameConstants::PRODUCTS_UPDATE, ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <div class="custom-file-container" data-upload-id="product_image">
                                <label>Ürün görseli <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Görseli değiştir">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name="product_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="5120" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                                @error('product_image')
                                <div class="badge badge-danger mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kayıtlı ürün görseli</label>
                            <br>
                            <img src="{{ asset('product_images/' . $product->image) }}" width="300" alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="product_name">Ürün adı</label>
                            <input type="text" class="form-control" id="product_name" placeholder="Ör: Zip perde..." name="product_name" value="{{ $product->name }}">

                            @error('product_name')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_amount">Stok adedi</label>
                            <input id="product_amount" class="form-control" type="text" value="{{ $product->amount }}" name="product_amount">
                            @error('product_amount')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="product_height">Yükseklik (cm)</label>
                            <input id="product_height" class="form-control" type="text" value="{{ $product->height }}" name="product_height">

                            @error('product_height')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_width">Uzunluk (cm)</label>
                            <input id="product_width" class="form-control" type="text" value="{{ $product->width }}" name="product_width">

                            @error('product_width')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_color">Renk</label>
                        <input type="text" class="form-control" id="product_color" placeholder="Renk belirtiniz..." name="product_color" value="{{ $product->color }}">

                        @error('product_color')
                        <div class="badge badge-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">Ürünü Kaydet</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('page-css')
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}">
@endsection
@section('page-js')
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        //First upload
        const firstUpload = new FileUploadWithPreview('product_image');
    </script>
@endsection
