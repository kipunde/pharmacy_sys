<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PharmacyType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PharmacyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'pharmacy_types';
        if($request->ajax()){
            $pharmacy_types = PharmacyType::get();
            return DataTables::of($pharmacy_types)
                    ->addIndexColumn()
                    ->addColumn('created_at',function($category){
                        return date_format(date_create($category->created_at),"d M,Y");
                    })
                    ->addColumn('action',function ($row){
                        $editbtn = '<a 
                        data-id="'.$row->id.'" 
                        data-name="'.$row->name.'" 
                        data-description="'.htmlspecialchars($row->description, ENT_QUOTES).'" 
                        href="javascript:void(0)" 
                        class="editbtn">
                        <button class="btn btn-info"><i class="fas fa-edit"></i></button>
                        </a>';
                        $deletebtn = '<a data-id="'.$row->id.'" data-route="'.route('pharmacy_types.destroy',$row->id).'" href="javascript:void(0)" id="deletebtn"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>';
                        if(!auth()->user()->hasPermissionTo('edit_pharmacy_type')){
                            $editbtn = '';
                        }
                        if(!auth()->user()->hasPermissionTo('destroy-category')){
                            $deletebtn = '';
                        }
                        $btn = $editbtn.' '.$deletebtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.products.pharmacy_types',compact(
            'title'
        ));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'description' => 'nullable|min:5',
        ]);
        PharmacyType::create($request->all());
        $notification=array("Pharmacy type has been added");
        return back()->with($notification);
    }

    

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,['name'=>'required|max:100']);
        $category = PharmacyType::find($request->id);
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        $notification = notify("Pharmacy type has been updated");
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return PharmacyType::findOrFail($request->id)->delete();
    }
}
