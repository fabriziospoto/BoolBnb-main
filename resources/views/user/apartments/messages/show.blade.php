@extends('layouts.app')
@section('header')
	@include("layouts.partials.header_all")
@endsection
@section('content')
<div class="container-all">
	<div class="cont-max-wdt mycont">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		
		@if(count($messages) > 0)
			@if(Auth::user()->id == $messages[0]->apartment->user_id)			
				@foreach ($messages as $message)
					<div class="message-box mex-1 ">
						<div class="mex-box-t1 bold-t2 ">
							<div class="mex-action-t2"> {{ $message->name }} </div>
							<div class=" none-mex mex-action2-t2"> {{ $message->message_obj}} </div>
						</div>
						<div class="mex-box-t2 ">
							<button type="button"  class="btn-edit-t2 mr-2"  data-toggle="modal" data-target="#staticBackdrop">Visualizza</button>
								<form action="{{ route('message.destroy', $message->id) }}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn-delete-t2 mr-2"><i class="fas fa-trash"></i></button>
								</form>
								<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg modal-dialog-centered  modal-dialog-scrollable">
										<div class=" modal-content modal-content-mt2">
											<div class="modal-header">
												<div class="modal-header-t2">
													<h5 class="modal-title" id="staticBackdropLabel">{{ $message->message_obj }}</h5>
													<div>
														<small>Da: <em>{{ $message->email }}</em></small> <br>
														<small> <em>{{ $message->created_at }}</em> </small>
													</div>
												</div>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body ">
											{{ $message->message_body }}
										</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				@endforeach
			@else
				<div class="alert alert-danger">
					<p>Non hai i permessi per accedere alla pagina</p>
				</div>
			@endif
		@else
			<div class="text-center mt-5">
				<p>Non hai ricevuto messaggi</p>
			</div>
		@endif
	</div>
</div>
@endsection
