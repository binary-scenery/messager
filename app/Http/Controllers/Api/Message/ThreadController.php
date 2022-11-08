<?php

namespace App\Http\Controllers\Api\Message;

use App\Models\Thread;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Actions\Message\IndexThreadAction;
use App\Actions\Message\CreateThreadAction;
use App\Actions\Message\UpdateThreadAction;
use App\DataTransfer\Message\IndexThreadData;
use App\DataTransfer\Message\CreateThreadData;
use App\DataTransfer\Message\UpdateThreadData;
use App\Http\Resources\Message\ThreadResource;
use App\Http\Requests\Api\Message\IndexThreadRequest;
use App\Http\Requests\Api\Message\StoreThreadRequest;
use App\Http\Requests\Api\Message\UpdateThreadRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ThreadController extends Controller
{
    public function index(
        IndexThreadAction $indexThreadAction,
        IndexThreadRequest $request
    ) : AnonymousResourceCollection
    {
        $threads = $indexThreadAction(new IndexThreadData($request->user(), ...$request->validated()));
        return ThreadResource::collection($threads);
    }

    public function store(
        CreateThreadAction $createThreadAction,
        StoreThreadRequest $request
    ) : ThreadResource
    {
        $thread = $createThreadAction(new CreateThreadData($request->user(), ...$request->validated()));
        return new ThreadResource($thread);
    }

    public function update(
        UpdateThreadAction $updateThreadAction,
        UpdateThreadRequest $request,
        Thread $thread
    ) : ThreadResource
    {
        $updateThreadAction(new UpdateThreadData($thread, ...$request->validated()));
        return new ThreadResource($thread);
    }

    public function delete(Thread $thread) : JsonResponse
    {
        $thread->delete();

        return new JsonResponse([
            'data' => [
                'message' => 'Message Deleted'
            ]],
            Response::HTTP_OK
        );
    }

}