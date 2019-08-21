<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 17.06.19
 * Time: 10:56
 */

namespace App;
use Corcel\Model\Page as Corcel;
use Corcel\Model\Post;
use Corcel\Model\MenuItem;


class Page extends Corcel
{

    protected $appends = ["breadcrumbs","slug", "template", "subpage"];

    protected $hidden = ['meta'];


    public function getTemplateAttribute(){
        return $this->meta->_wp_page_template;
    }




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


        $posts =  $post->children->filter(function($value, $key){
            return $value->post_status === 'publish';
        })->makeHidden('meta');

        return $posts->values();

    }






}