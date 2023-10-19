<style>
    .error {
        margin-bottom: 5px;
        text-transform: uppercase;
        font-weight: bold;
        text-align: center
    }
</style>

<!--Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form method="POST" id="productForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD PRODUCT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="errMassage error">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">NAME</label>
                        <input id="name" type="text" name="name" class="form-control"
                            value="{{ old('name') }}">

                        @error('name')
                            <div class="alert alert-danger error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PRICE</label>
                        <input id="price" type="number" name="price" class="form-control"
                            value="{{ old('price') }}">

                        @error('price')
                            <div class="alert alert-danger error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary productBtn">SUBMIT</button>
                </div>

            </div>
        </div>
    </form>

</div>
<!--Product Modal -->
