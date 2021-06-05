<?php

namespace Modules\Service\Http\Controllers;

use App\Models\Track;
use App\Repositories\TermRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Service\Entities\Models\Location;
use Modules\Service\Entities\Models\ServiceLocation;
use Yajra\DataTables\Facades\DataTables;

class ServiceLocationController extends Controller
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

        if ( is_null($this->user) || ! $this->user->can('location.view') ) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $locations = ServiceLocation::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $locations = ServiceLocation::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($locations, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Location Details" href="' . route('admin.locations.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.locations.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1" title="Edit Location Details" href="' . route('admin.locations.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.locations.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.locations.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Location Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Location will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Location will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Location will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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

                ->editColumn('location_name', function ($row) {
                    return $row->location_name;
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
            $rawColumns = ['action', 'location_name', 'status'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_locations = count(ServiceLocation::select('id')->get());
        $count_active_locations = count(ServiceLocation::select('id')->where('status', 1)->get());
        $count_trashed_locations = count(ServiceLocation::select('id')->where('deleted_at', '!=', null)->get());
        return view('service::backend.locations.index', compact('count_locations', 'count_active_locations', 'count_trashed_locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('location.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        return view('service::backend.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('location.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'location_name'  => 'required|max:100',
            'location_name_fi'  => 'required|max:100',
        ]);

        try {
            DB::beginTransaction();
            $location = new ServiceLocation();
            $location->location_name = $request->location_name;
            $location->location_name_fi = $request->location_name_fi;
            $location->status = $request->status;
            $location->created_at = Carbon::now();
            $location->created_by = Auth::guard('web')->id();
            $location->updated_at = Carbon::now();
            $location->save();

            Track::newTrack($location->location_name, 'New Location has been created');
            DB::commit();
            session()->flash('success', 'New Location has been created successfully !!');
            return redirect()->route('admin.locations.index');
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
        if (is_null($this->user) || !$this->user->can('location.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $location = ServiceLocation::find($id);
        return view('service::backend.locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('location.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $location = ServiceLocation::find($id);
        return view('service::backend.locations.edit', compact('location'));
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
        if (is_null($this->user) || !$this->user->can('location.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $location = ServiceLocation::find($id);
        if (is_null($location)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.locations.index');
        }

        $request->validate([
            'location_name'  => 'required|max:100',
            'location_name_fi'  => 'required|max:100',
        ]);

        try {
            DB::beginTransaction();
            $location->location_name = $request->location_name;
            $location->location_name_fi = $request->location_name_fi;
            $location->status = $request->status;

            $location->updated_by = Auth::guard('web')->id();
            $location->updated_at = Carbon::now();
            $location->save();

            Track::newTrack($location->location_name, 'Location has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Page has been updated successfully !!');
            return redirect()->route('admin.locations.index');
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
        if (is_null($this->user) || !$this->user->can('location.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $location = ServiceLocation::find($id);
        if (is_null($location)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.locations.trashed');
        }
        $location->deleted_at = Carbon::now();
        $location->deleted_by = Auth::guard('web')->id();
        $location->status = 0;
        $location->save();

        session()->flash('success', 'Location has been deleted successfully as trashed !!');
        return redirect()->route('admin.locations.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('location.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $location = ServiceLocation::find($id);
        if (is_null($location)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.locations.trashed');
        }
        $location->deleted_at = null;
        $location->deleted_by = null;
        $location->save();

        session()->flash('success', 'Location has been revert back successfully !!');
        return redirect()->route('admin.locations.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('location.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $location = ServiceLocation::find($id);
        if (is_null($location)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.locations.trashed');
        }

        $location->delete();

        session()->flash('success', 'Location has been deleted permanently !!');
        return redirect()->route('admin.locations.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('location.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
