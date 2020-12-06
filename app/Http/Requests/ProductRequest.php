<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'string|max:255',
            'description' => 'string|max:255',
            'img_url' => 'required',
            'price' => 'required|numeric|gt:0|numeric',
            'owner_id' => 'required',
            'quantity' => 'required|numeric'
        ];
    }

    public function uploadImage(Product $product){
        $uploadedFile = $this->img_url;
        $this->product = $product;
        
        // get file name
        $this->fileName =  $this->product->name;

        // upload file
        $uploadedFile->storePubliclyAs(
            'public/products',
            $this->fileName
        );

        return $this;
    }

    public function storeImageUrlName()
    {
        $this->product->img_url = asset(Storage::url('products/'.$this->product->name));
        $this->product->save();
    }
}
