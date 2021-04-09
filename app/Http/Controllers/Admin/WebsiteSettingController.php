<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteSettingController extends Controller
{
    
    private $routeName = "admin.website-settings.";
    private $viewName = "admin.websitesettings.";

    
    public function getBreadCrumbs($param)
    {
        $breadCrumbs = [
            ['name' => 'Site-Settings', 'url' =>  route('admin.website-settings.edit'), 'is_active'=> 0 ]
        ];
        if($param == 'index')
            $breadCrumbs[0]['is_active']  = 1;
        elseif($param == 'create')
            $breadCrumbs[] = ['name' => 'Create', 'url' =>  '', 'is_active'=> 1 ];
        elseif($param == 'edit')
            $breadCrumbs[] = ['name' => 'Edit', 'url' =>  '', 'is_active'=> 1 ];

        return $breadCrumbs;
    }
    
    public function getPageName($param)
    {
        if($param == 'index')   
            $pageName = "Site Settings";
        elseif($param == 'create')
            $pageName = "Create New Site Setting";
        elseif($param == 'edit')
            $pageName = "Edit This Site Setting";

        return $pageName;
    }
    
    
    Public function edit()
    {
        $website_setting = WebsiteSetting::get();
        $breadCrumbs = $this->getBreadCrumbs('index');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('index');
        return view($this->viewName.'edit', compact('website_setting', 'routeName','breadCrumbs','pageName'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        foreach($data['setting'] as $id => $values)
            {
               WebsiteSetting::where('id',$id)->update(['input_value'=>$values]);
            }
        $request->session()->flash('alert-success', trans('admin_message.update',['name'=>'Website-Settings']));
        return redirect()->route($this->routeName.'edit');
      }

    

   
}
