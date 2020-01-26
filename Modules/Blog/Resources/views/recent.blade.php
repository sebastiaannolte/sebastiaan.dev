<div class="related">
    <h2>Recent Posts</h2>
    <ul class="related-posts">
        @foreach ($top3 as $post)

        <li>
            <h3>
                <a href="{{getFullUrl($post->id)}}">
                    {{$post->title}}
                    <small>{{$post->created_at->format('d M Y')}}</small>
                </a>
            </h3>
        </li>
        @endforeach
    </ul>
</div>
