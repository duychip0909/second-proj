<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Models\StoryCategory;
use App\Services\Interfaces\IStory;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    private $storyService;

    public function __construct(IStory $storyService)
    {
        $this->storyService = $storyService;
    }

    function manage()
    {

    }

    function create()
    {
        $form_options = [
            'action' => route('story.store'),
            'method' => 'post',
            'title' => 'Story Create Form'
        ];

        $categories = StoryCategory::all();

        return view('layouts.admin.Story.story-form', compact('form_options', 'categories'));
    }

    function store(StoryRequest $request)
    {
        $validated = $request->validated();
        $validated['alias'] = 'hom nay la 1 ngay dep';
        $record = $this->storyService->store($validated);
        if ($record) {
            return redirect()->route('story.manage');
        }
        return back();
    }
}
