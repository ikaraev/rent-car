<?php

namespace Karaev\Common\Infrastructure\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SendContactResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'success' => true,
            'message' => 'Your message was sent successfully!'
        ];
    }
}
