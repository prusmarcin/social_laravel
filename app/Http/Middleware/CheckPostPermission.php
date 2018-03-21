<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Post;

class CheckPostPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $post_exists = POST::where([
            'id' => $request->post,
            'user_id' => Auth::id()
            ])->exists();
        
        //jesli uzytkownik jest nie jest zalogowany i post nie istnieje
        if( ! Auth::check() || ! $post_exists)
        {
            abort(403, 'Brak dostępu');
        }
        return $next($request);
    }
}
