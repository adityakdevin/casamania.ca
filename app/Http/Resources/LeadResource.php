<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'user_id' => $this->user_id,
      'name' => $this->name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'contact' => $this->contact,
      'remark' => $this->remark,
      'is_closed' => $this->is_closed,
      'Ml_num' => $this->Ml_num,
      'tags' => $this->tags,
      'source' => $this->source,
      'stage' => $this->stage,
      'created_at' => $this->created_at,
    ];
  }
}
