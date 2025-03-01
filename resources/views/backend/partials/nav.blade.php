<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between text-orange-400 text-md w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <a href="{{ route('home') }}"> <i class="fa-solid fa-home mr-1" class="text-lime-400"></i>Home</a>
    </div>
      <div class="flex items-center justify-end w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <li class="flex items-center">
              <p class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                <span class="hidden mr-3 text-xl font-bold text-lime-400 sm:inline">{{ Auth::user()->name }}</span>
              </p>
            </li>
  
            <li class="flex items-center pl-4 xl:hidden">
              <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-slate-500" sidenav-trigger>
                <div class="w-4.5 overflow-hidden">
                  <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                  <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                  <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                </div>
              </a>
            </li>
  
            <li class="relative flex items-center pr-2">
              <p class="hidden transform-dropdown-show"></p>
              <a href="javascript:;" class="block p-0 transition-all text-sm ease-nav-brand text-slate-500" dropdown-trigger aria-expanded="false">
                <img id="profile-btn" src="https://picsum.photos/40" class="w-10 h-10 rounded-full cursor-pointer" alt="Profile">
              </a>
  
              <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                <!-- add show class on dropdown open js -->
                <li class="relative mb-2">
                  <a href="" class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors">
                    <div class="flex py-1">
                      <div class="my-auto">
                        <span class="inline-flex items-center justify-center mr-4 bg-violet-100 text-violet-500 text-md h-9 w-9 max-w-none rounded-xl">
                          <i class="fa-solid fa-user"></i>
                        </span>
                      </div>
                      <div class="flex flex-col justify-center">
                        Profile
                      </div>
                    </div>
                  </a>
                </li>
  
                <li class="relative mb-2">
                  <a href="" class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors">
                    <div class="flex py-1">
                      <div class="my-auto">
                        <span class="inline-flex items-center justify-center mr-4 bg-lime-200 text-lime-500 text-md h-9 w-9 max-w-none rounded-xl">
                          <i class="fa-solid fa-gear"></i>
                        </span>
                      </div>
                      <div class="flex flex-col justify-center">
                        Setting
                      </div>
                    </div>
                  </a>
                </li>
  
                <li class="relative mb-2">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <span class="inline-flex items-center justify-center mr-4 bg-rose-100 text-rose-500 text-md h-9 w-9 max-w-none rounded-xl">
                            <i class="fa-solid fa-right-to-bracket mr-2"></i>
                          </span>
                        </div>
                        <div class="flex flex-col justify-center">
                          Logout
                        </div>
                      </div>
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>