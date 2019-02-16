<?php

namespace App\Acme\Services;

use App\Acme\Models\Comment;
use App\Acme\Resources\CommentResource;
use App\Acme\Traits\ApiResponseTrait;

class CommentService extends ApiServices
{
    use ApiResponseTrait;

    public function getComments($input, $user)
    {
        $comments = Comment::where('post_id', $input['post_id'])->get();
        return CommentResource::collection($comments);
    }

    public function createComment($input, $user)
    {
        $input['user_id'] = $user->id;
        $comment = Comment::create($input);
        return new CommentResource($comment);
    }

    public function updateComment($input, $user)
    {
        $comment = Comment::where('id', $input['id'])->firstOrFail();

        if (!$user->can('updateComment', $comment)) {
            return $this->respondWithNotAllowed();
        }

        $comment->update($input);
        return new CommentResource($comment);
    }

    public function getComment($input, $user)
    {
        $comment = Comment::where('id', $input['id'])->firstOrFail();
        return new CommentResource($comment);
    }

    public function destroyComment($input, $user)
    {
        $comment = Comment::where('id', $input['id'])->firstOrFail();
        if (!$user->can('deleteComment', $comment)) {
            return $this->respondWithNotAllowed();
        }
        $comment->delete();
    }
}