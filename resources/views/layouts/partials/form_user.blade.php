<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control form-select-t2" name='name' value="{{ $user->name }}" autocomplete="off">
</div>

<div class="form-group">
    <label for="lastname">Cognome</label>
    <input type="text" class="form-control form-select-t2" name='lastname' value="{{ $user->lastname }}" autocomplete="off">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control form-select-t2" name='email' value="{{ $user->email }}" autocomplete="off">
</div>

<div class="form-group">
    <label for="datepicker">{{ __('Data di nascita') }}</label>
    <input id="datepicker" name='birthday' class="form-select-t2 form-control" data-date-format="mm/dd/yyyy" value="{{ $user->birthday }}" readonly>
</div>

<div class="d-flex justify-content-center">
    <button type="submit" class="btn-delete-t2">
        {{ __('Modifica') }}
    </button>
</div>
