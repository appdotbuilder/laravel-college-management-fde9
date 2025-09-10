<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PaymentItem
 *
 * @property int $id
 * @property int $payment_id
 * @property int $invoice_id
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Payment $payment
 * @property-read \App\Models\Invoice $invoice
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentItem whereUpdatedAt($value)
 * @method static \Database\Factories\PaymentItemFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class PaymentItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'payment_id',
        'invoice_id',
        'amount',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the payment that owns the payment item.
     */
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Get the invoice that owns the payment item.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}