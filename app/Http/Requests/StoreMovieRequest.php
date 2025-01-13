<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:movies,title',
            'description' => 'required|string|min:10',
            'movie_image' => 'required|file|mimes:png,jpg,jpeg',
            'release' => 'required|date',
            'rating' => 'required|numeric',
            'movie_type_id' => 'required|exists:movie_types,id',
            'director_id' => 'required|exists:directors,id',
            'production_id' => 'required|exists:productions,id',
            'trailer_link' => 'required|string',
            'actors' => 'required',
            'actors.*' => 'required|exists:actors,id',
            'genres' => 'required',
            'genres.*' => 'required|exists:genres,id',
        ];
    }
}
