<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id'  => ['required', 'int', 'min:1'],
            'subject_id' => ['required', 'int', 'min:1'],
            'date' => ['required', 'min:7'],
        ];
    }
}
