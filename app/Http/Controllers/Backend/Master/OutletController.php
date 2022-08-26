<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\OutletDatatable;
use App\Http\Controllers\Controller;
use App\Models\Master\Outlet;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    protected $outlet;
    public function __construct(Outlet $outlet)
    {
        $this->outlet = new BaseRepository($outlet);
    }

    public function index(OutletDatatable $datatable)
    {
        return $datatable->render('backend.master.outlet.index');
    }

    public function create()
    {
        return view('backend.master.outlet.create');
    }

    public function store(Request $request)
    {
        $this->outlet->store($request->all(),true,['image'],'outlet');
        return redirect()->route('master.outlet.index')->with('success',__('message.store'));
    }

    public function delete($id)
    {
        $this->outlet->softDelete($id);
        return redirect()->back()->with('success',__('message.delete'));
    }

    public function edit($id)
    {
        $data['outlet'] = $this->outlet->find($id);
        return view('backend.master.outlet.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        if(isset($request->image)){
            $this->outlet->update($id,$request->all(),true,['image'],'outlet');
        }else{
            $this->outlet->update($id,$request->all());
        }
        return redirect()->route('master.outlet.index')->with('success',__('message.update'));
    }

    public function show($id)
    {
        $data['outlet'] = $this->outlet->find($id);
        return view('backend.master.outlet.show',compact('data'));
    }
}
