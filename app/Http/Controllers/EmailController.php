<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\EmailRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EmailController
 * @package App\Http\Controllers
 */
class EmailController extends Controller
{
    /**
     * @var EmailRepositoryInterface
     */
    protected $emailRepository;

    /**
     * EmailController constructor.
     * @param EmailRepositoryInterface $emailRepository
     */
    public function __construct(EmailRepositoryInterface $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|email|regex:/^([a-z0-9]+[._-]){0,}?[a-z0-9]+@[a-z0-9]+[.]{1}[a-z]{2,4}$/i',
            'action' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->messages(),
                'status' => Response::HTTP_BAD_REQUEST
            ]);
        }

        $createEmail = $this->emailRepository->createEmail($input);

        return $createEmail;
    }
}
