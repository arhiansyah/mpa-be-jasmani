<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupTrainingRequest;
use App\Models\GroupTraining;
use App\Models\Training;
use App\Repositories\GroupTrainingRepositoryInterface;
use App\Service\Module\GroupTrainingService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $groupTraining;


    public function __construct(GroupTrainingRepositoryInterface $groupTrainingRepo)
    {
        $this->groupTraining = $groupTrainingRepo;
    }

    public function index()
    {
        $groupTraining = $this->groupTraining->getAll();
        return view('admin.module.group-training.index', compact('groupTraining'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training = Training::get();
        return view('admin.module.group-training.create', compact('training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupTrainingRequest $request)
    {
        $input = $request->validated();

        $uploadImage = new GroupTrainingService();

        //upload icon
        if ($request->hasFile('icon')) {
            $input['icon'] = $uploadImage->storeIconGroupTraining($request);
        }

        //upload cover
        if ($request->hasFile('cover')) {
            $input['cover'] = $uploadImage->storeCoverGroupTraining($request);
        }

        //create
        $groupTraining = $this->groupTraining->create($input);
        $this->groupTraining->attachTraining($groupTraining->id, $request['training']);
        return redirect()->route('group-training.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupTraining = $this->groupTraining->getById($id);
        return view('admin.module.group-training.show', compact('groupTraining'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::get();
        $groupTraining = $this->groupTraining->getById($id);
        $data = [
            'training' => $training,
            'groupTraining' => $groupTraining
        ];
        // dd($training->exercise[5]->name);
        return view('admin.module.group-training.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupTrainingRequest $request, $id)
    {
        // dd($request->hasFile('icon'));
        $input = $request->validated();

        $uploadImage = new GroupTrainingService();

        //upload icon
        if ($request->hasFile('icon')) {
            $input['icon'] = $uploadImage->updateIconGroupTraining($request, $id);
        }

        //upload cover
        if ($request->hasFile('cover')) {
            $input['cover'] = $uploadImage->updateCoverGroupTraining($request, $id);
        }

        //create
        $groupTraining = $this->groupTraining->edit($id, $input);
        $this->groupTraining->syncTraining($groupTraining->id, $request['training']);
        return redirect()->route('group-training.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $groupTraining = GroupTraining::find($id);
            $this->groupTraining->delete($id);
            Storage::disk('public')->delete($groupTraining->icon);
            Storage::disk('public')->delete($groupTraining->cover);
        } catch (QueryException $e) {
            //throw $th;
            dd($e);
        }
        return redirect()->route('group-training.index');
    }
}
