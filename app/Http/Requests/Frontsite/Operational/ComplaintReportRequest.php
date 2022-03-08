<?php

namespace App\Http\Requests\Frontsite\Operational;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintReportRequest extends FormRequest
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
            'title' => [
                'required', 'string', 'max:255',
            ],
            'content' => [
                'required', 'string', 'max:20000',
            ],
            'incident_date' => [
                'required', 'date_format:d/m/Y',
            ],
            'province_id' => [
                'required', 'integer', 'exists:provinces,id',
            ],
            'regency_id' => [
                'required', 'integer', 'exists:regencies,id',
            ],
            'district_id' => [
                'required', 'integer', 'exists:districts,id',
            ],
            'category_complaint_id' => [
                'required', 'integer', 'exists:category_complaint,id',
            ],
            'files' => [
                'sometimes', 'required', 'array',
            ],
            'files.*' => [
                'sometimes', 'required', 'mimes:jpg,jpeg,png,webp,gif,svg,doc,docx,ppt,pptx,pdf,txt,xls,xlsx,flv,wmv,mp3,ogg,wav,avi,mov,mp4,mpeg,webm,mkv,rar,zip', 'max:2048',
            ],
        ];
    }
}
