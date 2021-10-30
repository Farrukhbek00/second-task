<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use App\Models\UserCompany;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'created_at' => date(Controller::DATETIME_FORMAT, strtotime($this->created_at)),
            'updated_at' => date(Controller::DATETIME_FORMAT, strtotime($this->updated_at)),
            'pivot' => new UserCompanyResource($this->pivot)
        ];
    }
}
