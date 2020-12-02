	<div class="message-box">
                    <h2>Contatta l'host</h2>
                    <form class="form-in" action="{{ route('message.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" id="apartment_id" name='apartment_id' value="{{ $apartment->id }}">
                        <div class="form-sec">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nome e cognome">
                            @error ('name') <p class="alert alert-danger">{{ $message }}</p> @enderror <br>
                        </div>
                        <div class="form-sec">
                            <label for="email">e-mail</label>
                            @if (Auth::user())
                                <input type="email" id="email" name="email" placeholder="e-mail" readonly value="{{ Auth::user()->email }}">
                            @else
                                <input type="email" id="email" name="email" placeholder="e-mail" value="{{ old('email') }}">
                            @endif

                            @error ('email') <p class="alert alert-danger">{{ $message }}</p> @enderror <br>
                        </div>
                        <div class="form-sec">
                            <label for="message_obj">Oggetto</label>
                            <input type="text" id="message_obj" name="message_obj" value="{{ old('message_obj') }}" placeholder="Oggetto del messaggio">
                            @error ('message_obj') <p class="alert alert-danger">{{ $message }}</p> @enderror <br>
								</div>
								
                        <div class="form-sec nobor">
                            <label for="message_body">Richiedi informazioni</label>
                            <textarea id="message_body" name="message_body" rows="5" placeholder="Richiedi informazioni">{{ old('message_body') }}</textarea>
                            @error ('message_body') <p class="alert alert-danger">{{ $message }}</p> @enderror <br>
								</div>
								
								<button type="submit" class="btn-bnb">Invia il messaggio</button>
								
                    </form>
					 </div>