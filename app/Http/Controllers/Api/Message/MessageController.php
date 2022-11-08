<?php

namespace App\Http\Controllers\Api\Message;

use App\Models\Thread;
use App\Models\Message;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Actions\Message\IndexMessageAction;
use App\Actions\Message\CreateMessageAction;
use App\Actions\Message\UpdateMessageAction;
use App\DataTransfer\Message\IndexMessageData;
use App\DataTransfer\Message\CreateMessageData;
use App\DataTransfer\Message\UpdateMessageData;
use App\Http\Resources\Message\MessageResource;
use App\Http\Requests\Api\Message\IndexMessageRequest;
use App\Http\Requests\Api\Message\StoreMessageRequest;
use App\Http\Requests\Api\Message\UpdateMessageRequest;

class MessageController extends Controller
{
    public function index(
        IndexMessageAction $indexMessageAction,
        IndexMessageRequest $request,
        Thread $thread
    )
    {
        $messages = $indexMessageAction(new IndexMessageData($thread, ...$request->validated()));
        return MessageResource::collection($messages);
    }

    public function store(
        Thread $thread,
        CreateMessageAction $createMessageAction,
        StoreMessageRequest $request
    )
    {
        $message = $createMessageAction(new CreateMessageData($thread, $request->user(), ...$request->validated()));
        return new MessageResource($message);
    }

    public function update(
        UpdateMessageAction $updateMessageAction,
        UpdateMessageRequest $request,
        Message $message
    ) : MessageResource
    {
        $updateMessageAction(new UpdateMessageData($message, ...$request->validated()));
        return new MessageResource($message);
    }

    public function delete(Message $message) : JsonResponse
    {
        $message->delete();

        return new JsonResponse([
            'data' => [
                'message' => 'Message Deleted'
            ]],
            Response::HTTP_OK
        );
    }
}
