<?php

namespace App\Http\Controllers\Api;

use App\Repositories\GuestRepository;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\VisitorRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;

class HomeController extends ApiController
{
    protected $user;
    protected $visitor;
    protected $article;
    protected $comment;
    protected $guest;

    public function __construct(
        UserRepository $user,
        VisitorRepository $visitor,
        ArticleRepository $article,
        CommentRepository $comment,
        GuestRepository $guest)
    {
        $this->user = $user;
        $this->visitor = $visitor;
        $this->article = $article;
        $this->comment = $comment;
        $this->guest = $guest;
    }

    public function storeGuest(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'ip' => $request->ip()
        ];

        $this->guest->store($data);

        return $this->respondWithArray($data);
    }

    public function statistics()
    {
        $users = $this->user->getNumber();
        $visitors = (int) $this->visitor->getAllClicks();
        $articles = $this->article->getNumber();
        $comments = $this->comment->getNumber();

        $data = compact('users', 'visitors', 'articles', 'comments');

        return $this->respondWithArray($data);
    }

}
