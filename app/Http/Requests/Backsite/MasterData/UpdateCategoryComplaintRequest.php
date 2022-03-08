<?php

namespace App\Http\Requests\Backsite\MasterData;

use Gate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Symfony\Component\HttpFoundation\Response;

class UpdateCategoryComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('category_complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name'   => [
                'required', 'string', 'max:255', Rule::unique('category_complaint')->ignore($this->category_complaint),
            ],
        ];
    }
}
