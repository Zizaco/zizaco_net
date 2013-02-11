<h1>Novo comentário</h1>

<p>{{ $comment->name }} fez um comentário no post {{ $post->title }}</p>

<p>Acesse {{{ HTML::action('PostsController@show',$post->title,['slug'=>$post->slug]) }}} para visualizar o comentário.</p>

<p>Zizaco.net</p>
