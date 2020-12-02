<div>
  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control form-select-t2" name='title' value="{{ old('title') ?? $apartment->title ?? "" }}" autocomplete="off">
    @error ('title') <p class="alert alert-danger form-select-t2 mt-2">{{ $message }}</p> @enderror <br>
  </div>

  <div class="form-group">
    <label for="address">Indirizzo</label>
    <input type="text" id="address" class="form-control form-select-t2" name="address" value="{{ old('address') ?? $apartment->address ?? ""}}" autocomplete="off">
    <input type="hidden" id="longitude" class="form-control " name="longitude" value="{{ old('longitude') ?? $apartment->longitude ?? ""}}">
    <input type="hidden" id="latitude" class="form-control " name="latitude" value="{{ old('latitude') ?? $apartment->latitude ?? ""}}">
    @error ('address') <p class="alert alert-danger form-select-t2 mt-2">{{ $message }}</p> @enderror <br>
  </div>

  <div class="form-group">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text btn-form-t2" for="categories">Categoria</label>
        </div>
        <select class="custom-select form-select-t2" id="categories" name="category_id">
          @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
    </div>
  </div>
</div>

<div class="form-b-t2">
  <div class="form-d-t2">
    <label for="size">Superficie</label>
    <input type="number" class="form-control form-select-t2 text-center" name="size" value="{{ old('size') ?? $apartment->size ?? ""}}" min='10' max='500' autocomplete="off">
    @error ('size') <p class="alert alert-danger form-select-t2-mod mt-2">{{ $message }}</p> @enderror <br>
  </div>

  <div class="form-d-t2">
    <label for="room_number">Numero stanze</label>
    <input type="number" class="form-control form-select-t2 text-center" name="room_number" value="{{ old('room_number') ?? $apartment->room_number ?? ""}}" min='1' max='20' autocomplete="off">
    @error ('room_number') <p class="alert alert-danger form-select-t2-mod mt-2">{{ $message }}</p> @enderror <br>
  </div>

  <div class="form-d-t2">
    <label for="bed_number">Numero letti</label>
    <input type="number" class="form-control form-select-t2 text-center" name="bed_number" value="{{ old('bed_number') ?? $apartment->bed_number ?? ""}}" min='1' max='50' autocomplete="off">
    @error ('bed_number') <p class="alert alert-danger form-select-t2-mod mt-2">{{ $message }}</p> @enderror <br>
  </div>

  <div class="form-d-t2">
    <label for="bath_number">Numero Bagni</label>
    <input type="number" class="form-control form-select-t2 text-center" name="bath_number" value="{{ old('bath_number') ?? $apartment->bath_number ?? ""}}" min='1' max='20' autocomplete="off">
    @error ('bath_number') <p class="alert alert-danger form-select-t2-mod mt-2">{{ $message }}</p> @enderror <br>
  </div>
</div>


<div class="form-group">
  <label for="description">Descrizione</label>
  <textarea class="form-control form-select-2-t2" id="description" name='description' rows="3">{{ old('description') ?? $apartment->description ?? ""}}</textarea>
  @error ('description') <p class="alert alert-danger form-select-t2 mt-2">{{ $message }}</p> @enderror <br>
</div>
