<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer'],
            'customer_id' => ['required', 'integer'],
            'amount' => ['required', 'integer', 'min:1', 'max:100'],
            'motor_brand' => ['required', 'integer'],
            'color' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Ürün seçmelisiniz.',
            'product_id.integer' => 'Ürün tipini değiştirmeyiniz.',
            'customer_id.required' => 'Müşteri seçmelisiniz.',
            'customer_id.integer' => 'Müşteri tipini değiştirmeyiniz.',
            'amount.required' => 'Satılacak adedi seçmelisiniz.',
            'amount.integer' => 'Satılacak adet tipini değiştirmeyiniz.',
            'amount.min' => 'Satılacak adet en az :min olabilir.',
            'amount.max' => 'Satılacak adet en fazla :max olabilir.',
            'motor_brand.required' => 'Motor tipi seçmelisiniz.',
            'motor_brand.integer' => 'Motor tipi tipini değiştirmeyiniz.',
            'color.required' => 'Renk belirtiniz.',
            'color.integer' => 'Renk sadece sayı ve harflerden oluşabilir.',
        ];
    }
}
