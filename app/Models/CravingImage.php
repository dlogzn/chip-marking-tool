<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CravingImage extends Model
{
    use HasFactory;

    protected $table = 'craving_images';
    protected $guarded = [];

    public function packageType(): BelongsTo
    {
        return $this->belongsTo(PackageType::class);
    }
}
