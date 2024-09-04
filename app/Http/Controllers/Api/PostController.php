<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeadUpdate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $model;       

    public function __construct()     
    {         
        $this->model = new LeadUpdate();
    }

    public function create(Request $request){
       
        $input = $request->all();
        $this->model->create($input);
        
        return response()->json([
            'success' => true,
            'message' => 'Post update successfully.'
           
        ]);

    } 

    public function listing(Request $request){
        $data = $this->model->select('*')->orderBy('id','DESC')->get();

        return response()->json([
            'success' => true,
            'message' => 'Post get successfully.',
            'data' => $data
           
        ]);

    }
}