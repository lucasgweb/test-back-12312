<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'coust' => $this->coust,
            'date' => $this->date,
            'description' => $this->description,
            'odometer' => $this->odometer,
            'status' => $this->status,
            'vehicle' => new VehicleResource($this->vehicle)
        ];
    }
}
