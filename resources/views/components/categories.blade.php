<nav class="m-5">
    <ul class="nav justify-content-center">

        @each('components.category-nav', App\Category::all(), 'category')

    </ul>
</nav>
