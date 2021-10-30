<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCompanyResource extends JsonResource
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
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'created_at' => date(Controller::DATETIME_FORMAT, strtotime($this->created_at)),
            'updated_at' => date(Controller::DATETIME_FORMAT, strtotime($this->updated_at))
        ];
    }
}
