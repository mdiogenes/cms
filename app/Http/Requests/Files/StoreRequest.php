<?php

namespace App\Http\Requests\Files;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title'   => 'required',
            'public'  => 'required|boolean',
            'user_id' => 'required|exists:users,id',
            'file'    => 'required|file|mimes:jpeg,bmp,png,gif,doc,docx,docx,pdf,csv,xml,txt,xlsx,xls,pptx,ppt',
        ];
    }
}
