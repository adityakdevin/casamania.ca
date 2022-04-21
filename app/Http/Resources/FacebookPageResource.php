<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class FacebookPageResource extends JsonResource
{

  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'fb_user_id' => $this->fb_user_id,
      'page_id' => $this->page_id,
      'name' => $this->name,
      'category' => $this->category,
      'is_subscribed' => $this->is_subscribed,
    ];
  }
}
