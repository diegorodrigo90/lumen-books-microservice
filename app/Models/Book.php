<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Book extends Model
{
    use UsesUuid, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price', 'author_id'
    ];

    protected $guarded = ['uuid'];

    public function book($id)
    {
        return $this->with($this->with)->findOrFail($id);
    }
}
