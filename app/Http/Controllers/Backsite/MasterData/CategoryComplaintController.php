<?php

namespace App\Http\Controllers\Backsite\MasterData;

use App\Http\Controllers\Controller;

use App\Http\Requests\Backsite\MasterData\StoreCategoryComplaintRequest;
use App\Http\Requests\Backsite\MasterData\UpdateCategoryComplaintRequest;

use App\Models\MasterData\CategoryComplaint;

use Illuminate\Http\Request;

use Gate;

use Symfony\Component\HttpFoundation\Response;

class CategoryComplaintController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('category_complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_complaint = CategoryComplaint::orderBy('created_at', 'desc')->paginate(500);

        return view('pages.backsite.master-data.category-complaint.index', compact('category_complaint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryComplaintRequest $request)
    {
        $data = $request->all();

        CategoryComplaint::create($data);

        alert()->success('Success Message', 'Save data has been success');
        return redirect()->route('backsite.category_complaint.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryComplaint $category_complaint)
    {
        abort_if(Gate::denies('category_complaint_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.category-complaint.show', compact('category_complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryComplaint $category_complaint)
    {
        abort_if(Gate::denies('category_complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.category-complaint.edit', compact('category_complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryComplaintRequest $request, CategoryComplaint $category_complaint)
    {
        $data = $request->all();

        $category_complaint->update($data);

        alert()->success('Success Message', 'Update data has been success');
        return redirect()->route('backsite.category_complaint.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryComplaint $category_complaint)
    {
        abort_if(Gate::denies('category_complaint_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_complaint->delete();

        alert()->success('Success Message', 'Delete data has been success');
        return back();
    }
}
