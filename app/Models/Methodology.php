<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Methodology extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'description'];
    protected $table = "methodologies";

    protected $fillable = [
        'title',
        'description',
        'file',
        'image',
    ];

    public static function getTranslate(string $lang)
    {
        $methodologies = Methodology::withTranslation($lang)->get();

        foreach($methodologies as $methodology)
        {
            foreach($methodology->translations as $translation)
            {
                $methodology[$translation->column_name] = $translation->value;
            }

            unset($methodology->translations);
        }

        return $methodologies;
    }
}
