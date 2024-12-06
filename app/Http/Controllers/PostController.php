<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get(); // Только категории пользователя
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'physical_properties' => 'nullable|string',
            'price' => 'nullable|numeric',
            'delivery_conditions' => 'nullable|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(), // Устанавливаем текущего пользователя как автора
            'physical_properties' => $request->physical_properties,
            'price' => $request->price,
            'delivery_conditions' => $request->delivery_conditions,
        ]);

        return redirect()->route('posts.index');
    }

    // Добавьте другие методы (edit, update, destroy) по аналогии.
}