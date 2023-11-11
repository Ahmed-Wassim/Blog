<div class="col-lg-4">
    <div class="post-entry d-block small-post-entry-v">
        <div class="thumbnail">
            <a href="{{ route('post.show', $post) }}">
                <img src="{{ $post->getThumbnail() }}" alt="Image" class="img-fluid">
            </a>
        </div>
        <div class="content">
            <div class="post-meta mb-1">
                <a href="#" class="category">{{ $post->category->title }}</a>&mdash;
                <span class="date">{{ $post->getFormattedDate() }}</span>
            </div>
            <h2 class="heading mb-3"><a href="single.html">{{ $post->title }}</a></h2>
            <p>{{ $post->shortBody() }}</p>
            <a href="#" class="post-author d-flex align-items-center">
                <div class="author-pic">
                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image">
                </div>
                <div class="text">
                    <strong>{{ $post->user->name }}</strong>
                    <span>CEO and Founder</span>
                </div>
            </a>
        </div>
    </div>
</div>
