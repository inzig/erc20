<?php

namespace BCES\Http\Middleware;

use BCES\Concerns\RunCpa;
use Closure;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if ($request->has('track_id'))
            RunCpa::getInstance()->captureRequest($request->get('track_id'));

        if ($request->has('click_id'))
            setcookie('cryptocpa_click_id', $request->get('click_id'), time() + 60 * 60 * 24 * 30);

        if ($request->has('actionpay')) {
            setcookie('actionpay', $request->get('actionpay'), time() + 60 * 60 * 24 * 30);
            setcookie('utm_source', $request->get('utm_source'), time() + 60 * 60 * 24 * 30);
            setcookie('utm_medium', $request->get('utm_medium'), time() + 60 * 60 * 24 * 30);
            setcookie('utm_campaign', $request->get('utm_campaign'), time() + 60 * 60 * 24 * 30);
        }

        if (!array_key_exists($locale, config('app.locales'))) {
            $segments = collect($request->segments());

            if (\Route::has($segments->first()))
                $segments->prepend(config('app.fallback_locale'));
            elseif ($segments->count() == 0)
                $segments->push(config('app.fallback_locale'));
            else
                throw new NotFoundHttpException();

            return redirect()->to($segments->implode('/'), Response::HTTP_MOVED_PERMANENTLY);
        }

        \App::setLocale($locale);

        return $next($request);
    }
}
