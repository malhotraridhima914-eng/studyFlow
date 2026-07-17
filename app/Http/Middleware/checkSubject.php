<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\addSub;

class checkSubject
{

    public function handle(Request $request, Closure $next): Response
    {
        if(addSub::count()==0){
            return redirect('/sub')
            ->with('error','Please add a Subject first.');
        }
        return $next($request);
    }
}
