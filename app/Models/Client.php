<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory;
    use Searchable;

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
}
