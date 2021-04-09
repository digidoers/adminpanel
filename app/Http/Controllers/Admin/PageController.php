<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $routeName = "admin.pages.";
    private $viewName = "admin.pages.";
    

    
    public function getPageName($param)
    {
        if($param == 'index')   
            $pageName = "Page List";
        elseif($param == 'create')
            $pageName = "Create New Page";
        elseif($param == 'edit')
            $pageName = "Edit This Page";

        return $pageName;
    }
    
    public function getBreadCrumbs($param){
        $breadCrumbs = [
            ['name' => 'Pages', 'url' =>  route('admin.pages.index'), 'is_active'=> 0 ]
        ];
        if($param == 'index')
            $breadCrumbs[0]['is_active']  = 1;
        elseif($param == 'create')
            $breadCrumbs[] = ['name' => 'Create', 'url' =>  '', 'is_active'=> 1 ];
        elseif($param == 'edit')
            $breadCrumbs[] = ['name' => 'Edit', 'url' =>  '', 'is_active'=> 1 ];

        return $breadCrumbs;
    }

    
    public function index()
    {
         $routeName = $this->routeName;
         $pages = Page::get();
         $i = 1;
         $breadCrumbs = $this->getBreadCrumbs('index');
         $pageName = $this->getPageName('index');
        return view($this->viewName.'index', compact('pages', 'i','routeName', 'breadCrumbs', 'pageName'));
    }

    public function create()
    {
        $breadCrumbs = $this->getBreadCrumbs('create');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('create');
        return view($this->viewName.'create', compact('routeName', 'breadCrumbs', 'pageName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:50',
            'slug' => 'required|alpha_dash',
            'description' => 'required',
            'meta_title' =>'required',
            'meta_description' => 'required',
        ]);
        $data = $request->all();
        Page::create($data);
        $request->session()->flash('alert-success', trans('admin_message.create',['name'=>'Page']));
        return redirect()->route($this->routeName.'index');
                        
    }

    Public function edit(Page $page){
        $breadCrumbs = $this->getBreadCrumbs('edit');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('edit');
        return view($this->viewName.'edit', compact('page', 'routeName','breadCrumbs','pageName'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|min:2|max:50',
            'slug' => 'required',
            'description' => 'required',
            'meta_title' =>'required',
            'meta_description' => 'required',
        ]);
        $data = $request->all();
        $page->update($data);
        $request->session()->flash('alert-success', trans('admin_message.update',['name'=>'Page']));
        return redirect()->route($this->routeName.'index');
    }

    public function show(Page $page){
        return "show";
    }

    public function destroy(Page $page, Request $request){
            
        $page->forceDelete();
        $request->session()->flash('alert-success', trans('admin_message.delete',['name'=>'Page']));
        return redirect()->route($this->routeName.'index')->with('message', 'Succesfully Deleted');
    }

    public function status(Page $page, Request $request)
    {
        $var = $page->status;
        ($var==1)?$page->status=0:$page->status=1;
        $page->save();
        $request->session()->flash('alert-success', trans('admin_message.status_change',['name'=>'Page']));
        return redirect()->route($this->routeName.'index');
    }

    public function dashboard()
    {
        return view('admin.users.dashboard');
    }

}
