<?php

/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UserController extends Admin\AdminController {

    /**
     * Displays the form for account creation
     *
     */
    public function create()
    {
        $this->layout->content = View::make('users.signup');
    }

    /**
     * Stores new account
     *
     */
    public function store()
    {
        $user = new User;

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'password_confirmation' ); 

        // Save if valid
        if ( $user->save() )
        {
            return Redirect::action('UserController@login');
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->getErrors()->all();

            return Redirect::action('UserController@create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Displays the login form
     *
     */
    public function login()
    {
        $this->layout->content = View::make('users.login');
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $input = array(
            'email' => Input::get( 'email' ),
            'password' => Input::get( 'password' ),
            'remamber' => Input::get( 'remember' ),
        );

        if ( Confide::logAttempt( $input ) ) 
        {
            return Redirect::action('Admin\PostsController@index');
        }
        else
        {
            $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            return Redirect::action('UserController@login')
                ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function confirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UserController@login')
                ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UserController@login')
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function forgot_password()
    {
        $this->layout->content = View::make('users.forgot_password');
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function reset_password()
    {
        if( Confide::resetPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UserController@login')
                ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UserController@forgot_password')
                ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Sign out action.
     *
     */
    public function logout()
    {
        Confide::logout();
        
        return Redirect::to('/');
    }

}
