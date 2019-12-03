<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Categorie extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
    static public function GetAllCategories($ParaMeter)
    {
        $Categorie = Categorie::select('categories.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']!="")
        {
           $Categorie = $Categorie->addSelect("categories.category_name");
        }
        $Categorie = $Categorie->get();
        return $Categorie;
    }
    
}
