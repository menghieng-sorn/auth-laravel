<div>
   @foreach ($posts as $post)
        {{-- @can('update',$post)
       <a href="{{ route('post.edit',$post->id) }}">{{ $post->title }}</a>
       @endcan --}}
        @if(auth()->user()->can('update',$post))
       <a href="{{ route('post.edit',$post->id) }}">{{ $post->title }}</a>
       @endif
       <br>
   @endforeach
</div>
