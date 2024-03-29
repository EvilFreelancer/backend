<?php

namespace App\Models;

use App\Filters\FilterRequest;
use App\Filters\Filterable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Rehearsal
 *
 * @property int $id
 * @property int $organization_id
 * @property int $user_id
 * @property Carbon $starts_at
 * @property Carbon $ends_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Organization $organization
 * @property-read User $user
 * @method static Builder|Rehearsal newModelQuery()
 * @method static Builder|Rehearsal newQuery()
 * @method static Builder|Rehearsal query()
 * @method static Builder|Rehearsal whereCreatedAt($value)
 * @method static Builder|Rehearsal whereEndsAt($value)
 * @method static Builder|Rehearsal whereId($value)
 * @method static Builder|Rehearsal whereOrganizationId($value)
 * @method static Builder|Rehearsal whereStartsAt($value)
 * @method static Builder|Rehearsal whereUpdatedAt($value)
 * @method static Builder|Rehearsal whereUserId($value)
 * @mixin Eloquent
 * @method static Builder|Rehearsal filter(FilterRequest $filters)
 * @property bool $is_confirmed
 * @method static Builder|Rehearsal whereIsConfirmed($value)
 * @property int|null $band_id
 * @property-read Band|null $band
 * @method static Builder|Rehearsal whereBandId($value)
 */
class Rehearsal extends Model
{
    use Filterable;

    protected $guarded = ['id'];

    protected $dates = [
        'starts_at',
        'ends_at',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'is_confirmed' => 'boolean'
    ];

    /**
     * @return BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function band(): BelongsTo
    {
        return $this->belongsTo(Band::class);
    }
}
