<!DOCTYPE html>
<html lang="en">

@include('layouts/_head')

<body @class(['bg-primary bg-opacity-10 d-flex flex-column min-vh-100 ', ' login'=> request()->routeIs('login')])>

    @guest
    @unless (request()->routeIs('login'))
    @include('_hero')
    @endunless
    @endguest

    <header>
        @if (request()->routeIs('login'))
        <nav class="shadow-sm border-top border-white border-5 fixed-top">
        </nav>
        @else
        @auth
        @include('layouts/_nav')
        @endauth
        @endif
    </header>
    <main @class([ 'container flex-grow-1 mb-5'=> !request()->routeIs('login'),
        'container' => request()->routeIs('login'),
        'd-none'=> !request()->routeIs('login') && auth()->guest()
        ])>
        @auth
        @unless (request()->routeIs('login'))
        
        @endunless
        @endauth
        <section @class([ 'row gy-3 justify-content-center fs-5' , 'mt-2'=> !auth()->check(),
            ])>
            @yield('main')
        </section>
    </main>
    @unless (request()->routeIs('login'))
    @auth
    @include('layouts/_footer')
    @endauth
    @endunless
    @livewireScripts
    @include('layouts/_scripts')
</body>
@yield('modal')

</html>