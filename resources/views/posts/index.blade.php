 <x-app-layout>
    <body class="antialiased">
        <h1>Blog Name</h1>
         <a href="/posts/create">create</a>
          <div class='posts'>
            <div class='post'>
              @foreach ($posts as $post)
                 <div class='post'>
                   <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                   <p class='body'>{{ $post->body }}</p> 
                   <form action="/posts//{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                       @csrf
                       @method('DELETE')
                       <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                   </form>
                 </div>
                 <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
              @endforeach
            </div>
            <p>ログインユーザー  {{ Auth::user()->name}}</p>
        <div class='paginate'>{{ $posts->links()}}</div>
        <script>
            function deletePost(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。 \n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
  </x-app-layout>