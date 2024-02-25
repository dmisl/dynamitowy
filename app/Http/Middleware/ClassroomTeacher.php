<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClassroomTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(User::find(Auth::user()->id)->teacher)
        {
            if(User::find(Auth::user()->id)->teacher->classroom)
            {
                return $next($request);
            } else
            {
                return redirect()->route('home.index');
            }
        } else
        {
            return redirect()->route('home.index');
        }
    }
}
