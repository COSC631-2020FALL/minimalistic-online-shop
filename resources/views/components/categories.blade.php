@guest

    <nav class="m-5">
        <ul class="nav justify-content-center">

            @each('components.category-nav', App\Category::with(['products'])->has('products')->get() , 'category')

        </ul>
    </nav>

@endguest

@isnotadmin

    <nav class="m-5">
        <ul class="nav justify-content-center">

            @each('components.category-nav', App\Category::with(['products'])->has('products')->get() , 'category')

        </ul>
    </nav>

@endisnotadmin
