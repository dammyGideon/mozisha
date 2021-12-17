<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
      'mentee_id', 'mentor_id', 'connect_id', 'apprenticeship_id',
      'invoice_no', 'card_number', 'amount', 'status'
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee()
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

    public function apprenticeship()
    {
        return $this->belongsTo(Apprenticeship::class, 'apprenticeship_id');
    }

    public function connect()
    {
        return $this->belongsTo(Connect::class, 'connect_id_id');
    }
}
