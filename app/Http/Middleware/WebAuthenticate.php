<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class WebAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->session()->get('token');
        if (!$token) {
            
            return redirect()->route('login.page');
        }

        // cek token is valid
        $response = Http::withToken($token)->get('http://localhost:3000/api/me');
        if ($response->status() == 401) {
            $request->session()->flush();
            return redirect()->route('login.page');
        }elseif ($response->status() == 200) {
            $user = json_decode($response->body(), true);
            $request->session()->put('user', $user);
        } elseif ($response->status() != 200) {
            return redirect()->route('dashboard');
        }else {
            return redirect()->route('login.page');
        }

        return $next($request);
    }
}
