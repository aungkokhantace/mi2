<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/14/2017
 * Time: 3:56 PM
 */

namespace App\Backend\Page;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\Utility;

class PageRepository implements PageRepositoryInterface
{
    public function getPages()
    {
        $pages = Page::whereNull('deleted_at')->get();
        return $pages;
    }

    public function create($paramObj)
    {
        $tempObj = Utility::addCreatedBy($paramObj);
        $tempObj->save();
    }

    public function update($paramObj)
    {
        $tempObj = Utility::addUpdatedBy($paramObj);
        $tempObj->save();
    }

    public function getObjByID($id){
        $page = Page::find($id);
        return $page;
    }

   public function delete($id){
        $page = DB::table('pages')->where('id',$id)->update(['deleted_at'=> date('Y-m-d H:m:i')]);
        return $page;
    }

    public function getPageIDByURL($url){
        if($url == "/"){
            $url = "home";
        }

        $page_id = DB::table('pages')->where('url',$url)->whereNull('deleted_at')->first()->id;
        return $page_id;
    }

    public function getURLByPageID($page_id){
        $url = DB::table('pages')->where('id',$page_id)->whereNull('deleted_at')->first()->url;
        return $url;
    }
    


}