<?php

namespace App\Http\Controllers\Api;

use App\Repositories\GuestRepository;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use App\Transformers\CommentTransformer;
use App\Notifications\ReceivedComment as Received;

class CommentController extends ApiController
{
    protected $comment;
    protected $guest;

    public function __construct(CommentRepository $comment, GuestRepository $guest)
    {
        parent::__construct();
        
        $this->guest = $guest;
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithPaginator($this->comment->page(), new CommentTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => Auth::user()->id
        ]);

        $comment = $this->comment->store($data);

        $comment->commentable->user->notify(new Received($comment));

        return $this->respondWithItem($comment, new CommentTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGuest(CommentRequest $request)
    {
        $data1 = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'ip' => $request->ip()
        ];

        $data2 = [
            'user_id' => \App\User::where('email', 'guest@clashofnerds.com')->value('id'),
            'commentable_id' => $request->get('commentable_id'),
            'commentable_type' => $request->get('commentable_type'),
            'content' => $request->get('content')
        ];

        $guest = $this->guest->store($data1);
        $comment = $this->comment->store($data2);

        return $this->respondWithItem($comment, new CommentTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $commentableId
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $commentableId)
    {
        $commentableType = $request->get('commentable_type');
        $comments = $this->comment->getByCommentable($commentableId, $commentableType);

        return $this->respondWithCollection($comments, new CommentTransformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->respondWithItem($this->comment->getById($id), new CommentTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $this->comment->update($id, $request->all());

        return $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->comment->getById($id));

        $this->comment->destroy($id);

        return $this->noContent();
    }
}
