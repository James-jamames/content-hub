<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Highlight extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'description'];
    protected $table = "highlights";

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
    ];

    public static function getTranslate(string $lang)
    {
        $highlights = Highlight::withTranslation($lang)->get();

        foreach($highlights as $highlight)
        {
            foreach($highlight->translations as $translation)
            {
                $highlight[$translation->column_name] = $translation->value;
            }

            unset($highlight->translations);
        }

        return $highlights;
    }
}
