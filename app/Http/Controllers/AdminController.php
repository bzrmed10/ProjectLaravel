<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\CommentReply;

class AdminController extends Controller
{
    public function index(){

        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();
        $repliesCount = CommentReply::count();

        return view('admin.index',compact('postsCount','categoriesCount','commentsCount','repliesCount'));
    }
}
