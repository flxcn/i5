<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_type_id', 'contact_date', 'contact_summary'
    ];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'contact_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class);
    }
}
