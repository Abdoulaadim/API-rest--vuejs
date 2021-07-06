<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:3000');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once '../vendor/autoload.php';

class Rendevou extends Controller
{

    public $data ;

    public function __construct()
    {
        $this->RendevouModel = $this->model('RendevouModel');
    }

    public function Creneau()
    {
        $Rendevou = $this->RendevouModel->creneau($this->data->Date);
        print_r(json_encode($Rendevou));
    }

    public function add()
    {
        $users = $this->RendevouModel->add($this->data);
        print_r(json_encode($this->data));
    }

    public function allredevou()
    {
        $Rendevou = $this->RendevouModel->allrendevou($this->data->reference);

        print_r(json_encode($Rendevou));
    }

  
    public function delete()
    {
        $this->RendevouModel->delete($this->data);
        print_r(json_encode(array(
            'message' => "the reservation canceled"
        )));
    }

    
}
