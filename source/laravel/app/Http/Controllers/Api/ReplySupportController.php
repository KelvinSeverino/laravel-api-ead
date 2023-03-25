<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Repositories\ReplySupportRepository;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportController extends Controller
{
    use RepositoryTrait;

    protected $repository;

    public function __construct(ReplySupportRepository $replySupportRepository)
    {
        //Criando instancia da ReplySupportRepository
        $this->repository = $replySupportRepository;
    }

    public function createReply(StoreReplySupport $request)
    {
        $reply = $this->repository->createReplyToSupport($request->validated());

        return new ReplySupportResource($reply);
    }
}
