@extends('layouts.frontend')
@section('title', 'CodeShaper Blogify Web Application With Laravel')

@section('content')
    <!-- ===== Hero Section Start ===== -->
    <section id="home" class="relative overflow-hidden z-10 pt-35 md:pt-40 xl:pt-45">
      <!-- Hero Bg Shapes -->
      <div class="max-w-7xl mx-auto">
        <div class="absolute -z-10 pointer-events-none inset-0 overflow-hidden -mx-28">
          <div
            class="absolute -z-1 -top-[128%] sm:-top-[107%] xl:-top-[73%] left-1/2 -translate-x-1/2 -u-z-10 hero-circle-gradient w-full h-[1282px] rounded-full max-w-[1282px]">
          </div>
          <div
            class="absolute -z-1 -top-[112%] sm:-top-[93%] xl:-top-[62%] left-1/2 -translate-x-1/2 -u-z-10 hero-circle-gradient w-full h-[1046px] rounded-full max-w-[1046px]">
          </div>
          <div class="absolute top-0 left-1/2 -translate-x-1/2 -u-z-10">
            <img src="{{ asset('frontend/pictures/blur-02.svg') }}" alt="blur" class="max-w-none">
          </div>
          <div class="absolute top-0 left-1/2 -translate-x-1/2 -u-z-10">
            <img src="{{ asset('frontend/pictures/blur-01.svg') }}" alt="blur" class="max-w-none">
          </div>
        </div>
      </div>

      <!-- Hero Content -->
      <div class="mx-auto max-w-[900px] px-4 sm:px-8 xl:px-0 relative z-1">
        <div class="text-center">
          <a href="{{ route('home') }}"
            class="hero-subtitle-gradient hover:hero-subtitle-hover relative mb-5 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
            <img src="{{ asset('frontend/pictures/icon-title.svg') }}" alt="icon">

            <span class="hero-subtitle-text">
              Your Ultimate Creative Companion!
            </span>
          </a>
          <h1 class="text-white mb-6 text-3xl font-extrabold sm:text-5xl xl:text-heading-1">
            My Personal Blog Project
          </h1>
          <p class="max-w-[500px] mx-auto mb-9 font-medium md:text-lg">
            I'm a paragraph. Click here to add your own text and edit me.
          </p>

          <a href="http://github.com/ashikurweb" target="_blank"
            class="hero-button-gradient inline-flex rounded-lg py-3 px-7 text-white font-medium ease-in duration-300 hover:opacity-80">
            Connect My Github Account
          </a>
        </div>
      </div>

      <div class="mt-17" data-wow-delay="0.1s">
        <img class="mx-auto" src="{{ asset('frontend/pictures/hero.svg') }}" alt="hero" />
      </div>
    </section>
    <!-- ===== Hero Section End ===== -->

      <!-- ====== Clients Section Start -->
      <section class="py-19">
        <div class="max-w-[1104px] mx-auto px-4 sm:px-8 xl:px-0">
          <div class="relative overflow-hidden z-10">
            <span
              class="max-w-[128px] w-full h-[37px] block inset-0 pointer-events-none absolute z-10 left-0 top-1/2 -translate-y-1/2 bg-gradient-to-l from-dark/0 to-dark/100"></span>
            <span
              class="max-w-[128px] w-full h-[37px] block inset-0 pointer-events-none absolute z-10 left-auto top-1/2 -translate-y-1/2 bg-gradient-to-r from-dark/0 to-dark/100"></span>
            <div class="swiper clients-carousel">
              <div class="swiper-wrapper items-center select-none !ease-linear">
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-01.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-02.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-03.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-04.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-05.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-06.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img class="mt-3" src="{{ asset('frontend/pictures/client-07.svg') }}" alt="client" />
                  </a>
                </div>

                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-01.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-02.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-03.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-04.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-05.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-06.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img class="mt-3" src="{{ asset('frontend/pictures/client-07.svg') }}" alt="client" />
                  </a>
                </div>

                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-01.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-02.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-03.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-04.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-05.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img src="{{ asset('frontend/pictures/client-06.svg') }}" alt="client" />
                  </a>
                </div>
                <div class="swiper-slide !w-auto">
                  <a href="/#">
                    <img class="mt-3" src="{{ asset('frontend/pictures/client-07.svg') }}" alt="client" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ====== Clients Section End -->

    <!-- ====== Blog Section Start -->
    <section class="py-20 lg:py-25">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            <!-- section title -->
            <div class="wow fadeInUp mb-16 text-center">
            <span
                class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                <img src="{{ asset('frontend/pictures/icon-title.svg') }}" alt="icon">

                <span class="hero-subtitle-text"> Read Our Latest Blogs </span>
            </span>
            <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                Latest Blogs & News
            </h2>
            <p class="max-w-[714px] mx-auto font-medium">
                Our AI writing tool is designed to empower you with exceptional
                writing capabilities, making the writing process more efficient,
                accurate, and enjoyable.
            </p>
            </div>

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
                  <a href="blog-single.html" class="text-white font-semibold text-xl ease-in duration-300 hover:opacity-80">
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

            {{-- pagination --}}
            <div class="flex justify-center py-10mt-10">
              {{ $blogs->links() }}
            </div>
        </div>
    </section>
    <!-- ====== Blog Section End -->

    <!-- ====== Subscription Plan Pricing -->
    @include('pricing.pricing')

    <!-- ====== Support Section Start -->
    <section id="support" class="scroll-mt-17">
      <div class="max-w-[1104px] mx-auto px-4 sm:px-8 xl:px-0">
        <div class="relative z-999 overflow-hidden rounded-[30px] bg-dark pt-25 px-4 sm:px-20 lg:px-27.5">
          <!-- grid row -->
          <div
            class="flex justify-center gap-7.5 absolute left-1/2 -translate-x-1/2 -top-[16%] max-w-[690px] w-full -z-1 opacity-40">
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border bottom-12">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border bottom-7">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border bottom-3">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border bottom-2">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border bottom-5">
            </div>
            <div class="max-w-[50px] w-full h-[250px] relative pricing-grid pricing-grid-border bottom-8">
            </div>
          </div>

          <!-- stars -->
          <div class="max-w-[482px] w-full h-60 overflow-hidden absolute -z-1 -top-30 left-1/2 -translate-x-1/2">
            <div class="stars"></div>
            <div class="stars2"></div>
          </div>

          <!-- bg shapes -->
          <div class="absolute -z-10 pointer-events-none inset-0 overflow-hidden">
            <span class="absolute left-1/2 top-0 -translate-x-1/2 -z-1">
              <img src="{{ asset('frontend/pictures/blur-19.svg') }}" alt="blur" class="max-w-none">
            </span>
            <span class="absolute left-1/2 top-0 -translate-x-1/2 -z-1">
              <img src="{{ asset('frontend/pictures/blur-20.svg') }}" alt="blur" class="max-w-none">
            </span>
            <span class="absolute left-1/2 top-0 -translate-x-1/2 -z-1">
              <img src="{{ asset('frontend/pictures/blur-21.svg') }}" alt="blur" class="max-w-none">
            </span>
          </div>

          <!-- section title -->
          <div class="wow fadeInUp mb-16 text-center relative z-999">
            <span
              class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
              <img src="{{ asset('frontend/pictures/icon-title.svg') }}" alt="icon">

              <span class="hero-subtitle-text"> Need Any Help? </span>
            </span>
            <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
              Contact With Us
            </h2>
            <p class="max-w-[714px] mx-auto font-medium">
              Our AI writing tool is designed to empower you with exceptional
              writing capabilities, making the writing process more efficient,
              accurate, and enjoyable.
            </p>
          </div>

          <!-- support form -->
          <div class="form-box-gradient relative overflow-hidden rounded-[25px] bg-dark p-6 sm:p-8 xl:p-15">
            <form class="relative z-10">
              <div class="-mx-4 xl:-mx-10 flex flex-wrap">
                <div class="w-full px-4 xl:px-5 md:w-1/2">
                  <div class="mb-9.5">
                    <label for="name" class="text-white mb-2.5 block font-medium">
                      Name
                    </label>
                    <input id="name" type="text" name="name" placeholder="Enter your Name"
                      class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 outline-none" />
                  </div>
                </div>
                <div class="w-full px-4 xl:px-5 md:w-1/2">
                  <div class="mb-9.5">
                    <label for="email" class="text-white mb-2.5 block font-medium">
                      Email
                    </label>
                    <input id="email" type="email" name="email" placeholder="Enter your Email"
                      class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 outline-none" />
                  </div>
                </div>
                <div class="w-full px-4 xl:px-5">
                  <div class="mb-10">
                    <label for="message" class="text-white mb-2.5 block font-medium">
                      Message
                    </label>
                    <textarea id="message" name="message" placeholder="Type your message" rows="6"
                      class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-5 px-6 outline-none"></textarea>
                  </div>
                </div>
                <div class="w-full px-4 xl:px-5">
                  <div class="text-center">
                    <a href="#"
                      class="hero-button-gradient inline-flex rounded-lg py-3 px-7 text-white font-medium ease-in duration-300 hover:opacity-80">
                      Send Message
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Support Section End -->

    <!-- ====== CTA Section Start -->
    <section>
      <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
        <div class="cta-box-gradient bg-dark rounded-[30px] relative overflow-hidden px-4 py-20 lg:py-25 z-999">
          <!-- bg shapes -->
          <span class="absolute bottom-0 left-0 -z-1"><img src="{{ asset('frontend/pictures/grid.svg') }}" alt="grid" /></span>
          <div class="absolute -z-10 pointer-events-none inset-0 overflow-hidden">
            <span class="absolute left-1/2 bottom-0 -translate-x-1/2 -z-1">
              <img src="{{ asset('frontend/pictures/blur-22.svg') }}" alt="blur" class="max-w-none">
            </span>
            <span class="absolute left-1/2 bottom-0 -translate-x-1/2 -z-1">
              <img src="{{ asset('frontend/pictures/blur-23.svg') }}" alt="blur" class="max-w-none">
            </span>
            <span class="absolute left-1/2 bottom-0 -translate-x-1/2 -z-1">
              <img src="{{ asset('frontend/pictures/blur-24.svg') }}" alt="blur" class="max-w-none">
            </span>
          </div>

          <!-- stars -->
          <div class="max-w-[482px] w-full h-60 overflow-hidden absolute -z-1 -bottom-25 left-1/2 -translate-x-1/2">
            <div class="stars"></div>
            <div class="stars2"></div>
          </div>

          <div class="wow fadeInUp text-center">
            <span
              class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
              <img src="{{ asset('frontend/pictures/icon-title.svg') }}" alt="icon">

              <span class="hero-subtitle-text">
                Try our tool for Free
              </span>
            </span>
            <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
              What are you waiting for?
            </h2>
            <p class="max-w-[714px] mx-auto font-medium mb-9">
              Our AI writing tool is designed to empower you with exceptional
              writing capabilities, making the writing process more efficient,
              accurate, and enjoyable.
            </p>

            <a href="#"
              class="hero-button-gradient inline-flex rounded-lg py-3 px-7 text-white font-medium ease-in duration-300 hover:opacity-80">
              Get Started for Free
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== CTA Section End -->

    <!-- ====== Newsletter Section Start -->
    <section class="pt-17.5 sm:pt-22.5 xl:pt-27.5 pb-11">
      <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
        <div class="flex flex-wrap items-center justify-between gap-10">
          <div class="max-w-[352px] w-full">
            <h3 class="font-semibold text-heading-5 text-white mb-2">
              News & Update
            </h3>
            <p class="font-medium">
              Keep up to date with everything about our tool
            </p>
          </div>
          <div class="max-w-[534px] w-full">
            <form>
              <div class="flex items-center gap-4">
                <div class="max-w-[395px] w-full">
                  <input id="email" type="email" name="email" placeholder="Enter your Email"
                    class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 outline-none" />
                </div>
                <a href="/#"
                  class="button-border-gradient relative rounded-lg text-white text-sm flex items-center gap-1.5 py-3.5 px-7 shadow-button hover:button-gradient-hover hover:shadow-none">
                  Subscribe
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Newsletter Section End -->
@endsection