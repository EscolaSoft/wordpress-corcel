<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 17.06.19
 * Time: 08:46
 */

namespace App;
use Corcel\Model\Post as Corcel;


class Post extends Corcel
{
    protected $appends = [
        "breadcrumbs",
        'title',
        'slug',
        'content',
        'type',
        'mime_type',
        'parent',
        'url',
        'author_id',
        'parent_id',
        'created_at',
        'updated_at',
        'excerpt',
        'status',
        'image',
        'terms',
        'main_category',
        'keywords',
        'keywords_str',
        "subpage",
        "languages",
        "langPost",
        "curr_language"
    ];

    public function getBreadCrumbsAttribute(){
        $breadcrumbs = [];
        $temp = [];
        $parent_id =  $this->post_parent;
        $page = Corcel::published()->find($parent_id);

        if($page){
            $temp['ID'] = $parent_id ;
            $temp['slug'] = $page->slug;
            $temp['guid'] = $page->guid;
            $breadcrumbs[] = $temp;
            while($parent_id > 0){
                $temp = [];
                $page = Corcel::published()->find($parent_id);
                if($page) {
                    $temp['ID'] = $page->post_parent;
                    $parent_id = $page -> post_parent;
                    $page = Corcel::published()->find($parent_id);
                    if($page) {
                        $temp['slug'] = $page -> slug;
                        $temp['guid'] = $page -> guid;
                        $breadcrumbs[] = $temp;
                    }
                }else{
                    return $breadcrumbs;
                }

            }
        }
        return $breadcrumbs;
    }



    public function getSubPageAttribute(){
        $post = Corcel::published()->find($this->ID);
        if($post){
            if($post->children->count() > 0){
                $posts =  $post->children->filter(function($value, $key){
                    return $value->post_status === 'publish';
                })->makeHidden('meta');
                return $posts->values();
            }
        }
        return [];



    }




}