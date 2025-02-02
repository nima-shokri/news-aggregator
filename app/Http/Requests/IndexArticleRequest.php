<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexArticleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "category_name" => ["string", "nullable"],
            "source_name" => ["string", "nullable"],
            "q" => ["string", "nullable"],
            "publisher" => ["string", "nullable"],
            "from_date" => ["nullable", Rule::date()->format('Y-m-d'),],
            "to_date" => ["nullable", Rule::date()->format('Y-m-d'), "after_or_equal:from_date"],
            "author" => ["string", "nullable"],
        ];
    }
}
