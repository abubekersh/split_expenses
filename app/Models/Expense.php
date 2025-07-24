<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = "expenses";
    protected $foreignKey = "user_id";
    protected $fillable = ['title', 'group_id', 'amount', 'payed_by'];

    public function participant()
    {
        return $this->hasMany(ExpenseParticipant::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
