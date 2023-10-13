<!-- Example using laravel-breadcrumbs package -->

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('post', function ($trail) {
    $trail->parent('home');
    $trail->push('Posts', route('auth.post'));
});

Breadcrumbs::for('addpost', function ($trail, addpost) {
    $trail->parent('home');
    $trail->push('AddPost', route('auth.addpost'));
});

Breadcrumbs::for('edit', function ($trail, edit) {
    $trail->parent('home');
    $trail->push('Edit', route('auth.edit'));
});

Breadcrumbs::for('show', function ($trail, show) {
    $trail->parent('home');
    $trail->push('Show', route('auth.show'));
});