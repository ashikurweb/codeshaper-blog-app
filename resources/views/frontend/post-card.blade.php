<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7.5">
    @foreach ($blogs as $blog)
      <div class="wow fadeInUp group">
        <div class="mb-6 overflow-hidden rounded-xl">
          <img src="{{ asset('uploads/blogs/' . ($blog->image ? $blog->image : 'https://ai-watch.ec.europa.eu/sites/default/files/styles/oe_theme_medium_no_crop/public/2022-02/AI%20Landscape.jpg?itok=VRk0lEKY')) }}" 
            alt="image" class="ease-linear w-full duration-500 scale-100 group-hover:scale-125" />
        </div>

        <div class="flex flex-wrap gap-2.5 items-center mb-4.5">
        <span
            class="font-medium text-xs hover:text-white cursor-pointer py-[3px] px-2.5 rounded-full bg-white/[0.07] border border-white/10 hover:border-white/25 ease-out duration-300">
            {{ $blog->category  }}
        </span>

        </div>

        <h4>
        <a href="{{ route('blog.show', $blog->id) }}" class="text-white font-semibold text-xl ease-in duration-300 hover:opacity-80">
            {{ $blog->title }}
        </a>
        </h4>
        <p class="font-medium mt-4">
        {{ Str::limit($blog->content, 150) }}...
        </p>

        <div class="flex items-center gap-4.5 flex-wrap mt-6">
            <div class="flex items-center gap-2 flex-wrap cursor-pointer ease-in duration-300 hover:text-white">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 8.75C7.65625 8.75 5.78125 6.90625 5.78125 4.65625C5.78125 2.40625 7.65625 0.5625 10 0.5625C12.3438 0.5625 14.2188 2.40625 14.2188 4.65625C14.2188 6.90625 12.3438 8.75 10 8.75ZM10 1.96875C8.4375 1.96875 7.1875 3.1875 7.1875 4.65625C7.1875 6.125 8.4375 7.34375 10 7.34375C11.5625 7.34375 12.8125 6.125 12.8125 4.65625C12.8125 3.1875 11.5625 1.96875 10 1.96875Z"
                    fill="" />
                <path
                    d="M16.5938 19.4688C16.2188 19.4688 15.875 19.1562 15.875 18.75V17.8438C15.875 14.5938 13.25 11.9688 10 11.9688C6.75 11.9688 4.125 14.5938 4.125 17.8438V18.75C4.125 19.125 3.8125 19.4688 3.40625 19.4688C3 19.4688 2.6875 19.1562 2.6875 18.75V17.8438C2.6875 13.8125 5.96875 10.5625 9.96875 10.5625C13.9688 10.5625 17.25 13.8437 17.25 17.8438V18.75C17.2813 19.125 16.9688 19.4688 16.5938 19.4688Z"
                    fill="" />
                </svg>

                <span class="text-sm font-medium">{{ $blog->author }}</span>
            </div>
            <div class="flex items-center gap-2 flex-wrap cursor-pointer ease-in duration-300 hover:text-white">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.5 3.3125H15.875V2.625C15.875 2.25 15.5625 1.90625 15.1562 1.90625C14.75 1.90625 14.4375 2.21875 14.4375 2.625V3.3125H5.53125V2.625C5.53125 2.25 5.21875 1.90625 4.8125 1.90625C4.40625 1.90625 4.09375 2.21875 4.09375 2.625V3.3125H2.5C1.4375 3.3125 0.53125 4.1875 0.53125 5.28125V16.1563C0.53125 17.2188 1.40625 18.125 2.5 18.125H17.5C18.5625 18.125 19.4687 17.25 19.4687 16.1563V5.25C19.4687 4.1875 18.5625 3.3125 17.5 3.3125ZM1.96875 9.125H4.625V12.2188H1.96875V9.125ZM6.03125 9.125H9.3125V12.2188H6.03125V9.125ZM9.3125 13.625V16.6875H6.03125V13.625H9.3125ZM10.7187 13.625H14V16.6875H10.7187V13.625ZM10.7187 12.2188V9.125H14V12.2188H10.7187ZM15.375 9.125H18.0312V12.2188H15.375V9.125ZM2.5 4.71875H4.125V5.375C4.125 5.75 4.4375 6.09375 4.84375 6.09375C5.25 6.09375 5.5625 5.78125 5.5625 5.375V4.71875H14.5V5.375C14.5 5.75 14.8125 6.09375 15.2187 6.09375C15.625 6.09375 15.9375 5.78125 15.9375 5.375V4.71875H17.5C17.8125 4.71875 18.0625 4.96875 18.0625 5.28125V7.71875H1.96875V5.28125C1.96875 4.96875 2.1875 4.71875 2.5 4.71875ZM1.96875 16.125V13.5938H4.625V16.6563H2.5C2.1875 16.6875 1.96875 16.4375 1.96875 16.125ZM17.5 16.6875H15.375V13.625H18.0312V16.1563C18.0625 16.4375 17.8125 16.6875 17.5 16.6875Z"
                    fill="" />
                </svg>

                <span class="text-sm font-medium">{{ $blog->created_at->format('d M, Y') }}</span>
            </div>
        </div>
      </div>
    @endforeach
  </div>