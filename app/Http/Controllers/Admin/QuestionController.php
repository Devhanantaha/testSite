<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Toastr;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->title = trans('admin.questions.list');
        $this->route = 'admin.questions';
        $this->view = 'admin.questions';
        $this->path = 'questions';
        $this->access = 'questions';
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-view', ['only' => ['show', 'index']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Faq::where(function($q) use ($request) {
            if ($request->question) {
                $q->where('question_ar', 'like', '%' . $request->question . '%')
                  ->orWhere('question_en', 'like', '%' . $request->question . '%');
            }
        })->latest()->get();
        return view($this->view.'.index', $data);
    }

    public function create()
    {
        $data['title'] = trans('admin.questions.add');
        $data['route'] = $this->route;
        return view($this->view.'.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
            'answer_ar'   => 'required|string',
            'answer_en'   => 'required|string',
            'active'      => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Faq::create($request->only(['question_ar','question_en','answer_ar','answer_en','active']));
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.questions.index');
    }

    public function edit($id)
    {
        $data['row'] = Faq::findOrFail($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.questions.edit');
        return view($this->view.'.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
            'answer_ar'   => 'required|string',
            'answer_en'   => 'required|string',
            'active'      => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $faq = Faq::findOrFail($id);
        $faq->update($request->only(['question_ar','question_en','answer_ar','answer_en','active']));
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.questions.index');
    }

    public function destroy(Request $request)
    {
        $faq = Faq::findOrFail($request->id);
        $faq->delete();
        Toastr::success(__('admin.msg_delete_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route.'.index');
    }
}
