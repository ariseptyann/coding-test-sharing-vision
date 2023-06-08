<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $table = "posts";

    const TAB_PUBLISH     = "publish";
    const TAB_DRAFT       = "draft";
    const TAB_THRASH      = "thrash";

    public static function createPost($param)
    {
        return self::create($param);
    }

    public static function getPostById($id = null)
    {
        return self::where('id', $id)->first();
    }

    public static function deletePost($id)
    {
        return self::where('id', $id)->delete();
    }

    public static function getPostByTab($tab = self::TAB_PUBLISH)
    {
        switch ($tab) {
            case self::TAB_PUBLISH: {
                $query = self::where('status', $tab)->get();

                return $query;
            }
            case self::TAB_DRAFT: {
                $query = self::where('status', $tab)->get();

                return $query;
            }
            case self::TAB_THRASH: {
                $query = self::where('status', $tab)->get();

                return $query;
            }
        }
    }
}
