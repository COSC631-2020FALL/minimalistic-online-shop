<blockquote class="blockquote mb-0">
    <p>{{ $review->review }}.</p>
    <footer class="blockquote-footer">Reviewed by <cite title="Source Title"> {{ $review->review_owner->name }} </cite>
        <span class="ml-1">
            @for ($i = 0; $i < $review->rating; $i++)
                <span> @include('icons.star') </span>
            @endfor
        </span>
    </footer>
</blockquote>
<hr>
