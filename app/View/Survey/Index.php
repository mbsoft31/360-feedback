<?php

namespace App\View\Survey;

use App\Models\Survey;
use Livewire\Component;

class Index extends Component
{

    public $create_modal;
    public $edit_modal;
    public $delete_modal;

    public $title;
    public $description;
    public $meta = [];

    public $survey;

    protected $listeners = [
        "editSurvey",
        "deleteSurvey"
    ];

    protected $rules=[
        'title' => ['required', 'string', 'min:3', 'unique:surveys,title'],
        'description' => ['nullable', 'string', 'max:190'],
        'meta' => ['nullable', 'array']
    ];

    public function openCreateModal()
    {
        $this->create_modal = true;
    }

    public function closeCreateModal()
    {
        $this->create_modal = false;
    }

    public function openEditModal()
    {
        $this->edit_modal = true;
    }

    public function closeEditModal()
    {
        $this->edit_modal = false;
    }

    public function openDeleteModal()
    {
        $this->delete_modal = true;
    }

    public function closeDeleteModal()
    {
        $this->delete_modal = false;
    }

    public function editSurvey(Survey $survey)
    {
        //dump($survey);
        $this->cancel();
        $this->survey = $survey;
        $this->openEditModal();
        $this->title = $survey->title;
        $this->description = $survey->description;
        $this->meta = $survey->meta;
    }

    public function deleteSurvey(Survey $survey)
    {
        $this->cancel();
        $this->openDeleteModal();
        $this->survey = $survey;
        $this->title = $survey->title;
        $this->description = $survey->description;
        $this->meta = $survey->meta;
    }

    public function save()
    {
        $inputs = $this->validate();
        $this->survey = Survey::create($inputs);
        $this->closeCreateModal();
    }

    public function edit()
    {
        //dump("edit");
        $inputs = $this->validate([
            'title' => ['required', 'string', 'min:3'],
            'description' => ['nullable', 'string', "max:190"],
            'meta' => ['nullable', 'array']
        ]);
        $this->survey->title = $inputs["title"];
        $this->survey->description = $inputs["description"];
        $this->survey->meta = $inputs["meta"];
        $updated = $this->survey->save();
        $this->closeEditModal();
    }

    public function delete()
    {
        $deleted = $this->survey->delete();
        $this->closeDeleteModal();
    }

    public function cancel()
    {
        $this->survey = null;
        $this->closeCreateModal();
        $this->closeEditModal();
        $this->closeDeleteModal();
    }

    public function mount()
    {
        $this->cancel();
    }

    public function render()
    {
        return view('survey.index',[
            "surveys" => Survey::all(),
        ]);
    }
}
