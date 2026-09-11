<?php

namespace App\Http\Requests\Twill;

use A17\Twill\Http\Requests\Admin\Request;

class PageRequest extends Request
{
    public function rulesForCreate(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:200',
            ],

            'header_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'key' => [
                'nullable',
                'string',
                'max:200',
            ],

            'position' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'url' => [
                'nullable',
                'string',
            ],

            'link_text' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function rulesForUpdate(): array
    {
        return $this->rulesForCreate();
    }
}
