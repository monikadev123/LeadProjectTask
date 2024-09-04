<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lead;

class LeadController extends Controller
{
    protected $model;       

    public function __construct()     
    {         
        $this->model = new Lead;
    }


    public function listing(Request $request){

        $data = $this->model->select('*')->get();


        return view('lead', compact('data'));
    }

    public function update(Request $request,$lead_id){
        try {
         
            $input = $request->all();
            $this->model->where('id',$lead_id)->update($input);

            return response()->json([
                'success' => true,
                'data' =>  'Lead updated successfully.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' =>  'Something went wrong.'
            ]);
        }
      
    }
}