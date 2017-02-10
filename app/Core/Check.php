<?php namespace App\Core;
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 10/25/2016
 * Time: 10:42 AM
 */
use App\Backend\Menu\MenuRepository;
use App\Backend\Menudetail\MenudetailRepository;
use App\Backend\Page\PageRepository;
use App\Core\Config\ConfigRepository;
use Validator;
use Auth;
use App\Http\Requests;
use App\Session;
use App\Core\User\UserRepository;
use App\Setup\FrontedClient\FrontedClient;
use App\Setup\Backend\Backend;
class Check
{
    /**
     *
     * @return bool
     */
    public static function validSession()
    {
        $sessionObj = session('user');
        if(isset($sessionObj)){
            return true;
        }
        return false;
    }

    public static function hasPermission($permissions,$routeAction) {

        if(isset($permissions) && count($permissions)>0) {
            foreach ($permissions as $key => $permission) {
                if ($permission['url'] == $routeAction) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $methodString
     * @param $method
     * @return bool
     */
    public static function hasMethods($methodString,$method) {
        $methods = explode('|', $methodString);
        return (in_array("*", $methods) || in_array($method, $methods));
    }

     /**
     * @return mixed
     */
    public static function logout() {
        //flush session
        Session::flush();

        //redirect user to login page
        return Redirect::to('/backend/login');
    }

    public static function getInfo() {
        $info = array();
        $info['companyName'] = "";
        if(Check::validSession()) {
            $info['userName'] = strtoupper(session('user')['user_name']);
            $info['userId'] = session('user')['id'];
            $info['userRoleId'] = session('user')['role_id'];
        }
        return $info;
    }

    public static function companyLogo() {

        $ConfigRepository = new ConfigRepository();
        $companyLogo = $ConfigRepository->getCompanyLogo();

        if(isset($companyLogo) && count($companyLogo)>0 ) {

            if(isset($companyLogo[0]->value) && $companyLogo[0]->value != ""){
                return $companyLogo[0]->value;
            }
            else{
                return "/images/aceplus-logo.png";
            }
        }
        return "/images/aceplus-logo.png";
    }

    public static function companyName() {

        $ConfigRepository = new ConfigRepository();
        $companyName = $ConfigRepository->getCompanyName();

        if(isset($companyName) && count($companyName)>0 ) {

            if(isset($companyName[0]->value) && $companyName[0]->value != ""){
                return $companyName[0]->value;
            }
            else{
                return "AcePlus Backend";
            }
        }
        return "AcePlus Backend";
    }

    public static function createSession($id) {

        $userRepository = new UserRepository();
        $tempUser = $userRepository->getObjByID($id);
        $permissions = $userRepository->getPermissionByUserId($id);
        session(['user'=>$tempUser->toArray()]);
        session(['permissions' => $permissions]);
    }

    public static function headerMenuFlag() {

        $ConfigRepository = new ConfigRepository();
        $headerMenuFlag = $ConfigRepository->getHeaderMenuFlag();

        if(isset($headerMenuFlag) && count($headerMenuFlag)>0 ) {

            if(isset($headerMenuFlag[0]->value) && $headerMenuFlag[0]->value != ""){
                return $headerMenuFlag[0]->value;
            }
            else{
                return "AcePlus Backend";
            }
        }
        return "AcePlus Backend";
    }

    public static function footerMenuFlag() {

        $ConfigRepository = new ConfigRepository();
        $footerMenuFlag = $ConfigRepository->getFooterMenuFlag();

        if(isset($footerMenuFlag) && count($footerMenuFlag)>0 ) {

            if(isset($footerMenuFlag[0]->value) && $footerMenuFlag[0]->value != ""){
                return $footerMenuFlag[0]->value;
            }
            else{
                return "AcePlus Backend";
            }
        }
        return "AcePlus Backend";
    }

    public static function getMainMenus()
    {
        $menuRepo = new MenuRepository();
        $mainMenus = $menuRepo->getObjByType(2);//2 is for main menu

        $menuDetailRepo = new MenuDetailRepository();
        $parents    = $menuDetailRepo->getParentByMenuType(2); //2 is for main menu
        $children   = $menuDetailRepo->getChildrenByMenuType(2); //2 is for main menu
        $result = $parents;
        foreach($result as $k=>$v){
            $subresult = Check::categoriesTree($result[$k]);
            $result[$k]->subCategories=$subresult;
        }
        return $result;
    }

    public static function getHeaderMenus()
    {
        $menuRepo = new MenuRepository();
        $mainMenus = $menuRepo->getObjByType(1);//1 is for header menu

        $menuDetailRepo = new MenuDetailRepository();
        $parents    = $menuDetailRepo->getParentByMenuType(1); //1 is for header menu
        $children   = $menuDetailRepo->getChildrenByMenuType(1); //1 is for header menu
        $result = $parents;
        foreach($result as $k=>$v){
            $subresult = Check::categoriesTree($result[$k]);
            $result[$k]->subCategories=$subresult;
        }
        return $result;
    }

    public static function getSideMenus()
    {
        $menuRepo = new MenuRepository();
        $mainMenus = $menuRepo->getObjByType(3);//3 is for side menu

        $menuDetailRepo = new MenuDetailRepository();
        $parents    = $menuDetailRepo->getParentByMenuType(3); //3 is for side menu
        $children   = $menuDetailRepo->getChildrenByMenuType(3); //3 is for side menu
        $result = $parents;
        foreach($result as $k=>$v){
            $result[$k]->url    = $v->page->url;
            $subresult = Check::categoriesTree($result[$k]);
            $result[$k]->subCategories=$subresult;
        }
        return $result;
    }

    public static function getFooterMenus()
    {
        $menuRepo = new MenuRepository();
        $mainMenus = $menuRepo->getObjByType(4);//4 is for footer menu

        $menuDetailRepo = new MenuDetailRepository();
        $parents    = $menuDetailRepo->getParentByMenuType(4); //4 is for footer menu
        $children   = $menuDetailRepo->getChildrenByMenuType(4); //4 is for footer menu
        $result = $parents;
        foreach($result as $k=>$v){
            $subresult = Check::categoriesTree($result[$k]);
            $result[$k]->subCategories=$subresult;
        }
        return $result;
    }

    public static function categoriesTree($result){
        $id=$result->id;
        $menuDetailRepo = new MenuDetailRepository();
        $sresult = $menuDetailRepo->getChildrenByID($id);
        foreach($sresult as $k=>$v){
            $pageRepo  = new PageRepository();
            $url       = $pageRepo->getURLByPageID($v->page_id);
            $sresult[$k]->url = $url;

            $subresult = Check::categoriesTree($sresult[$k]);
            $sresult[$k]->subCategories= $subresult;
        }
        return $sresult;
    }

}