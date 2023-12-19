<?php


namespace App\Modules\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use ErrorException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        App::setLocale('kh');
    }

    public function index()
    {
        return view('admin.pages.components.login');
    }

    /**
     * Logs in a user.
     *
     * @param Request $req the request object containing the user's login information
     * @throws \Exception if an error occurs during the login process
     * @return string the name of the dashboard page
     */
    public function login(LoginReq $req)
    {
        $data = $req->validated();

        try {
            $user = AuthService::login($data['email'], $data['password']);
            Auth::login($user);

            return 'Dashboard';
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function showRegistrationForm()
    {
        return view('admin.pages.components.register');
    }

    /**
     * Registers a new user.
     *
     * @param CreateUserReq $req The request object containing user registration data.
     * @throws \Exception If user registration fails.
     * @return \Illuminate\Http\RedirectResponse Returns a redirect response with a success message if user registration is successful, or an error message if registration fails.
     */
    public function register(CreateUserReq $req)
    {
        try {
            $data = $req->validated();
            $data['password'] = bcrypt($data['password']);
            $user = AuthService::create($data);

            // Flash success message to the session
            return redirect()->back()->with('success', 'User registration successful')->with('user', $user);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Handle an exception.
     *
     * @param \Exception $e The exception to handle.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    protected function handleException(\Exception $e)
    {
        if ($e instanceof QueryException) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } elseif ($e instanceof ErrorException) {
            return redirect()->back()->with('error', 'Error exception: ' . $e->getMessage());
        }

        // Default handling for other exceptions
        return redirect()->back()->with('error', 'User registration failed. Please try again later.');
    }



}
