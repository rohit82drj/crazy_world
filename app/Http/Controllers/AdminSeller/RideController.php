<?php

namespace App\Http\Controllers\AdminSeller;
use App\Models\Ride;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DataTables;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RideRequest;
use App\Helpers\ImageHelper;

class RideController extends Controller
{
    public function __construct(Ride $s)
    {
        $this->view = 'ride';
        $this->route = 'ride';
        $this->viewName = 'ride';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
			$query = Ride::get();
			
			
			return Datatables::of($query)
				->addColumn('action', function ($row) {
					$btn = view('admin.layout.actionbtnpermission')->with(['id' => $row->id, 'route' => 'admin.ride', 'delete' => route('admin.'.$this->route.'.destory')])->render();
					return $btn;
				})
				->addColumn('checkbox', function ($row) {
					$chk = view('admin.layout.checkbox')->with(['id' => $row->id])->render();
					return $chk;
				})
               ->editColumn('image', function ($row) {
                    return view('admin.layout.image')->with(['image'=>$row->image, 'folder_name'=>'page']);
                    
                })
				->addColumn('singlecheckbox', function ($row) {
					$schk = view('admin.layout.singlecheckbox')->with(['id' => $row->id , 'status'=>$row->status])->render();
					return $schk;
                })

				->setRowClass(function () {
					return 'row-move';
				})
				->setRowId(function ($row) {
					return 'row-' . $row->id;
				})
				->rawColumns(['checkbox', 'singlecheckbox','action'])
				->make(true);
		}
        return view('adminseller.'.$this->view . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['url'] = route('admin.'.$this->route . '.store');
        $data['title'] = 'Add ' . $this->viewName;
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
    //    dd($data);

        return view('admin.general.add_form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideRequest $request)
    {
        $param = $request->all();
        $param['status']=empty($request->status)? 0 : $request->status;

         if ($request->hasFile('image')) {
			$image = ImageHelper::saveUploadedImage(request()->image, 'Testimonial', storage_path("app/public/uploads/page/"));
            $param['image']= $image;
            // dd($name);
        }
        
        $ride = Ride::create($param);
        if ($ride){
			return response()->json(['status'=>'success']);
		}else{
			return response()->json(['status'=>'error']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit '.$this->viewName;
        $data['edit'] = Ride::findOrFail($id);
        $data['url'] = route('admin.' . $this->route . '.update', [$this->view => $id]);
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        
		return view('admin.general.edit_form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RideRequest $request, $id)
    {
        $param = $request->all();
        $param['status']=empty($request->status)? 0 : $request->status;
        unset($param['_token'], $param['_method']);
        
        if ($request->hasFile('image')) {
            $image = ImageHelper::saveUploadedImage(request()->image, 'Testimonial', storage_path("app/public/uploads/page/"));
            $param['image']= $image;
            // dd($name);
        }
       
        $ride = Ride::where('id', $id);
        $ride->update($param);

        if ($ride){
			return response()->json(['status'=>'success']);
		}else{
			return response()->json(['status'=>'error']);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destory(Request $request)
    {
        // dd($users);
     $ride = Ride::where('id',$request->id)->delete();

      if ($ride){
            return response()->json(['success'=> true]);
        }else{
            return response()->json(['success'=> false]);
        }
    }
}
