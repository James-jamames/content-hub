<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Article extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'description'];
    protected $table = "articles";

    protected $fillable = [
        'title',
        'description',
        'authors',
        'image',
        'url',
    ];

    public static function getTranslate(string $lang)
    {
        $articles = Article::withTranslation($lang)->get();

        foreach($articles as $article)
        {
            foreach($article->translations as $translation)
            {
                $article[$translation->column_name] = $translation->value;
            }

            unset($article->translations);
        }

        return $articles;
    }
}
