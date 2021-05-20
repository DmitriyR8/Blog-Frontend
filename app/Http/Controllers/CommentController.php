<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @var CommentRepositoryInterface
     */
    protected $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param Request $request
     * @return array|JsonResponse
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email',
            'rating' => 'required',
            'title' => 'required',
            'comment_body' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }

        $createComment = $this->commentRepository->createComment($input);

        return $createComment;
    }
}
