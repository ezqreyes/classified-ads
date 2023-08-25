<header class="text-gray-200 rounded-md bg-primary-green body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-200 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-gray-200 p-2 bg-gray-800 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">ClassiFind</span>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center font-semibold">
        <a class="mr-5 hover:text-gray-800">Home</a>
        <a class="mr-5 hover:text-gray-800">All Ads</a>
        <a class="mr-5 hover:text-gray-800">Stores</a>
        <a class="mr-5 hover:text-gray-800">Contact</a>
        @guest
          <a class="mr-5 hover:text-gray-800">Login</a>
          <a class="mr-5 hover:text-gray-800">Register</a>  
        @endguest
        @auth
          <a class="mr-5 hover:text-gray-800">{{auth()->user()->name}}</a>
        @endauth
      </nav>
      <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-secondary-beige hover:text-gray-800 rounded text-base text-gray-200 font-semibold mt-4 md:mt-0">
        Post New Ad
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>
  </header>