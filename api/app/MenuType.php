<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 17.06.19
 * Time: 11:02
 */

namespace App;
use Corcel\Model\Menu as Corcel;
use Corcel\Model\Post;


class MenuType extends  Corcel
{
    /**
     * @var string
     */
    protected $taxonomy = 'nav_menu';


    /**
     * @var array
     */
    protected $with = ['term', 'items'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(
            Menu::class, 'term_relationships', 'term_taxonomy_id', 'object_id'
        )->where("post_parent", "=",0)->orderBy('menu_order');
    }




}