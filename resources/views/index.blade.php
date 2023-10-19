<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css
" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center ">

                <h2 class="my-5">AJAX CRUD</h2>

                <a href="" class="btn btn-sm btn-outline-success float-start mb-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="fa fa-plus"></i></a>

                <input type="text" name="search" id="search" class="form-control mb-3" placeholder="Search">

                

                <div class="table-data">
                    <table class="table table-hover table-bordered productTable">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAME</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <th>{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-primary"><i
                                                    class="fa fa-view"></i></a>

                                            <a href="" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                                data-bs-toggle="modal" data-bs-target="#updateleModal"
                                                class="btn btn-sm btn-outline-primary updateForm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a class="btn btn-sm btn-outline-danger delete_product"
                                                data-id="{{ $product->id }}"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('productModal')
    @include('updateModal')
    @include('productJS')
</body>

</html>
