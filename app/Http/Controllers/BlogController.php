<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Mail\BlogScheduledMail;
use App\Models\Blog;
use App\Models\Subscription;
use App\Models\SubscriptionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index ()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('backend.blogs.show', compact('blogs'));
    }

    public function show ( $id )
    {
        $blog = Blog::findOrFail( $id );

        if ($blog->status === 'draft') {
            return redirect()->route('blog.index')->with('error', 'This blog is not published yet.');
        }
        return view('frontend.blog.single', compact('blog'));
    }

    public function create ()
    {
        return view('backend.blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($subscription && Carbon::parse($subscription->ends_at)->isPast()) {
            return redirect()->route('blog.index')->with('error', 'Your subscription has expired. Please renew your subscription.');
        }

        $subscriptionItem = $subscription ? SubscriptionItem::where('subscription_id', $subscription->id)->first() : null;

        $postLimit = 2;  

        if ($subscription && $subscriptionItem && $subscription->stripe_status === 'active') {
            $plan = $subscriptionItem->stripe_product;
            $isYearly = Carbon::parse($subscription->ends_at)->diffInDays(Carbon::now()) > 365;

            if ($plan === 'prod_RtRWliGhloas4J') {
                $postLimit = $isYearly ? 50 : 10;
            } elseif ($plan === 'prod_RtRXJiOzirGoNt') {
                $postLimit = $isYearly ? 100 : 30;
            } elseif ($plan === 'prod_RtRXWGmJnz9rXz') {
                $postLimit = $isYearly ? PHP_INT_MAX : 50;
            }
        }

        $postCount = $user->blogs()->count();

        if ($postCount >= $postLimit) {
            return redirect()->route('blog.index')->with('error', 'You have reached your post limit. Please upgrade your plan to post more.');
        }

        $validatedData = $request->validated();
        $blog = $this->createBlog($validatedData);

        if ($blog->status === 'scheduled') {
            Mail::to($user->email)->queue(new BlogScheduledMail($blog));
        }

        return redirect()->route('blog.index')->with('success', 'Blog Created Successfully');
    }

    private function createBlog($validatedData)
    {
        $blog = new Blog($validatedData);
        
        if ($validatedData['status'] === 'draft') {
            $blog->published_at = null;
        } else {
            $blog->published_at = Carbon::parse($validatedData['published_at']);
        }

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

        if ($validatedData['status'] === 'draft') {
            $validatedData['published_at'] = null;
        } else {
            $blog->published_at = Carbon::parse($validatedData['published_at']);
        }

        if (!$isUpdated) {
            return redirect()->route('blog.index', $blog->id)->with('info', 'No changes made to the blog');
        }

        $blog->update($validatedData);
        return redirect()->route('blog.index', $blog->id)->with('success', 'Blog Updated Successfully');
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
        return redirect()->route('blog.index')->with('error', 'Blog Deleted Successfully');
    }
}