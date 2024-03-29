<?php

namespace App\Http\Resources\Users;

use App\Models\Rehearsal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RehearsalResource
 * @package App\Http\Resources\Users
 * @mixin Rehearsal
 */
class RehearsalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'band_id' => new BandResource($this->band),
            'user' => new UserResource($this->user),
            'starts_at' => $this->starts_at->toDateTimeString(),
            'ends_at' => $this->ends_at->toDateTimeString(),
        ];
    }
}
