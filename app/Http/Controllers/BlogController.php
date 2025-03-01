<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function show ()
    {
        $blogs = Blog::latest()->paginate(10);

        foreach($blogs as $blog) {
            if ($blog->status == Blog::STATUS_SCHEDULED && $blog->published_at <= now()) {
                $blog->status = Blog::STATUS_PUBLISHED;
                $blog->save();
            }
        }

        return view('backend.blogs.show', compact('blogs'));
    }

    public function create ()
    {
        return view('backend.blogs.create');
    }

    public function store ( BlogRequest $request )
    {
        $user = Auth::user();

        if ($user->subscribed('default')) {
            $subscriptionType = $user->subscriptions->first()->type;
    
            if ($subscriptionType === 'Basic' && $user->blogs->count() >= 50) {
                return redirect()->route('blog.show')->with('error', 'You have reached your blog post limit for the Basic plan.');
            } elseif ($subscriptionType === 'Pro' && $user->blogs->count() >= 100) {
                return redirect()->route('blog.show')->with('error', 'You have reached your blog post limit for the Pro plan.');
            } elseif ($subscriptionType === 'Enterprise') {
            } else {
                return redirect()->route('blog.show')->with('error', 'Invalid subscription plan.');
            }
        } else {
            if ($user->blogs->count() >= 2) {
                abort(410, 'You can only create 2 blog posts. Please subscribe to a plan to post more.');
            }
        }

        $validatedData = $request->validated();
        $blog = $this->createBlog($validatedData);
        return redirect()->route('blog.show')->with('success', 'Blog Created Successfully');
    }

    private function createBlog($validatedData)
    {
        $blog = new Blog($validatedData);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'), $imageName);
            $blog->image = $imageName;
        } else {
            $blog->image = null;
        }

        $blog->save();
        return $blog;
    }

    public function edit ( $id ) 
    {
        $blog = Blog::findOrFail( $id );

        if (Gate::denies('edit-blog', $blog)) {
            abort(403, 'You do not have permission to edit this blog post.');
        }

        return view('backend.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);

        if (Gate::denies('update-blog', $blog)) {
            abort(403, 'You do not have permission to update this blog post.');
        }

        $validatedData = $request->validated();
        $isUpdated = false;

        if (request()->hasFile('image')) {
            if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }

            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'), $imageName);
            $validatedData['image'] = $imageName;
            $isUpdated = true;
        }

        foreach ($validatedData as $key => $value) {
            if ($blog->$key != $value) {
                $isUpdated = true;
                break;
            }
        }

        if (!$isUpdated) {
            return redirect()->route('blog.show', $blog->id)->with('info', 'No changes made to the blog');
        }

        $blog->update($validatedData);
        return redirect()->route('blog.show', $blog->id)->with('success', 'Blog Updated Successfully');
    }
    

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if (Gate::denies('destroy-blog', $blog)) {
            abort(403, 'You do not have permission to delete this blog post.');
        }

        if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
            unlink(public_path('uploads/blogs/' . $blog->image));
        }

        $blog->delete();
        return redirect()->route('blog.show')->with('error', 'Blog Deleted Successfully');
    }

}