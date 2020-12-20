<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Food extends Resource
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
            'vrsta' => $this->vrsta,
            'naziv' => $this->naziv,
            'cijena' => $this->cijena,
            'sastav' => $this->sastav
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
        ];
    }
}
