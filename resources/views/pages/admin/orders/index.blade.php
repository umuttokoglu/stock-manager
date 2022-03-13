@extends('layouts.admin')

@section('page-title')
    {{ 'Siparişler' }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item {{ (request()->segment(1) === 'orders') ? 'active' : '' }}">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDERS) }}">Siparişler</a>
    </li>
@endsection

@section('page-content')
    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDER_FORM) }}"
           class="btn btn-block btn-primary mb-4">Yeni Sipariş Ekle</a>

        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Siparişler</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        @if($orders->count())
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Ürün adı</th>
                                    <th>Müşteri adı</th>
                                    <th>Renk</th>
                                    <th>Motor tipi</th>
                                    <th>Boyutlar</th>
                                    <th>Durum</th>
                                    <th>Kayıt tarihi</th>
                                    <th class="no-content">Aksiyonlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->color }}</td>
                                        <td>{{ $order->motor_brand }}</td>
                                        <td>{{ $order->product->width . 'x' . $order->product->height }}</td>
                                        <td>{!! \App\Helpers\StatusHelper::getSpan($order->status) !!} </td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route(\App\Constants\RouteNameConstants::ORDER_EDIT, ['order' => $order->id]) }}" class="text-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2 p-1 br-6 mb-1">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route(\App\Constants\RouteNameConstants::ORDER_DESTROY, ['order' => $order->id]) }}" class="text-danger" onclick="return false;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash p-1 br-6 mb-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Ürün adı</th>
                                    <th>Müşteri adı</th>
                                    <th>Renk</th>
                                    <th>Motor tipi</th>
                                    <th>Boyutlar</th>
                                    <th>Durum</th>
                                    <th>Kayıt tarihi</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <p class="text-danger"> Listelenecek sipariş bulunamadı. </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
@endsection

@section('page-js')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "_PAGES_ sayfadan _PAGE_. gösteriliyor",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Ara...",
                "sLengthMenu": "Gösterilen sonuç sayısı :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [10, 20, 50],
            "pageLength": 10
        });
    </script>
@endsection
