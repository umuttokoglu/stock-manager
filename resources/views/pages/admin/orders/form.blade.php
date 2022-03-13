@extends('layouts.admin')

@section('page-title')
    {{ 'Yeni Sipariş Ekle' }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDERS) }}">Siparişler</a>
    </li>
    <li class="breadcrumb-item {{ (request()->segment(1) === 'orders') ? 'active' : '' }}">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDER_FORM) }}">Sipariş Ekle</a>
    </li>
@endsection

@section('page-content')
    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Yeni Sipariş Ekle</h4>
                    </div>
                </div>
                <span class="text-danger p-4">{{ session('message') }}</span>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route(\App\Constants\RouteNameConstants::ORDER_STORE) }}" method="POST">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="product_id">Ürün seçiniz</label>
                            <select class="form-control basic" id="product_id" name="product_id">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="customer_id">Müşteri seçiniz</label>
                            <select class="form-control basic" id="customer_id" name="customer_id">
                                @foreach($customers as $customer)
                                    <option
                                        value="{{ $customer->id }}">{{ $customer->name . ' - ' . $customer->firm_name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="amount">Satılacak adet</label>
                            <input id="amount" class="form-control" type="text" value="{{ old('amount') }}"
                                   name="amount">
                            @error('amount')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="motor_brand">Motor tipi seçiniz</label>
                            <select class="form-control basic" id="motor_brand" name="motor_brand">
                                <option value="1">Motor 1</option>
                                <option value="2">Motor 2</option>
                            </select>
                            @error('motor_brand')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="color">Renk</label>
                        <input type="text" class="form-control" id="color" placeholder="Renk belirtiniz..." name="color"
                               value="{{ old('color') }}">

                        @error('color')
                        <div class="badge badge-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">Siparişi Kaydet</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection

@section('page-js')
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
@endsection
