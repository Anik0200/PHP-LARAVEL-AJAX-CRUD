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
                        <a href="" class="btn btn-sm btn-outline-primary"><i class="fa fa-view"></i></a>

                        <a href="" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                            data-price="{{ $product->price }}" data-bs-toggle="modal" data-bs-target="#updateleModal"
                            class="btn btn-sm btn-outline-primary updateForm"><i class="fa fa-edit"></i></a>

                        <a class="btn btn-sm btn-outline-danger delete_product" data-id="{{ $product->id }}"><i
                                class="fa fa-trash"></i></a>

                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $products->links() }}
