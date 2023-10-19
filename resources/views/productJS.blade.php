<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js
"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {

        //insert data and showing data
        $(document).on('click', '.productBtn', function(e) {

            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();

            $.ajax({

                url: "{{ route('products.store') }}",

                method: 'POST',

                data: {
                    name: name,
                    price: price
                },

                success: function(res) {
                    if (res.status == 'success') {
                        $('#exampleModal').modal('hide');
                        $('#productForm')[0].reset();
                        $('.productTable').load(location.href + ' .productTable');
                    }

                    if (res.massage == 'PRODUCT ADDED!') {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: res.massage,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    }
                },
                error: function(err) {

                    let error = err.responseJSON;

                    $.each(error.errors, function(index, value) {
                        $('.errMassage').append(
                            '<span class="text-danger">' + "*" + value +
                            '</span> ' +
                            ' <br>');
                    });

                }

            });

        });

        //Showing value On Update Form

        $(document).on('click', '.updateForm', function() {

            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#upName').val(name);
            $('#upPrice').val(price);

        });

        // Update data

        $(document).on('click', '.updateproductBtn', function(e) {

            e.preventDefault();

            let up_id = $('#up_id').val();
            let upName = $('#upName').val();
            let upPrice = $('#upPrice').val();

            $.ajax({

                url: "{{ route('products.up') }}",

                method: 'POST',

                data: {
                    up_id: up_id,
                    upName: upName,
                    upPrice: upPrice
                },

                success: function(res) {
                    if (res.status == 'success') {
                        $('#updateleModal').modal('hide');
                        $('#updateproductForm')[0].reset();
                        $('.productTable').load(location.href + ' .productTable');
                    }

                    if (res.massage == 'PRODUCT UPDATED!') {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: res.massage,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                    }
                },
                error: function(err) {

                    let error = err.responseJSON;

                    $.each(error.errors, function(index, value) {
                        $('.errMassage').append(
                            '<span class="text-danger">' + "*" + value +
                            '</span> ' +
                            ' <br>');
                    });

                }

            });

        });

        //Delete Data

        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();

            let product_id = $(this).data('id');

            if (confirm('ARE YOU SURE')) {

                $.ajax({

                    url: "{{ route('products.del') }}",

                    method: 'POST',

                    data: {
                        product_id: product_id
                    },

                    success: function(res) {

                        if (res.status == 'success') {

                            $('.productTable').load(location.href + ' .table');

                        }

                        if (res.massage == 'PRODUCT DELETED!') {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: res.massage,
                                showConfirmButton: false,
                                timer: 1500,
                            })
                        }

                    }

                });

            }

        });

        //Pagination Product DAta

        $(document).on('click', '.pagination a', function(e) {

            e.preventDefault();

            let page = $(this).attr('href').split('page=')[1]

            product(page)
        });

        function product(page) {
            $.ajax({

                url: "/pagination/paginate-data?page=" + page,

                success: function(res) {
                    $('.table-data').html(res);
                }

            });
        }

        //Search data

        $(document).on('keyup', function(e) {

            e.preventDefault();

            let searchStr = $('#search').val();

            $.ajax({

                url: "{{ route('product.search') }}",

                method: 'GET',

                data: {
                    searchStr: searchStr
                },

                success: function(res) {

                    $('.table-data').html(res);

                    if (res.status == 'NOT FOUND!') {
                        $('.table-data').html('<span class="text-danger">' + ' NOT FOUND! ' + '</span>');
                    }
                }

            });

        });

    });
</script>
