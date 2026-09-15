<?php

namespace App\Http\Requests\Twill;

use A17\Twill\Http\Requests\Admin\Request;

class MenuRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'title'        => 'required|string|max:255',
            'key'          => 'nullable|string|max:200',
            'menu_type_id' => 'nullable|exists:menu_types,id',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title'        => 'required|string|max:255',
            'key'          => 'required|string|max:200',
            'menu_type_id' => 'required|exists:menu_types,id',
        ];
    }
}
