<?php

namespace App\Models;

use App\Classes\CodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'url',
        'user_id',
    ];

    public static function create(string $long_url): Url
    {
        $user_id = auth()->user()->id;
        $url = new Url([
            'url' => $long_url,
            'user_id' => $user_id,
        ]);
        $url->code = (new CodeGenerator)->get_code($user_id);
        $url->save();
        return $url;
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
