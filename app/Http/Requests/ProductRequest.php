<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'name' => 'required|max:50|min:10',
        'discount'=>'max:100|min:0|numeric',
            'name' => 'required',
            'description' => 'required',
//            'type' => 'required',
//            'brand'=>'required',
            'thumbnail'=>'required',
            'price'=>'numeric',
        ];
    }
    public function messages()
    {
        return [
//            'Car_name.required' => 'Vui lòng nhập tên xe.',
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'description.required' => 'Vui lòng nhập vào phần mô tả.',
            'discount.min' => 'Giảm giá phải lơn hơn hoặc bằng 0.',
            'discount.max' => 'Giảm giá nhỏ hơn 100.',
            'discount.numeric' => 'Phải là số',
//            'Car_name.min' => 'Tên phải lớn hơn 10 ký tự.',
//            'Car_name.max' => 'Tên phải nhỏ hơn 50 ký tự.',
//            'brand.required' => 'Vui lòng nhập hãng xe.',
//            'type.required' => 'Vui lòng nhập loại xe.',
            'thumbnail.required'=>'Không được trống',
            'price.numeric'=>'Phải là số',
        ];
    }
    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            if($this->get('price')<0){
                $validator->errors()->add('price', ' phải lớn hơn 0.');
            }

        });

    }
}
