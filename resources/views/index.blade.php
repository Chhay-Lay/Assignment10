<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script
            src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
            crossorigin="anonymous"
        ></script>
        <!-- Google fonts-->
        <link
            href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
            rel="stylesheet"
            type="text/css"
        />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href='{{asset("css/styles.css")}}' rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link px-lg-3 py-3 py-lg-4"
                                href="index.html"
                                >Home</a
                            >
                        </li>
                        
                        <li class="nav-item">
                            <a
                                class="nav-link px-lg-3 py-3 py-lg-4"
                                href="/AddPost"
                                >ADD POST</a
                            >
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link px-lg-3 py-3 py-lg-4"
                                href="/category"
                                >Edit Category</a
                            >
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link px-lg-3 py-3 py-lg-4"
                                href="/login"
                                >Login</a
                            >
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header
            class="masthead"
            style="background-image: url('assets/img/home-bg.jpg')"
        >
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading"
                                >A Blog Theme by Start Bootstrap</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                        @foreach ($posts as $post)
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->body }}
                        </h3>
                        <p class="post-meta">
                            Posted by
                            <i>{{ $post->user->name }}</i>
                        </p>

                        @if ($post->user->id === auth()->id() || auth()->user()->isAdmin)
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#exampleModal">
                            Edit
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade mx-1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('post.update', $post->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-body">
                                        <input type="text" name="title">
                                        <textarea name="body" cols="30" rows="10"></textarea>
                                        <select name="category_id">
                                            @if ($categories->count())
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }} </option>   
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <form action="{{ route('post.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button name="delete-button" class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{ $posts->links('pagination::bootstrap-5') }}
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i
                                            class="fas fa-circle fa-stack-2x"
                                        ></i>
                                        <i
                                            class="fab fa-twitter fa-stack-1x fa-inverse"
                                        ></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i
                                            class="fas fa-circle fa-stack-2x"
                                        ></i>
                                        <i
                                            class="fab fa-facebook-f fa-stack-1x fa-inverse"
                                        ></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i
                                            class="fas fa-circle fa-stack-2x"
                                        ></i>
                                        <i
                                            class="fab fa-github fa-stack-1x fa-inverse"
                                        ></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">
                            Copyright &copy; Your Website 2022
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
