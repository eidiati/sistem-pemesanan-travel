<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(Auth::check() && Auth::user()->id_role === 1){ 
    //         return $next($request);
    //     }    
    //     abort(401);
    // }

        // Cek apakah pengguna terautentikasi
        // if (Auth::check()) {
        //     // Cek peran pengguna
        //     if (Auth::user()->id_role === '1') {
        //         return $next($request); // Melanjutkan ke request berikutnya
        //     }
        // }

        // Mengembalikan respons 401 jika tidak terautentikasi atau tidak memiliki peran yang sesuai
        
        // $jenis_user = null;
        // if(Auth::guard('admin')->check()){
        //     $jenis_user = 'admin';
        //     $user_id = Auth::guard('admin')->user()->id;
        // } else if(Auth::guard('driver')->check()){
            //     $jenis_user = 'driver';
            //     $user_id = Auth::guard('driver')->user()->id;
            // } else if(Auth::guard('user')->check()){
        //     $jenis_user = 'user';
        //     $user_id = Auth::guard('user')->user()->id;
        // }

        // if($jenis_user == null){
        //     $request->merge(['user_id' => $user_id]);
        //     return next($request);
        // }
        // return redirect()->route($jenis_user);
        public function handle(Request $request, Closure $next, ...$roles): Response
        {
            if (Auth::check() && in_array(Auth::user()->id_role, $roles)) {
                return $next($request);
            }
            
            abort(401); // Unauthorized
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        

}
