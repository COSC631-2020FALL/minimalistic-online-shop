@guest

    <nav class="m-5">
        <ul class="nav justify-content-center">

            @each('components.category-nav', App\Category::all(), 'category')
			<li class="nav-item">
			<a class="nav-link active" href="{{ route('pagenate') }}">All Products</ a>
			</li>
        </ul>
    </nav>

@endguest

@isnotadmin

    <nav class="m-5">
        <ul class="nav justify-content-center">

            @each('components.category-nav', App\Category::all(), 'category')
			<li class="nav-item">
			<a class="nav-link active" href="{{ route('pagenate') }}">All Products</ a>
			</li>
        </ul>
    </nav>

@endisnotadmin