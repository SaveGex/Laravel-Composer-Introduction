<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function GetAllComments()
    {
        return Comment::all();
    }

    public function GetComment($id){
        return Comment::find($id);
    }
}
