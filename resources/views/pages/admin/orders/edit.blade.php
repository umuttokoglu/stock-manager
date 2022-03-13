@extends('layouts.admin')

@section('page-title')
    {{ 'Sipariş Düzenle' }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDERS) }}">Siparişler</a>
    </li>
    <li class="breadcrumb-item {{ (request()->segment(1) === 'orders') ? 'active' : '' }}">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDER_EDIT, ['order' => $order->id]) }}">Sipariş Düzenle</a>
    </li>
@endsection

@section('page-content')
    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ 'Sipariş Düzenle' }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route(\App\Constants\RouteNameConstants::ORDER_UPDATE, ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="status">Durum seçiniz</label>
                        <select class="form-control basic" id="status" name="status">
                            <option value="0" {{ (0 === $order->status) ? 'selected' : '' }}>Onay Bekliyor</option>
                            <option value="1" {{ (1 === $order->status) ? 'selected' : '' }}>Hazırlanıyor</option>
                            <option value="2" {{ (2 === $order->status) ? 'selected' : '' }}>Hazırlandı</option>
                            <option value="3" {{ (3 === $order->status) ? 'selected' : '' }}>Kargoya Verildi</option>
                            <option value="4" {{ (4 === $order->status) ? 'selected' : '' }}>İptal Edildi</option>
                        </select>

                        @error('status')
                        <div class="badge badge-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">Siparişi Düzenle</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection

@section('page-js')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
@endsection
