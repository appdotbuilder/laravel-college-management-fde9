<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Fund
 *
 * @property int $id
 * @property int $student_id
 * @property string $sponsor_type
 * @property string|null $sponsor_name
 * @property float $amount
 * @property \Illuminate\Support\Carbon $disbursement_date
 * @property string $status
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Student $student
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Fund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fund query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereDisbursementDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereSponsorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereSponsorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fund received()
 * @method static \Database\Factories\FundFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Fund extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'sponsor_type',
        'sponsor_name',
        'amount',
        'disbursement_date',
        'status',
        'remarks',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'disbursement_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the student that owns the fund.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Scope a query to only include received funds.
     */
    public function scopeReceived($query)
    {
        return $query->where('status', 'received');
    }
}