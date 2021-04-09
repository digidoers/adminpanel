<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailTemplateController extends Controller
{
    private $routeName = "admin.emailtemplates.";
    private $viewName = "admin.emailtemplates.";

    
    public function getBreadCrumbs($param){
        $breadCrumbs = [
            ['name' => 'Email-Template', 'url' =>  route('admin.emailtemplates.index'), 'is_active'=> 0 ]
        ];
        if($param == 'index')
            $breadCrumbs[0]['is_active']  = 1;
        elseif($param == 'create')
            $breadCrumbs[] = ['name' => 'Create', 'url' =>  '', 'is_active'=> 1 ];
        elseif($param == 'edit')
            $breadCrumbs[] = ['name' => 'Edit', 'url' =>  '', 'is_active'=> 1 ];

        return $breadCrumbs;
    }
    
    public function getPageName($param){
        
        
        if($param == 'index')   
            $pageName = "Email Template List";
        elseif($param == 'create')
            $pageName = "Create New Email Template";
        elseif($param == 'edit')
            $pageName = "Edit This Email Template";

        return $pageName;
    }
    
    public function index()
    {
        $routeName = $this->routeName;
        $emailtemplate = EmailTemplate::get();
        $i = 1;
        $breadCrumbs = $this->getBreadCrumbs('index');
        $pageName = $this->getPageName('index');
        return view($this->viewName.'index', compact('emailtemplate', 'i','routeName','breadCrumbs','pageName'));
       
    }

    public function create()
    {
        $breadCrumbs = $this->getBreadCrumbs('create');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('create');
        return view($this->viewName.'create', compact('routeName','breadCrumbs','pageName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:2|max:50',
            'params' => 'required',
            'template' => 'required',
           
        ]);
        $data = $request->all();
        EmailTemplate::create($data);
        $request->session()->flash('alert-success', trans('admin_message.create',['name'=>'Email Template']));
        return redirect()->route($this->routeName.'index');
                        
    }

    Public function edit(EmailTemplate $emailtemplate){

        $breadCrumbs = $this->getBreadCrumbs('edit');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('edit');
        return view($this->viewName.'edit', compact('emailtemplate', 'routeName','breadCrumbs','pageName'));
    }

    public function update(Request $request, EmailTemplate $emailtemplate){
        
        
        $request->validate([
            'subject' => 'required|min:2|max:50',
            'params' => 'required',
            'template' => 'required',
           
        ]);
        $data = $request->all();
        $emailtemplate->update($data);
        $request->session()->flash('alert-success', trans('admin_message.update',['name'=>'Email Template']));
        return redirect()->route($this->routeName.'index');


    }

    public function show(EmailTemplate $emailtemplate){
        return "show";
    }

    public function destroy(EmailTemplate $emailtemplate, Request $request){
            
            $emailtemplate->forceDelete();
            $request->session()->flash('alert-success', trans('admin_message.delete',['name'=>'Email Template']));
        return redirect()->route($this->routeName.'index');
    }

    public function status(EmailTemplate $emailtemplate, Request $request)
    {
        $var = $emailtemplate->status;
        ($var==1)?$emailtemplate->status=0:$emailtemplate->status=1;
        $emailtemplate->save();
        $request->session()->flash('alert-success', trans('admin_message.status_change',['name'=>'Email Template']));
        return redirect()->route($this->routeName.'index');
    }

    public function dashboard(){

        return view('admin.users.dashboard');
    }

}
