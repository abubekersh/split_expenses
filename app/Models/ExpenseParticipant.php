<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseParticipant extends Model
{
    protected $fillable = ['expense_id', 'user_id'];
    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
