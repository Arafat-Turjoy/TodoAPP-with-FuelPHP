<?php


class Controller_Test extends Controller_Rest
{
   protected $format = 'json';
   
    public function get_index()
	{ 
        $tasks = Model_Task::find('all');

        

       return $this->response($tasks);
    }


    public function post_add()
	{

       
       
        $flag = true;
        $error = [];
        
            
        $task = new Model_Task();
        
        
        if(isset($_POST['title']) && !empty($_POST['title'])){
            
        $task->title = $_POST['title'];
        }else{
            $error['title'] = "title value not set";
            $flag = false;
        }

        // var_dump($_POST['status']);
        // die();

        if(isset($_POST['status']) && $_POST['status']!=null)
        {
        //    var_dump(empty($_POST['status']));
        //    die();
            

            $task->status = empty($_POST['status'])?0:1;
            // var_dump($project->status);
            // die();
            

        }else{
            $error['status'] = "status value not set";
            $flag = false;
        }
    
        
        
        
        if($flag===true){

        $task-> save();


        }

        // Session::set_flash('success','Post Added');
        // Response:: redirect('/');

        $data = array($flag, $error,$task);
       
        
        
        return $this->response($data);

      
        

        
        
        
    }

    

    public function post_edit($id)
	{

       
        $flag = true;
        $error = [];
            
            $task = Model_Task::find($id);
        

            // if(isset($_POST['title']) && !empty($_POST['title'])){
                
            // $task->title = $_POST['title'];
            // }else{
            //     $error['title'] = "title value not set";
            //     $flag = false;
            // }
            
            
         
        //    die();
            

            $task->status=$task->status==0?1:0;
            // var_dump($task->status);
            // die();
            

        


        
           
            

            // Session::set_flash('success','Post Updated');
            // Response:: redirect('/');

        
            if($flag===true){

                $task-> save();
        
        
                }

       

                $data = array($flag, $error);
        
        
        
                return $this->response($data);
        
            
        
        
    }
    
    public function post_delete($id)
	{
        

        $task = Model_Task::find($id);

    
        if($task!=null){
            $task -> delete();

        }
       
        // Session::set_flash('success','Post Deleted');
        // Response:: redirect('/');

        
        
	}


  
}