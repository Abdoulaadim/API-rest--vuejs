<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:3000');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once '../vendor/autoload.php';

class Users extends Controller
{

    public $data ;

    public function __construct()
    {
        $this->usersModel = $this->model('UsersModel');
    }

    public function getallusers()
    {
        $users = $this->usersModel->getAll();
        // unset($users->password);
        print_r(json_encode($users));
    }

    public function add()
    {
        $users = $this->usersModel->add($this->data);
        print_r(json_encode($users));
    }

    public function SignIn()
    {
        $users = $this->usersModel->getUserByRef($this->data->reference);
        // die(print_r(json_encode($this->data)));
   
        // print_r(json_encode($this->data));


        if ($users) {
            echo json_encode(
                array('message' => 'Login succes !!!', 'reference' => $users->reference)
            );
        } else {
            echo json_encode(
                array('message' => 'reference incorrect!!')
            );
        }
    }

    
}
