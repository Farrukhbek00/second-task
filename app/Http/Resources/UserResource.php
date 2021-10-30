<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => date(Controller::DATETIME_FORMAT, strtotime($this->created_at)),
            'updated_at' => date(Controller::DATETIME_FORMAT, strtotime($this->updated_at)),
            'companies' => CompanyResource::collection($this->whenLoaded('companies'))
        ];
    }
}
