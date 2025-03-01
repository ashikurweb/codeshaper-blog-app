@extends('layouts.backend')
@section('title', 'Edit Blog')

@section('content')
@include('backend.partials.nav')

<div class="container shadow-lg mx-auto bg-white px-4 py-8">
    <a href="{{ route('blog.show') }}" class="text-indigo-500 bg-indigo-100 px-3 py-2 rounded-md text-indigo-500 hover:bg-indigo-500 hover:text-white transition-colors">Back <i class="fa fa-arrow-right"></i></a>
    <h3 class="text-3xl font-semibold border-b py-2 mb-6">Edit Blog</h3>
    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
        <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                    class="mt-1 bg-slate-100 outline-none block w-full sm:text-sm rounded-md py-3 border @error('title')
                        border-red-500 @else border-slate-200 @enderror focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 px-4">

                @error('title')
                    <p class="text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author" class="block text-lg font-medium text-gray-700">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $blog->author) }}"
                    class="mt-1 bg-slate-100 outline-none block w-full sm:text-sm rounded-md py-3 border @error('author') border-red-500 @else border-slate-200 @enderror focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 px-4">

                @error('author')
                    <p class="text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="content" class="block text-lg font-medium text-gray-700">Content</label>
                <textarea name="content" id="content"
                    class="mt-1 bg-slate-100 outline-none block w-full sm:text-sm rounded-md py-3 border @error('content') border-red-500 @else border-slate-200 @enderror focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 px-4">{{ old('content', $blog->content) }}</textarea>

                @error('content')
                    <p class="text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-lg font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="mt-1 bg-slate-100 outline-none block w-full sm:text-sm rounded-md py-3 border @error('status') border-red-500 @else border-slate-200 @enderror focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 px-4">
                    <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="scheduled" {{ $blog->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>

                @error('status')
                    <p class="text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="category" class="block text-lg font-medium text-gray-700">Category</label>
                <input type="text" name="category" id="category" value="{{ old('category', $blog->category) }}"
                    class="mt-1 bg-slate-100 outline-none block w-full sm:text-sm rounded-md py-3 border @error('category') border-red-500 @else border-slate-200 @enderror focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 px-4">

                @error('category')
                    <p class="text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-lg font-medium text-gray-700">Image</label>
                <input type="file" name="image" onchange="loadImage(event, 'editImagePreview')"
                    class="mt-1 bg-slate-100 outline-none border-slate-200 block w-full sm:text-sm rounded-md py-3 border focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 px-4">

                <div class="text-center">
                    <img id="editImagePreview" class="mt-2 rounded-lg shadow-md" src="{{ asset('uploads/blogs/' . $blog->image) }}"
                        alt="Preview" style="width: 120px; height: 120px;">
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <button type="submit"
                class="bg-violet-600 hover:bg-violet-700 transition-all duration-200 text-xl w-full text-white px-4 py-3 rounded-lg">
                Update Blog
            </button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <script>
        function loadImage(event, previewId) {
            let output = document.getElementById(previewId);
            let file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function() {
                    output.src = reader.result;
                };
                reader.readAsDataURL(file);
            } else {
                output.src = '{{ asset("uploads/blogs/" . $blog->image) }}';
            }
        }
    </script>
@endpush
