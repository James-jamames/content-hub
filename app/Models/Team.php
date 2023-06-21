<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Team extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['role'];
    protected $table = "team";

    protected $fillable = [
        'name',
        'role',
        'image',
        'lattes',
    ];

    public static function getTranslate(string $lang)
    {
        $team = Team::withTranslation($lang)->get();

        foreach($team as $teammate)
        {
            foreach($teammate->translations as $translation)
            {
                $teammate[$translation->column_name] = $translation->value;
            }

            unset($teammate->translations);
        }

        return $team;
    }
}
