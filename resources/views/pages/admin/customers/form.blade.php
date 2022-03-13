@extends('layouts.admin')

@section('page-title')
    {{ 'Yeni Müşteri Ekle' }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route(\App\Constants\RouteNameConstants::CUSTOMERS) }}">Müşteriler</a>
    </li>
    <li class="breadcrumb-item {{ (request()->segment(1) === 'customers') ? 'active' : '' }}">
        <a href="{{ route(\App\Constants\RouteNameConstants::CUSTOMER_FORM) }}">Müşteri Ekle</a>
    </li>
@endsection

@section('page-content')
    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Yeni Müşteri Ekle</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route(\App\Constants\RouteNameConstants::CUSTOMER_STORE) }}" method="POST">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="name">Müşteri adı</label>
                            <input type="text" class="form-control" id="name" placeholder="Ör: Ahmet Mehmet" name="name"
                                   value="{{ old('name') }}">

                            @error('name')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firm_name">Firma adı</label>
                            <input id="firm_name" class="form-control" type="text" placeholder="Ör: Acme Limited A.Ş."
                                   value="{{ old('firm_name') }}" name="firm_name">
                            @error('firm_name')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="tax_administration">Vergi dairesi</label>
                            <input id="tax_administration" class="form-control" placeholder="Vergi dairesi giriniz..."
                                   type="text" value="{{ old('tax_administration') }}" name="tax_administration">
                            @error('tax_administration')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tax_no">Vergi no</label>
                            <input id="tax_no" class="form-control" type="text" placeholder="Vergi no giriniz..."
                                   value="{{ old('tax_no') }}" name="tax_no">

                            @error('tax_no')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="phone">Telefon</label>
                        <input type="text" class="form-control" id="phone" placeholder="Telefon giriniz..." name="phone"
                               value="{{ old('phone') }}">

                        @error('phone')
                        <div class="badge badge-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="address">Teslimat adresi</label>
                            <textarea id="address" class="form-control"
                                      type="text" name="address">
                                {{ old('address') }}
                                </textarea>
                            @error('address')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="billing_address">Fatura adresi</label>
                            <textarea id="billing_address" class="form-control"
                                      type="text" name="billing_address">
                                {{ old('billing_address') }}
                                </textarea>
                            @error('billing_address')
                            <div class="badge badge-danger mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">Müşteriyi Kaydet</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-css')

@endsection

@section('page-js')
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $("#phone").inputmask({mask: "(999) 999-9999"});
    </script>
@endsection
