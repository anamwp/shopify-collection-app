@extends('shopify-app::layouts.default')
@section('scripts')
	<script type="text/javascript" src="//cdn.tailwindcss.com?plugins=forms,typography"></script>
@endsection
@section('content')
<section class="py-14">
    <div class="max-w-screen-xl mx-auto md:px-8">
        <div class="items-center gap-x-12 sm:px-4 md:px-0 lg:flex">
            <div class="flex-1 sm:hidden lg:block">
                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" class="md:max-w-lg sm:rounded-lg" alt="">
            </div>
            <div class="max-w-xl px-4 space-y-3 mt-6 sm:px-0 md:mt-0 lg:max-w-2xl">
                <h3 class="text-indigo-600 font-semibold">
                    Professional services
                </h3>
                <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                    Welcome to Collections
                </p>
                <p class="mt-3 text-gray-600">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                </p>
                <div className="mt-4">
                    
                    <a href="{{ URL::tokenRoute('shop') }}"
                        class="py-1.5 inline-block px-3 text-gray-600 duration-150 border rounded-lg mb-5" style="margin-bottom:50px">
                        Shop
                    </a>
                    <a href="{{ URL::tokenRoute('collections.index') }}"
                        class="py-1.5 inline-block px-3 text-blue-600 duration-150 border rounded-lg mb-5 mx-2" style="margin-bottom:50px">
                        Collections
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection