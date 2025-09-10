<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\FeeType
 *
 * @property int $id
 * @property string $name
 * @property string $category
 * @property string $frequency
 * @property float $amount_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Invoice> $invoices
 * @property-read int|null $invoices_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereAmountDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereUpdatedAt($value)
 * @method static \Database\Factories\FeeTypeFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class FeeType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'category',
        'frequency',
        'amount_default',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount_default' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the invoices for the fee type.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}