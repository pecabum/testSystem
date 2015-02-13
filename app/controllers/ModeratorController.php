<?php

class ModeratorController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('cms.login_teacher');
    }

    // User login
    public function login() {
        $data = Input::all();

        $validator = Validator::make($data, array(
                    'username' => 'required|min:4',
                    'password' => 'required|min:4'
        ));

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $moderator = Moderator::where('username', '=', Input::get('username'))->where('password', '=', Input::get('password'))->first();
            if (!is_null($moderator)) {
                return View::make('admin')->withModerator($moderator);
            }
        }
    }

    public function getAllQuestions() {
        $questions = Question::all();

        foreach ($questions as $question) {
            $answers = Answer::select('id', 'question_id', 'answer')->where('question_id', '=', $question->id)->get();
            $question['answers'] = $answers;
        }
        
        return View::make('cms.questions')->withQuestions($questions->toArray());
    }
    
    
     public function getAllStudents() {
        $users = User::all();

        return View::make('cms.students')->withUsers($users->toArray());
    }

}
