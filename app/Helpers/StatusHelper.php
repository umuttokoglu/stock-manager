<?php

namespace App\Helpers;

class StatusHelper
{
    public static function getSpan(int $status): string
    {
        return match ($status) {
            1 => '<span class="badge badge-warning">Hazırlanıyor</span>',
            2 => '<span class="badge badge-success">Hazırlandı</span>',
            3 => '<span class="badge badge-secondary">Kargoya Verildi</span>',
            4 => '<span class="badge badge-danger">İptal Edildi</span>',
            default => '<span class="badge badge-dark">Onay Bekliyor</span>',
        };
    }

    public static function getText(int $status): string
    {
        return match ($status) {
            1 => 'Hazırlanıyor',
            2 => 'Hazırlandı',
            3 => 'Kargoya Verildi',
            4 => 'İptal Edildi',
            default => 'Onay Bekliyor',
        };
    }
}
