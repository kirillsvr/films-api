<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmsFilterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'genres' => 'nullable',
            'actors' => 'nullable',
            'sort' => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'genres' => isset($this->genres) ? explode(",", $this->genres) : null,
            'actors' => isset($this->actors) ? explode(",", $this->actors) : null,
        ]);
    }
}
