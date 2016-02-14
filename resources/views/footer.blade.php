<footer id="footer">
	<form action="{{ url('/newsletter') }}" method="post" id="newsletter-form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		{{-- Honey pot to trick the bots --}}
		<input type="text" id="thepot" name="thename" placeholder="Name" />

		{{-- Errors / Success --}}
		<div class="row">
			<div class="large-12 columns errors hide"></div>
			<div class="large-12 columns thanks hide">
				<p class="alert-box success">You are now subscribed to the newsletter!</p>
			</div>
		</div>

		<div class="row">
			<div class="large-4 medium-4 columns">
				<label>Email</label>
				<input type="email" name="email" placeholder="Email" required />
			</div>
			<div class="large-4 medium-4 columns">
				<button type="submit" class="button">
					Subscribe
				</button>
			</div>
			<div class="large-4 medium-4 columns"></div>
		</div>
	</form>
</footer>