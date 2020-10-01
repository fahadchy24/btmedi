<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => 'required|unique:products|string',
            'short_description' => 'required',
            'full_description' => 'required',
            'video_url' => 'url',
            'docs' => 'mimes:pdf|max:50000',
            'unit_per_cost' => 'required|integer',
            'cost' => 'required|integer',
            'regular_price' => 'required|integer',
            'sale_price' => 'integer',
            'backorders' => 'required',
            'shipping_class' => 'required',
            'main_image' => 'required|mimes:jpg,jpeg,png',
        ];
    }
    
    public function message()
    {
        return [
            'name.unique' => 'Product Name has been used already.',
            'name.required' => 'Product Name is required.',
            'name.string' => 'Product Name must have a word.',

            'short_description.required' => 'Short Description is required.',
            'full_description.required' => 'Full Description is required.',
            'video_url.url' => 'Provide a Valid URL.',
            'docs.mimes' => 'Only PDF is allowed.',
            'docs.max' => 'PDF More than 5MB is not allowed.',
            'unit_per_cost.required' => 'Unit Per Cost is required.',
            'unit_per_cost.integer' => 'Unit Per Cost must have number.',
            'cost.required' => 'Cost is required.',
            'cost.integer' => 'Cost must have numbers.',
            'regular_price.required' => 'Regular Price is required.',
            'regular_price.integer' => 'Regular Price must have numbers.',
            'sale_price.integer' => 'Sale Price must have numbers.',
            'backorders.required' => 'Backorders is required.',
            'shipping_class.required' => 'Shipping Class is required.',
            'main_image.required' => 'Product Image is required.',
            'main_image.mimes' => 'Only JPG/JPEG/PNG is allowed.',
        ];
    }
}
