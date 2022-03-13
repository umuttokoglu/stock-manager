@extends('layouts.admin')

@section('breadcrumb')
    <ul class="navbar-nav flex-row">
        <li>
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route(\App\Constants\RouteNameConstants::DASHBOARD) }}">Yönetim Paneli</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </li>
    </ul>
@endsection

@section('page-content')

@endsection
