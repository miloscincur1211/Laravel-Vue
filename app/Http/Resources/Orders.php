<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Orders extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'json' => $this->json,
            'racun' => $this->racun,
            'dodatna_naznaka' => $this->dodatna_naznaka
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
        ];
    }
}
