<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VMOrder extends Model
{
    protected $table = 'vm_orders';
    use HasFactory;

    protected $fillable = [
        'user_id', 'os', 'cpu', 'ram', 'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}



