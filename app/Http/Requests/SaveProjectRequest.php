<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return Gate::authorize('create', new \App\Models\Project)//If returns true, the user can proceed with this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => 'required',
            'url' => [
                'required',
                Rule::unique('projects')->ignore( $this->route('project') )
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'image' => $this->route('project') ? 'nullable' : 'required|image',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This project needs a name',
            'description.required' => 'Enter a proper description for this project',
            'category_id.required' => 'Please enter a category for this project',
            'url.required' => 'Enter a friendly unique url for this project',
        ];
    }
}
