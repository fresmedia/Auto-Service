<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'banner_image', 'image', 'description', 'meta_description', 'category_id', 'article_type_id', 'advertisement_ids',  'status', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

    protected $casts = [
        'advertisement_ids' => 'array'
    ];

    public static function checkHasAdvertisement($page_id, $advertisement_id)
    {
        $page = Page::find($page_id);
        if(!is_null($page)){
            if(!is_null($page->advertisement_ids) && in_array($advertisement_id, $page->advertisement_ids)){
                return true;
            }
        }
        return false;
    }

    /**
     * category
     *
     * @return object returns the category model as obejct
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function articleByCategory($category_id)
    {
        return Page::where('category_id', $category_id)->select('id', 'category_id', 'slug', 'title')->orderBy('id', 'desc')->get();
    }

    public static function articleByType($type_id)
    {
        return Page::where('article_type_id', $type_id)->select('id', 'category_id', 'slug', 'title')->orderBy('id', 'desc')->get();
    }

    public static function articleByTypeAndCategory($type_id, $category_id)
    {
        return Page::where('article_type_id', $type_id)
        ->where('category_id', $category_id)
        ->select('id', 'category_id', 'slug', 'title')
        ->orderBy('id', 'desc')->get();
    }
}
