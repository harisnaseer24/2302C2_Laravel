<!doctype html>
<html lang="en">
    <head>
        <title>Add New Product</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container">
                <div class="col-md-10 mx-auto">
                    @if ($status= Session::get('success'))
                      <div
                        class="alert alert-primary alert-dismissible fade show"
                        role="alert"
                      >
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        ></button>
                      
                        <strong>{{ $status }}</strong> 
                      </div>
                        
                    @endif
                    <h1 class="text-center text-secondary display-2">Edit Product "{{$product['title']}}"</h1>
                   
                    <form action="/updateproduct/{{$product['id']}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" placeholder="Product title" class="form-control my-3" value="{{ old('title',$product['title']) }}">
                        @error('title')
                       <span class="text-danger">{{ $message }}</span>     
                        @enderror

                        <input type="text" name="description" placeholder="Product description" class="form-control my-3"  value="{{ old('description',$product['description']) }}">
                         @error('description')
                       <span class="text-danger">{{ $message }}</span>     
                        @enderror
                        <input type="number" name="price" placeholder="Product price" class="form-control my-3"  value="{{ old('price',$product['price']) }}">
                         @error('price')
                       <span class="text-danger">{{ $message }}</span>     
                        @enderror
                        <input type="number" name="stock" placeholder="Product stock available" class="form-control my-3"  value="{{ old('stock',$product['stock']) }}">
                         @error('stock')
                       <span class="text-danger">{{ $message }}</span>     
                        @enderror
                        <input type="file" name="image" class="form-control my-3"  value="{{ old('image',$product['image']) }}">
                         @error('image')
                       <span class="text-danger">{{ $message }}</span>     
                        @enderror
                        <input type="submit" name="addproduct" class="form-control btn btn-dark my-3">
                    </form>
                </div>
            </div>



        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
