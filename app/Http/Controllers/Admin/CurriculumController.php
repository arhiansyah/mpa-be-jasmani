<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurriculumRequest;
use App\Models\Curriculum;
use App\Models\Subject;
use App\Repositories\CurriculumRepositoryInterface;
use App\Service\Module\CurriculumService;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{

    protected $curriculum;

    public function __construct(CurriculumRepositoryInterface $curriculumRepo)
    {
        $this->curriculum = $curriculumRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculum = $this->curriculum->getAll();
        // dd($curriculum);
        return view('admin.module.curriculum.index', compact('curriculum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::get();
        return view('admin.module.curriculum.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurriculumRequest $request)
    {
        // dd($request->all());
        // dd($request->hasFile('icon'));
        $input = $request->validated();
        $uploadImage = new CurriculumService();

        //upload icon
        if($request->hasFile('icon')){
            $input['icon'] = $uploadImage->storeIconCurriculum($request);
        }

        //upload cover
        if($request->hasFile('cover')){
            $input['cover'] = $uploadImage->storeCoverCurriculum($request);
        }

        //create
        $curriculum = $this->curriculum->create($input);
        $this->curriculum->attachSubject($curriculum->id, $request['subject']);
        // $curriculum->subject()->attach($request['subject']);

        return redirect()->route('curriculum.index')->with('success', __('general.add_data_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curriculum = $this->curriculum->getById($id);
        return view('admin.module.curriculum.show', compact('curriculum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::get();
        $curriculum = Curriculum::find($id);
        $data = [
            'subject' => $subject,
            'curriculum' => $curriculum
        ];
        return view('admin.module.curriculum.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurriculumRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->curriculum->delete($id);
        return redirect()->route('curriculum.index');
    }
}
