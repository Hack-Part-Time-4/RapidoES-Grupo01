<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function toSearchableArray()
    {
        return [
            'title'=>$this->title,
            'body'=>$this->body,
        ];
    }

    use HasFactory, Searchable;
}
