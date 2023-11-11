<ul class="js-clone-nav d-none d-lg-inline-none text-start site-menu float-end">
    <li class="active"><a href="index-2.html">Home</a></li>
    <li class="has-children">
        <a href="categories.html">Categories</a>
        <ul class="dropdown">
            @foreach ($categories as $category)
                <li><a href="#">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </li>
</ul>
