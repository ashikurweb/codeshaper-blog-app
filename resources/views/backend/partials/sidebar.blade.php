<aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-xl transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
      <!-- Sidebar Header -->
      <div class="h-20 flex items-center justify-center border-b border-gray-100">
        <p class="flex items-center space-x-2">
            <img src="{{ asset('assets/img/logo.png') }}" class="h-10 w-auto transition-all duration-200 ease-nav-brand" alt="main_logo" />
            <span class="text-xl font-semibold text-gray-800">Dashboard</span>
        </p>
        <i class="absolute top-4 right-4 p-2 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
    </div>
  
    <!-- Sidebar Menu -->
    <div class="flex-1 w-full px-4 py-6 overflow-y-auto">
        <ul class="space-y-1">
            <!-- Dashboard Link -->
            <li>
                <a class="flex items-center p-3 text-sm font-medium rounded-lg transition-colors 
                    {{ request()->routeIs('dashboard') ? 'bg-purple-200 font-semibold text-purple-800' : 'text-gray-700 hover:bg-gray-50' }}" 
                    href="{{ route('dashboard') }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-gauge text-lg {{ request()->routeIs('dashboard') ? 'text-purple-600' : 'text-gray-500' }}"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Blog List Link -->
            <li>
                <a class="flex items-center p-3 text-sm font-medium rounded-lg transition-colors 
                    {{ request()->routeIs('blog.index') ? 'bg-green-100 font-semibold text-green-800' : 'text-gray-700 hover:bg-gray-50' }}" 
                    href="{{ route('blog.index') }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3">
                        <i class="fa-brands fa-blogger text-lg {{ request()->routeIs('blog.index') ? 'text-green-600' : 'text-gray-500' }}"></i>
                    </div>
                    <span>Total Blog</span>
                </a>
            </li>
  
            <!-- Blog Create Link -->
            <li>
                <a class="flex items-center p-3 text-sm font-medium rounded-lg transition-colors 
                    {{ request()->routeIs('blog.create') ? 'bg-lime-100 font-semibold text-lime-800' : 'text-gray-700 hover:bg-gray-50' }}" 
                    href="{{ route('blog.create') }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-blog text-lg {{ request()->routeIs('blog.create') ? 'text-lime-600' : 'text-gray-500' }}"></i>
                    </div>
                    <span>Blog Create</span>
                </a>
            </li>

            
            <!-- Profile Link -->
            <li>
                <a class="flex items-center p-3 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors" href="../pages/profile.html">
                    <div class="w-6 h-6 flex items-center justify-center mr-3">
                        <svg width="16px" height="16px" viewBox="0 0 46 42" fill="currentColor">
                            <path d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" opacity="0.6"></path>
                            <path d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                            <path d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                        </svg>
                    </div>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Subscript User -->
            <li>
                <a class="flex items-center p-3 text-sm font-medium rounded-lg transition-colors 
                    {{ request()->routeIs('subscribed.user') ? 'bg-blue-100 font-semibold text-blue-800' : 'text-gray-700 hover:bg-gray-50' }}" 
                    href="{{ route('subscribed.user') }}">
                    <div class="w-6 h-6 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-cart-plus text-lg {{ request()->routeIs('subscribed.user') ? 'text-blue-600' : 'text-gray-500' }}"></i>
                    </div>
                    <span>Subscribe User</span>
                </a>
            </li>
  
            <!-- Logout Button -->
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full flex items-center p-3 text-sm font-medium rounded-lg bg-red-50 text-red-500 hover:bg-rose-300 font-semibold hover:text-white transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center mr-3">
                            <i class="fa-solid fa-right-from-bracket text-lg text-red-500 hover:text-white"></i>
                        </div>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    </aside>