<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryCategory;
use App\Services\Interfaces\IStoryCategory;

class StoryCategoryController extends Controller
{
    private IStoryCategory $storyCategoryService;

    public function __construct(IStoryCategory $storyCategoryService)
    {
        $this->storyCategoryService = $storyCategoryService;
    }

    function getAll()
    {
        return $this->storyCategoryService->getAll();
    }

    function findById($id)
    {
        return $this->storyCategoryService->findById($id);
    }

    function manage()
    {
        $records = $this->getAll();
        return view('story-category-manage', compact('records'));
    }

    function delete($id)
    {
        $this->storyCategoryService->delete($id);
        return redirect()->route('story-category.manage');
    }

    function create()
    {
        $form_options = [
            'action' => route('story-category.store'),
            'method' => 'post',
            'title' => 'Story Category Create Form'
        ];
        return view('story-category-form', compact('form_options'));
    }

    function edit($id)
    {
        $record = $this->findById($id);
        $form_options = [
            'action' => route('story-category.update', ['id' => $record->id]),
            'method' => 'post',
            'title' => 'Story Category Edit Form'
        ];
        return view('story-category-form', compact('form_options', 'record'));
    }

    function store(StoryCategory $request)
    {
        $validated = $request->validated();
        $record = $this->storyCategoryService->store($validated);
        if (isset($record)) {
            return redirect()->route('story-category.manage');
        } else {
            return back();
        }
    }

    function update(StoryCategory $request, $id)
    {
        $validated = $request->validated();
        $record = $this->storyCategoryService->update($validated, $id);
        if (isset($record)) {
            return redirect()->route('story-category.manage');
        } else {
            return back();
        }
    }
}
