<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    
    protected $fillable = ['title', 'body','price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static function adCount()
    {
        $num = Ad::where('is_accepted',null)->count();
        return $num;
    }

    use HasFactory;
}
