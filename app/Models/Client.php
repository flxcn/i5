<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number',
        'language', 'address_line_1', 'address_line_2', 'city',
        'state', 'postal_code', 'country', 'case_type_id', 'category_id',
        'referral_source_id', 'author_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */

    public function scopeFilter($query, array $filters) {

    }
    
    public function searchableAs()
    {
        return 'clients_index';
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function referral_source()
    {
        return $this->belongsTo(ReferralSource::class);
    }

    public function case_type()
    {
        return $this->belongsTo(CaseType::class);
    }
}
