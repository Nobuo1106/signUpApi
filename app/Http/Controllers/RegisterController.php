<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Symfony\Component\HttpFoundation\Response;
// UUIDライブラリ
use Ramsey\Uuid\Uuid;
// Activationモデル
use App\Activation;

class RegisterController extends Controller {
  public function register(Request $request) {
    $activation = new Activation;
    $activation->email = $request->email;
    $activation->code = Uuid::uuid4();
    $activation->save();
    $json = [
        'data' => $activation,
        'message' => 'User registration completed',
        'error' => ''
    ];
    return response()->json( $json, Response::HTTP_OK);
  }
}
