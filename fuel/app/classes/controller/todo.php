<?php
class Controller_Todo extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('todo/index.html'));
    }
    public function action_add()
	{
        return Response::forge(View::forge('todo/add.html'));
        
    }
    

    public function action_edit($id)
	{
		if ($_POST!=null){
        
        

            $task = Model_Task::find($_POST['id']);

            $task->title = $_POST['title'];
            $task->status = $_POST['status'];
           


        
           
            $task-> save();

            // Session::set_flash('success','Post Updated');
            // Response:: redirect('/');

		}
		$task = Model_Task::find('first', array(

            'where' => array(
                'id' => $id,
            )

            ));

        $data = array('task'=> $task);

		return Response::forge(View::forge('todo/edit.html',$data));
	}

}