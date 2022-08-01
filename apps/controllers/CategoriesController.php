<?php 
class CategoriesController extends MainController{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('categories','cat');

    }
    public function index(){
        $data=$this->cat->fetchData();
        $this->view->loadView('categories.index',compact('data'));
    }
    public function create(){
        echo "this is create of Categories";
        $this->view->loadView('categories.create');

    }
    public function store(){
        
        $data=[
            'name'=>request('name'),
            'description'=>request('description')
        ];

       if( $this->cat->submitData($data)){
            Session::set('gmsg',"Data saved successfully");
            redirect('categories/index');
       }

    }
    public function edit($id){
        $id=dec($id);
        $info=$this->cat->fetchInfo($id);
        $this->view->loadView("categories.edit",['info'=>$info]);
    }
    public function update($id){
        $id=dec($id);
        $data=[
            'name'=>request('name'),
            'description'=>request('description')
        ];

       if( $this->cat->submitData($data,$id)){
        Session::set('gmsg',"Data updated successfully");
            redirect('categories.index');
        
       }
    }
    public function destroy(){
        echo "this is destroy of Categories";
    }
    
}