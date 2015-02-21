<?php

class ApiController extends \BaseController {


	// Gettng all questions for the test
	public function index() {

		$questions = Question::select('id','question')->orderByRaw("RAND()")->take(20)->get();

		foreach ($questions as $question) {
			$answers = Answer::select('id','question_id','answer')->where('question_id','=',$question->id)->get();
			$question['answers'] = $answers;            
		}

		echo $questions;
	}


// Login register
	public function login() {
		$data = Input::all();
		$validator = Validator::make($data, array(
			'name' => 'required|min:4',
			'fakNom' => 'required|min:8'
			));

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		} else {
			$user = User::where('fak_nom', '=', Input::get('fakNom'))->first();
			if (is_null($user)) {
				$usr = new User;
				$usr->username = Input::get('name');
				$usr->fak_nom = Input::get('fakNom');

				if ($usr->save()) {
					return Response::json(array(
						"HTTP_CODE" => 200,
						"user" => $usr
					));
				}
			} else {
				return Response::json(array(
					"HTTP_CODE" => 303,
					"message"	=> "You already fill the test"
				));
			}
		}
	}

	// Complete the test
	public function completeToJson($userId) {
             $answers = Input::get('answersArray');//get('answersArray');

             $answersArray = explode(',', $answers); 

             $count = Answer::select('id','question_id')->whereIn('id',$answersArray)->where('is_correct','=',1)->count();

             $user = User::find(intval($userId));
             $user->points = $count;
             $user->save();
             $json = array(
             	"HTTP_CODE" =>200,
             	"correct" => $count
             	);
             return Response::json($json);          
         }



     }
