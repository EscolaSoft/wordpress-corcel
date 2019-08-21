<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 17.06.19
 * Time: 11:02
 */

namespace App;
use Corcel\Model\MenuItem as Corcel;
use Corcel\Model\Post;
use Corcel\Model\Page;


class Menu extends  Corcel
{

    protected $hidden = ['meta'];

    protected $appends = [
        "title",
        "name",
        "url",
        "parent_menu_id",
        "parent_menu_name",
        "parent_manu_url",
        "template",
        "children"
    ];


    public function getTitleAttribute(){
        return $this->instance ()->title;
    }

    public function getNameAttribute(){
        return $this->instance ()->name;
    }

    public function getURLAttribute(){
        return $this->instance ()->slug;
    }

    public function getParentMenuIDAttribute(){
        return $this->meta->_menu_item_menu_item_parent;
    }

    public function getTemplateAttribute(){
        $post = Post::find($this->ID);
        if($post){
            $page = \App\Page::find($post->meta->_menu_item_object_id);
            if($page){
                return $page->getTemplateAttribute();
            }
        }
        return "";
    }


    public function getParentMenuNameAttribute(){
        $post = Post::published()->find($this->meta->_menu_item_menu_item_parent);
        if($post){
            return $post->title;
        }
        return "";
    }

    public function getParentMenuURLAttribute(){
        $post = Post::published()->find($this->meta->_menu_item_menu_item_parent);
        if($post){
            return $post->slug;
        }
        return "";
    }

    public function RecursioMenu($id){
        if($id){
            $menus = Corcel::hasMeta(['_menu_item_menu_item_parent' => $id])->get();
            if($menus){
                foreach ($menus as $item) {
                    $temp = [];
                    $temp['ID'] = $item->ID;
                    $temp['title'] = $item->title;
                    $temp['url'] = $item->url;
                    $temp['menu_order'] = $item->menu_order;
                    $temp['guid'] = $item->guid;
                    $temp['slug'] = $item->slug;
                    $temp['template'] = $item->template;
                    $temp['children'] = $this->RecursioMenu($item->ID);
                    return $temp;

                }
            }
        }
    }


    public function getChildrenAttribute()
    {

        $menus = Corcel::hasMeta(['_menu_item_menu_item_parent' => $this->ID])->get();


        $items = [];
        if ($menus) {
            foreach ($menus as $item) {
                $temp = [];
                $temp['ID'] = $item->ID;
                $temp['title'] = $item->title;
                $temp['url'] = $item->url;
                $temp['menu_order'] = $item->menu_order;
                $temp['guid'] = $item->guid;
                $temp['slug'] = $item->slug;
                $temp['template'] = $item->template;
                $temp['children'] = $this->RecursioMenu($item->ID);
                $items[] = $temp;

            }
        }


        return $items;


    }




}