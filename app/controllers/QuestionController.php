<?php

class QuestionController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
       
        $questions = Question::select('id','question')->orderByRaw("RAND()")->take(10)->get();
    
        foreach ($questions as $question) {
            $answers = Answer::select('id','question_id','answer')->where('question_id','=',$question->id)->get();
            $question['answers'] = $answers;            
        }
        
        echo $questions;
    }

    
    public function complete($userId) {

        $answersArray = Request::get('answersArray');
        
        $count = Answer::select('id','question_id')->whereIn('id',$answersArray)->where('is_correct','=',1)->count();
        
        return Response::json(array("correctAnswers"=>$count)); 
    }
    
    public function show($id) {


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
