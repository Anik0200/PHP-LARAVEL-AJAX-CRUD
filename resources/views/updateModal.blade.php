<style>
    .error {
        margin-bottom: 5px;
        text-transform: uppercase;
        font-weight: bold;
        text-align: center
    }
</style>

<!--Product Modal -->
<div class="modal fade" id="updateleModal" tabindex="-1" aria-labelledby="updateleModalLabel" aria-hidden="true">

    <form method="POST" id="updateproductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateleModalLabel">EDIT PRODUCT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="errMassage error">

                    </div>

                    <input type="hidden" id="up_id" name="up_id">

                    <div class="mb-3">
                        <label class="form-label">NAME</label>
                        <input id="upName" type="text" name="upName" class="form-control"
                            value="{{ old('upName') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PRICE</label>
                        <input id="upPrice" type="number" name="upPrice" class="form-control"
                            value="{{ old('upPrice') }}">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary updateproductBtn">SUBMIT</button>
                </div>

            </div>
        </div>
    </form>

</div>
<!--Product Modal -->
