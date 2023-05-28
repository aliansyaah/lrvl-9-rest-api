<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Http\Request;

class CommentOwner
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
        $userId = auth()->user()->id;
        $comment = Comment::findOrFail($request->id);

        if ($comment->user_id != $userId) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        return $next($request);
    }
}
