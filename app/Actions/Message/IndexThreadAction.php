<?php

namespace App\Actions\Message;

use App\Models\Thread;
use App\DataTransfer\Message\IndexThreadData;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexThreadAction {

    private $query;

    public function __construct()
    {
        $this->query = Thread::query();
    }

    public function __invoke(IndexThreadData $data) : LengthAwarePaginator
    {
        $this->query->whereHas('users', function($q) use($data){
            $q->where('users.id', $data->user->id);
        });

        $this->searchByTerm($data);

        return $this->query->paginate(2);
    }

    private function searchByTerm(IndexThreadData $data) : void
    {
        if(!$data->term)
        {
            return;
        }

        $this->query->where('title', 'LIKE', '%' . $data->term . '%');
    }
}