<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'description'];
    protected $table = "news";

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
    ];

    public static function getTranslate(string $lang)
    {
        $news = News::withTranslation($lang)->get();

        foreach($news as $new)
        {
            foreach($new->translations as $translation)
            {
                $new[$translation->column_name] = $translation->value;
            }

            unset($new->translations);
        }

        return $news;
    }
}
