<?php

namespace App\Actions\Message;

use App\Models\Message;
use App\DataTransfer\Message\IndexMessageData;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexMessageAction {

    private $query;

    public function __construct()
    {
        $this->query = Message::query();
    }

    public function __invoke(IndexMessageData $data) : LengthAwarePaginator
    {
        $this->query->where('thread_id', $data->thread->id);

        $this->searchByTerm($data);

        return $this->query->paginate(2);
    }

    private function searchByTerm(IndexMessageData $data) : void
    {
        if(!$data->term)
        {
            return;
        }

        $this->query->where('message', 'LIKE', '%' . $data->term . '%');
    }
}