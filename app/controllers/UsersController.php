<?php

class UsersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('users.login_student');
    }

    // User login
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
                    return View::make('users.index')->withUser($usr);
                }
            } else {
                return View::make('users.login_student_failed');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
