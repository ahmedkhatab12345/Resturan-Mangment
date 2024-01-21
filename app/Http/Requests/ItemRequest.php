<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'menu_id' => 'required|exists:menus,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يرجى إدخال اسم العنصر.',
            'name.string' => 'يجب أن يكون اسم العنصر نصًا.',
            'name.max' => 'يجب ألا يتجاوز اسم العنصر 255 حرفًا.',
            'description.string' => 'يجب أن يكون الوصف نصًا.',
            'price.required' => 'يرجى إدخال سعر العنصر.',
            'price.numeric' => 'يجب أن يكون السعر رقمًا.',
            'price.min' => 'يجب أن يكون السعر على الأقل 0.',
            'menu_id.required' => 'يرجى تحديد قائمة صالحة.',
            'menu_id.exists' => 'القائمة المحددة غير صالحة.',
            'image.image' => 'يجب أن يكون الملف المرفق صورة.',
            'image.mimes' => 'يجب أن يكون الملف بصيغة: jpeg، png، jpg، gif، أو svg.',
        ];
    }
}
