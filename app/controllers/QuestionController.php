<?php

class QuestionController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $users = User::all();

        return View::make('users.index')->withUsers($users);
    }

    /*
     * Show information about the user
     */

    public function show($username) {

        $user = User::whereUsername($username)->first();

        return View::make('users.show')->withUser($user);
    }

    /**
     *  Open form for creating new Task
     */
    public function create() {

        return View::make('questions.create');
    }

    public function store() {
        $data = Input::all();
        $validation = Validator::make($data, ['question' => 'required', 'correct' => 'required']);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
       
//        echo '<pre>';
//        var_dump($data);exit;
            
        $question = new Question;

        $question->question = $data['question'];
        if($question->save()) {
            foreach ($data['answers'] as $key => $arrayAnswer) { 
                $answer = new Answer;
                
                $answer->answer = $arrayAnswer;
                $answer->question_id = $question->id;
                
                if((intval($data['correct'])-1) === $key) {
                    $answer->is_correct = 1;
                } else {
                    $answer->is_correct = 0;
                }
                
                $answer->save();
            }
        }
        return Redirect::route('questions.create');
    }

}
