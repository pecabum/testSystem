<?php

class ModeratorController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('cms.students');
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
                 return View::make('cms.students')->withModerator($moderator);
            }
        }
    }

}
