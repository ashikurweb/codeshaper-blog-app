@extends('layouts.backend')
@section('title', 'Blog Create')

@section('content')
@include('backend.partials.nav')

<div class="py-8 shadow-sm rounded-md w-full">
    <a href="{{ route('blog.create') }}" class="bg-green-500 text-green-100 font-semibold hover:bg-green-400 hover:text-white py-3 px-4 rounded-full transition-all duration-200"><i class="fa-solid fa-square-plus ml-1 mr-1 mb-5"></i>Add Blog</a>
    <div class="inline-block min-w-full rounded-lg overflow-hidden">
        <table class="min-w-full  table-auto leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-left text-md font-semibold text-violet-500 uppercase tracking-wider">SN</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-left text-md font-semibold text-violet-500 uppercase tracking-wider">Image</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-left text-md font-semibold text-violet-500 uppercase tracking-wider">Title</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-left text-md font-semibold text-violet-500 uppercase tracking-wider">Author</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-left text-md font-semibold text-violet-500 uppercase tracking-wider">Category</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-left text-md font-semibold text-violet-500 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-violet-200 text-center text-md font-semibold text-violet-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="hover:bg-gray-50">
                @forelse ($blogs as $index => $blog)
                    <tr class="transition-all duration-300 ease-in-out hover:bg-gray-200">
                        <td class="px-5 py-3 border-b border-gray-200 text-sm">{{ $index + 1 }}</td>
                        <td class="px-5 py-3 border-b border-gray-200 text-sm">
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-14 h-14 rounded-md">
                        </td>
                        <td class="px-5 py-3 border-b border-gray-200 text-sm">{{ $blog->title }}</td>
                        <td class="px-5 py-3 border-b border-gray-200 text-sm">{{ $blog->author }}</td>
                        <td class="px-5 py-3 border-b border-gray-200 text-sm">{{ $blog->category }}</td>
                        <td class="px-5 py-3 border-b border-gray-200 text-sm">
                            @if ($blog->status == 'draft')
                                <span class="px-2 py-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                    {{ $blog->status }}
                                </span>
                            @elseif ($blog->status == 'scheduled')
                                <span class="px-2 py-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                    {{ $blog->status }}
                                </span>
                            @elseif ($blog->status == 'published')
                                <span class="px-2 py-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $blog->status }}
                                </span>
                            @endif
                        </td>                        
                        <td class="px-5 py-3 border-b border-gray-200 text-sm text-center">
                            <a href="{{ route('blog.show', $blog->id) }}" class="bg-green-100 px-3 py-2 rounded-md text-green-500 hover:bg-green-500 hover:text-white transition-colors mr-2">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="bg-amber-100 px-3 py-2 rounded-md text-amber-500 hover:bg-amber-500 hover:text-white transition-colors mr-2">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" id="delete-form-{{ $blog->id }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-rose-100 px-3 py-2 rounded-md text-rose-500 hover:bg-rose-500 hover:text-white transition-colors" onclick="confirmDelete(event, {{ $blog->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>                                                
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-lg text-red-500">
                            <i class="fas fa-exclamation-circle text-4xl text-red-400"></i>
                            <p>No Data Found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- pagnation --}}
    <div class="mt-2 p-2">
        {{ $blogs->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete(event, blogId) {
        event.preventDefault(); 

        Toastify({
            text: "Are you sure you want to delete this blog?",
            duration: 5000,
            close: true,
            gravity: "top",
            position: "center",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
            },
            onClick: function () {
                document.getElementById('delete-form-' + blogId).submit();
            }
        }).showToast();
    }
</script>
@endpush
