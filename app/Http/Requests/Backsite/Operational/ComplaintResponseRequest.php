<?php

namespace App\Http\Requests\Backsite\Operational;

use Gate;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class ComplaintResponseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('complaint_response_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'response'   => [
                'required', 'string', 'max:20000',
            ],
            'status'     => [
                'required', 'integer', 'in:2,3',
            ],
        ];
    }
}
