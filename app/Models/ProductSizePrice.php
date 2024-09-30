<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizePrice extends BaseModel
{
    use HasFactory;

    // Define the relationship with the Size model
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
