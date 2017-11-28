<?php

namespace App\Http\Controllers;

use App\User,
    Auth;
use Illuminate\Http\Request;
use Mockery\Exception;
use Socialite;

class socialController extends Controller
{
    public function redirectToProvider()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try{
            $socialuser = Socialite::driver('facebook')->fields([
                'name',
                'first_name',
                'last_name',
                'email',
            ])->user();
        }catch (Exception $e){
             return redirect('/');
        }
        $user =User::where('facebook_id',$socialuser->getId())->first();
        if(!$user){
            $data['email'] =$socialuser->getEmail();
            $data['name'] = $socialuser->getName();
            $data['facebook_id'] = $socialuser->getId();
           // print_r($data);exit();
            $use = User::create($data);
            $use->name=$socialuser->getName();
            $use->save();
            Auth::login($use);
            return redirect(route('shipForm',[Auth::id()]));
        }
        Auth::login($user);
        return redirect('/per_detail');

//        $user = Socialize::with('facebook')->user();
//               return $user->getEmail();

    }


    public function redirectToProvidergoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackgoogle()
    {
        try{
            $socialuser = Socialite::driver('google')->user();
        }catch (Exception $e){
            return redirect('/');
        }
        $user =User::where('facebook_id',$socialuser->getId())->first();
        if(!$user){
            $data{'email'} =$socialuser->getEmail();
            $data{'name'} = $socialuser->getName();
            $data{'facebook_id'} = $socialuser->getId();
            $use = User::create($data);
            $use->name=$socialuser->getName();
            $use->save();
            Auth::login($use);
            return redirect(route('shipForm',[Auth::id()]));
        }
        Auth::login($user);
        return redirect('/per_detail');


    }
}
