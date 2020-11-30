<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Laravel\Lumen\Http\Request;
use Validator;

class AuthController extends Controller
{
    private $bearerToken;

    public function __construct()
    {
        // Unique Token
        $this->bearerToken = uniqid(base64_encode(Str::random(60)));
    }

    public function getLogin() {
        return view('auth.login');
    }

    /**
     * Client Login
     * @return JsonResponse
     */
    public function postLogin()
    {
        // Validations
        $rules = [
            'email'=>'required|email',
            'password'=>'required|min:8'
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            // Validation failed
            return response()->json([
                'message' => $validator->messages(),
            ]);
        } else {
            // Fetch User
            $user = User::where('email',request('email'))->first();
            if($user) {
                // Verify the password
                if( password_verify(request('password'), $user->password) ) {
                    // Update Token
                    $postArray = ['api_token' => $this->bearerToken];
                    $login = User::where('email',request('email'))->update($postArray);

                    if($login) {
                        return redirect()->json([
                            'name'         => $user->name,
                            'email'        => $user->email,
                            'access_token' => $this->bearerToken,
                        ]);
                    }
                } else {
                    return response()->json([
                        'message' => 'Invalid Password',
                    ]);
                }
            } else {
                return response()->json([
                    'message' => 'User not found',
                ]);
            }
        }
    }

    /**
     * Logout
     * @return JsonResponse
     */
    public function postLogout()
    {
        $token = request()->header('Authorization');
        $user = User::where('api_token',$token)->first();
        if($user) {
            $postArray = ['api_token' => null];
            $logout = User::where('id',$user->id)->update($postArray);
            if($logout) {
                return response()->json([
                    'message' => 'User Logged Out',
                ]);
            }
        } else {
            return response()->json([
                'message' => 'User not found',
            ]);
        }
    }

}
