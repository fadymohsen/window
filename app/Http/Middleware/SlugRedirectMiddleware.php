<?php

namespace App\Http\Middleware;

use App\Models\SlugRedirect;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlugRedirectMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path();

        // Match patterns like {locale}/blogs/{slug} or blogs/{slug}
        if (preg_match('#(?:^|/)blogs/([^/]+)$#', $path, $matches)) {
            $slug = $matches[1];
            $redirect = SlugRedirect::where('from_slug', $slug)->where('type', 'blog')->first();
            if ($redirect) {
                $newPath = str_replace("blogs/{$slug}", "blogs/{$redirect->to_slug}", $path);
                return redirect($newPath, 301);
            }
        }

        if (preg_match('#(?:^|/)services/([^/]+)$#', $path, $matches)) {
            $slug = $matches[1];
            $redirect = SlugRedirect::where('from_slug', $slug)->where('type', 'service')->first();
            if ($redirect) {
                $newPath = str_replace("services/{$slug}", "services/{$redirect->to_slug}", $path);
                return redirect($newPath, 301);
            }
        }

        return $next($request);
    }
}
