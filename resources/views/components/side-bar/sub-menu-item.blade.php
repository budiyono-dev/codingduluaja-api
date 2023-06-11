<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
  @foreach($items as $item)
    <li><a href="#" class="link-dark rounded"> {{ $item }}</a></li>
  @endforeach
</ul>