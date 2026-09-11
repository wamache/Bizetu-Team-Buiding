<?php

namespace App\Http\Requests\Twill;

use A17\Twill\Http\Requests\Admin\Request;

class MenuRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'key'          => 'required|string|max:200',
            'menu_type_id' => 'required|exists:menu_types,id',
            'position'     => 'nullable|integer|min:1',
        ];
    }

    public function rulesForUpdate()
    {
        return $this->rulesForCreate();
    }
}
