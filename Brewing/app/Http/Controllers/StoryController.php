<?php

namespace App\Http\Controllers;

use App\Models\StoryCategory;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    private $storyService;

    public function __construct()
    {

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

    function store()
    {

    }
}
