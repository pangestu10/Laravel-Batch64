
@extends('layout.master')
@section('title')
    Sanber Book
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        
    @endif
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
        
    @endif
    @auth
        <h1>Selamat Datang {{Auth()->user()->name}}</h1>
    @endauth

    Lorem Ipsum
    "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
    "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
    
    freestar
    
    freestar
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque felis nunc, pharetra et felis et, commodo consectetur sapien. Morbi lorem metus, congue id nulla nec, vestibulum faucibus ligula. Vivamus turpis tellus, ornare sed molestie ut, ullamcorper nec justo. Aliquam mattis aliquam quam at dictum. Sed in luctus dolor, a aliquam enim. Fusce non leo at urna vehicula pellentesque ut nec nulla. In ac vulputate velit. Maecenas semper vulputate magna, feugiat euismod orci convallis sit amet. Vivamus interdum dolor suscipit iaculis ultricies.
    
    Donec rhoncus, ante eget faucibus ultricies, justo neque gravida magna, at ullamcorper eros urna id purus. Mauris viverra, sem nec tempus vulputate, nunc sem vulputate libero, molestie viverra ante magna in diam. Mauris consequat malesuada efficitur. Nulla tincidunt tincidunt enim, nec aliquet leo dictum ac. In id tincidunt velit, at fringilla ipsum. Mauris rutrum rhoncus dolor, ut facilisis risus mattis a. Curabitur sit amet ex consectetur, egestas nibh et, interdum diam. Curabitur condimentum ex sed aliquam accumsan. Nunc est dui, viverra ac suscipit in, iaculis vel nulla. Nunc imperdiet odio dignissim malesuada suscipit. Cras pharetra nulla sem, nec pharetra tellus iaculis at. Fusce ultricies feugiat purus, a vulputate diam.
    
    Duis blandit in turpis at elementum. Maecenas porta posuere ex, viverra pellentesque arcu finibus sit amet. Duis placerat ex eu erat iaculis, et vestibulum magna efficitur. Integer interdum tincidunt massa sed pulvinar. Etiam sed nisl vestibulum, gravida mauris vel, convallis nisl. Sed metus neque, iaculis vel eros dignissim, fringilla laoreet mi. Donec non bibendum ante, ac scelerisque arcu. Nullam augue sem, vulputate vel dolor ac, vestibulum consequat elit. Maecenas cursus sagittis massa in mattis. Phasellus eleifend at mi vel scelerisque. Nullam vestibulum non felis in ultrices.
    Lorem Ipsum
"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."

freestar

freestar
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque felis nunc, pharetra et felis et, commodo consectetur sapien. Morbi lorem metus, congue id nulla nec, vestibulum faucibus ligula. Vivamus turpis tellus, ornare sed molestie ut, ullamcorper nec justo. Aliquam mattis aliquam quam at dictum. Sed in luctus dolor, a aliquam enim. Fusce non leo at urna vehicula pellentesque ut nec nulla. In ac vulputate velit. Maecenas semper vulputate magna, feugiat euismod orci convallis sit amet. Vivamus interdum dolor suscipit iaculis ultricies.
 
@endsection

