<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'product_amount' => ['required', 'integer', 'min:1', 'max:100'],
            'product_height' => ['required', 'integer', 'min:1', 'max:100000'],
            'product_width' => ['required', 'integer', 'min:1', 'max:100000'],
            'product_color' => ['required', 'string', 'max:255'],
            'product_image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => 'Ürün adı giriniz.',
            'product_name.string' => 'Ürün adı sadece harfler ve sayılardan oluşabilir.',
            'product_name.max' => 'Ürün adı en fazla :max karakter içerebilir.',
            'product_amount.required' => 'Stok adedini belirtmelisiniz.',
            'product_amount.integer' => 'Stok adedi sadece sayı içerebilir.',
            'product_amount.min' => 'Stok adedi en az :min olabilir.',
            'product_amount.max' => 'Stok adedi en fazla :max olabilir.',
            'product_height.required' => 'Ürün yüksekliğini belirtmelisiniz.',
            'product_height.integer' => 'Ürün yüksekliği sadece sayı içerebilir.',
            'product_height.min' => 'Ürün yüksekliği en az :min olabilir.',
            'product_height.max' => 'Ürün yüksekliği en fazla :max olabilir.',
            'product_width.required' => 'Ürün uzunluğunu belirtmelisiniz.',
            'product_width.integer' => 'Ürün uzunluğu sadece sayı içerebilir.',
            'product_width.min' => 'Ürün uzunluğu en az :min olabilir.',
            'product_width.max' => 'Ürün uzunluğu en fazla :max olabilir.',
            'product_color.required' => 'Ürünün hangi renkte olduğunu belirtiniz.',
            'product_color.string' => 'Ürün rengi sadece harfler ve sayılardan oluşabilir.',
            'product_color.max' => 'Ürün rengi en fazla :max karakter içerebilir.',
            'product_image.required' => 'Ürün görseli eklemeniz zorunludur.',
            'product_image.image' => 'Ürün görseli sadece resim dosyası olabilir (jpeg, jpg, png).',
            'product_image.mimes' => 'Ürün görseli sadece resim dosyası olabilir (jpeg, jpg, png).',
            'product_image.max' => 'Ürün görseli en fazla 5 MB olabilir.',
        ];
    }
}
