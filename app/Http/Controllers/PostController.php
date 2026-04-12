<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller; // check middleware

class PostController extends Controller
{
    use AuthorizesRequests;
    // Cách 2: 
    public function __construct()
    {
        // dòng này để thay thế cho các $this->authorize() tại các function bên dưới
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny', Post::class); // cách 1
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $this->authorize('view', $post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        // $this->authorize('create', $post);
        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        // $this->authorize('create', $post);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        // $post = Post::create([
        //     ... $data,
        //     'user_id' => $request->user()->id,
        // ]);

        $post = $request->user()->posts()->create($data); // lấy từ user hiện tại đang đăng nhập -> post ở Models\User.php -> create

        return redirect()->route('posts.show', $post); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Bài 33: 
        // $this->authorize('update', $post);
        return view('posts.edit', compact('post'));

        // Bài 32:
        // return view('dash_post', ['post' => $post]);
        // // return view('dash_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Bài 33:
        // $this->authorize('update', $post);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);
        $post->update($data);
        return redirect()->route('posts.show', $post);

        // Bài 32:
        // $this->authorize('update', $post); // Larael sẽ tự động gọi phương thức update trong PostPolicy để kiểm tra quyền truy cập
        // // comment dòng trên để check ngay trong view
        // // $post->update($request->all());
        // return "Bài viết đã được cập nhật thành công!";
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
