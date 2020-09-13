<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function search($key, $filter = null)
    {
        $results = $this->where($filter ?? 'name', 'LIKE', "%{$key}%")
                        ->orWhere($filter ?? 'description', 'LIKE', "%{$key}%")
                        ->latest()->paginate(6);
        return $results;
    }

}
