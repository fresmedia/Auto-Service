<?php

namespace Modules\Service\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Track;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Service\Entities\Models\Service;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {

        if ( is_null($this->user) || ! $this->user->can('service.view') ) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        // dd($this->user->roles);

        if (request()->ajax()) {
            $query = Service::orderBy('id', 'desc');
            if ($isTrashed) {
                $query = Service::orderBy('id', 'desc')->where('status', 0);
            } else {
                $query = Service::orderBy('id', 'desc')->where('deleted_at', null)->where('status', 1);
            }

            if(count($this->user->roles) > 0){
                $services = $query->where('created_by', $this->user->id)->get();   
            }else{
                $services = $query->get();
            }

            $datatable = DataTables::of($services, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Service Details" href="' . route('admin.services.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.services.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1" title="Edit Service Details" href="' . route('admin.services.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.services.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.services.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Service Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Service will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Service will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Service will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';

                        $html .= '
                            <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Permanent Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )

                ->editColumn('service_title', function ($row) {
                    return $row->service_title;
                })
                ->editColumn('service_type', function ($row) {
                    if($row->service_type == 'primary'){
                        return '<span class="badge badge-success font-weight-100">Primary</span>';
                    }else if($row->service_type == 'secondary'){
                        return '<span class="badge badge-warning font-weight-100">Secondary</span>';
                    }
                })
                ->editColumn('service_price', function ($row) {
                    return $row->service_price;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'service_title', 'service_type', 'service_price', 'status'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        $cquery = Service::select('id');
        if(count($this->user->roles) > 0){
            $count_services = count($cquery->where('created_by', $this->user->id)->get());
            $count_active_services = count($cquery->where('created_by', $this->user->id)->where('status', 1)->get());
            $count_trashed_services = count($cquery->where('created_by', $this->user->id)->where('deleted_at', '!=', null)->get());
        }else{
            $count_services = count($cquery->get());
            $count_active_services = count($cquery->where('status', 1)->get());
            $count_trashed_services = count($cquery->where('deleted_at', '!=', null)->get());
        }
        
        return view('service::backend.services.index', compact('count_services', 'count_active_services', 'count_trashed_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('service.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        return view('service::backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('service.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'service_title'  => 'required|max:100',
            'service_title_fi'  => 'required|max:100',
            'service_type'  => 'required|in:primary,secondary',
            'slug'  => 'nullable|max:100|unique:services,slug',
            'service_price'  => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            $service = new Service();
            $service->service_title = $request->service_title;
            $service->service_title_fi = $request->service_title_fi;
            $service->service_type = $request->service_type;
            if ($request->slug) {
                $service->slug = $request->slug;
            } else {
                $service->slug = StringHelper::createSlug($request->service_title, 'Modules\Service\Entities\Models\Service', 'slug', '-', true);
            }
            $service->service_description = $request->service_description;
            $service->service_description_fi = $request->service_description_fi;
            $service->meta_description = $request->meta_description;
            $service->meta_description_fi = $request->meta_description_fi;
            $service->service_price = $request->service_price;
            $service->status = $request->status;
            $service->created_at = Carbon::now();
            $service->created_by = Auth::guard('web')->id();
            $service->updated_at = Carbon::now();
            $service->save();

            Track::newTrack($service->service_title, 'New Service has been created');
            DB::commit();
            session()->flash('success', 'New Service has been created successfully !!');
            return redirect()->route('admin.services.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
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
        if (is_null($this->user) || !$this->user->can('service.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $service = Service::find($id);
        return view('service::backend.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('service.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $service = Service::find($id);
        return view('service::backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('service.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.index');
        }

        $request->validate([
            'service_title'  => 'required|max:100',
            'service_title_fi'  => 'required|max:100',
            'service_type'  => 'required|in:primary,secondary',
            'slug'  => 'required|max:100|unique:services,slug,' . $service->id,
            'service_price'  => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            $service->service_title = $request->service_title;
            $service->service_title_fi = $request->service_title_fi;
            $service->service_type = $request->service_type;
            $service->slug = $request->slug;
            $service->service_description = $request->service_description;
            $service->service_description_fi = $request->service_description_fi;
            $service->meta_description = $request->meta_description;
            $service->meta_description_fi = $request->meta_description_fi;
            $service->service_price = $request->service_price;
            $service->status = $request->status;

            $service->updated_by = Auth::guard('web')->id();
            $service->updated_at = Carbon::now();
            $service->save();

            Track::newTrack($service->service_title, 'Service has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Service has been updated successfully !!');
            return redirect()->route('admin.services.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.trashed');
        }
        $service->deleted_at = Carbon::now();
        $service->deleted_by = Auth::guard('web')->id();
        $service->status = 0;
        $service->save();

        session()->flash('success', 'Service has been deleted successfully as trashed !!');
        return redirect()->route('admin.services.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.trashed');
        }
        $service->deleted_at = null;
        $service->deleted_by = null;
        $service->save();

        session()->flash('success', 'Service has been revert back successfully !!');
        return redirect()->route('admin.services.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $service = Service::find($id);
        if (is_null($service)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.services.trashed');
        }

        $service->delete();

        session()->flash('success', 'Service has been deleted permanently !!');
        return redirect()->route('admin.services.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('service.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
