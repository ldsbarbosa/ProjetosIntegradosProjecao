<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $metodo = $request->server->get('REQUEST_METHOD');
        $rota = substr($request->getRequestUri(), 1, 60);
        LogAcesso::create(['log' => "IP $ip - Rota $rota - Método $metodo"]);
        return $next($request);
    }
}
