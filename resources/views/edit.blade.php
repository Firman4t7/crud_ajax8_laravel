<div class="p2">
    <div class="form-group">
        <label for="name">Product</label>
        <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control"
            placeholder="Nama Product">
    </div>
    <div class="form-group">
        <button class="btn btn-warning mt-2" onClick="update({{ $data->id }})">Update</button>
    </div>

</div>
