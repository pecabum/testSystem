<?php

class QuestionController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public $questionCount = 20;
    
    
    public function index() {
       
        $questions = Question::select('id','question')->orderByRaw("RAND()")->take($this->questionCount)->get();
    
        foreach ($questions as $question) {
            $answers = Answer::select('id','question_id','answer')->where('question_id','=',$question->id)->get();
            $question['answers'] = $answers;            
        }
        
        echo $questions;
    }

    
    public function complete($userId) {

        $answers = Input::get('answersArray');//get('answersArray');

        $answersArray = explode(',', $answers); 
//        var_dump($answersArray);exit;        
        $count = Answer::select('id','question_id')->whereIn('id',$answersArray)->where('is_correct','=',1)->count();
        
        $user = User::find(intval($userId));
        $user->points = $count;
        $user->save();
        
        return View::make('questions.test_result')->withCorrect($count)->withCount($this->questionCount); 
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
