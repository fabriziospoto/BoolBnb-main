<div class="form-group image-edit-form">
    @csrf
    <input id="input-fa" name="img" type="file" multiple>
    <input id="apartment_id" type="hidden" name="apartment_id" value="{{ $apartment->id }}" >
     @error ('img') <p class="alert alert-danger">{{ $message }}</p> @enderror <br>
</div>
