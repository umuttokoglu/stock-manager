<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'firm_name' => ['required', 'string', 'max:255'],
            'tax_administration' => ['required', 'string', 'max:255'],
            'tax_no' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'address' => ['required', 'string', 'min:10', 'max:255'],
            'billing_address' => ['required', 'string', 'min:10', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Müşteri adı giriniz.',
            'name.string' => 'Müşteri adı sadece harfler ve sayılardan oluşabilir.',
            'name.max' => 'Müşteri adı en fazla :max karakter içerebilir.',
            'firm_name.required' => 'Firma adı giriniz.',
            'firm_name.string' => 'Firma adı sadece harfler ve sayılardan oluşabilir.',
            'firm_name.max' => 'Firma adı en fazla :max karakter içerebilir.',
            'tax_administration.required' => 'Vergi dairesi giriniz.',
            'tax_administration.string' => 'Vergi dairesi sadece harfler ve sayılardan oluşabilir.',
            'tax_administration.max' => 'Vergi dairesi en fazla :max karakter içerebilir.',
            'tax_no.required' => 'Vergi no giriniz.',
            'tax_no.string' => 'Vergi no sadece harfler ve sayılardan oluşabilir.',
            'tax_no.max' => 'Vergi no en fazla :max karakter içerebilir.',
            'phone.required' => 'Telefon belirtmelisiniz.',
            'phone.regex' => 'Telefon sadece sayı içerebilir.',
            'phone.min' => 'Telefon en az :min karakterden oluşabilir.',
            'phone.max' => 'Telefon en fazla 13 karakterden oluşabilir.',
            'address.required' => 'Adres belirtmelisiniz.',
            'address.string' => 'Adres sadece harfler ve sayılardan oluşabilir.',
            'address.min' => 'Adres en az :min karakter içerebilir.',
            'address.max' => 'Adres en fazla :max karakter içerebilir.',
            'billing_address.required' => 'Fatura adresi belirtmelisiniz.',
            'billing_address.string' => 'Fatura adresi sadece harfler ve sayılardan oluşabilir.',
            'billing_address.min' => 'Fatura adresi en az :min karakter içerebilir.',
            'billing_address.max' => 'Fatura adresi en fazla :max karakter içerebilir.',
        ];
    }
}
