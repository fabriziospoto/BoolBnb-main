<script id="entry-template" type="text/x-handlebars-template">

		<a href="/guest/show/{{ id }}" {{#if promo}} class='card-in-search sponsoredsrc' {{else}} class='card-in-search' {{/if}}>
			<span class="card-search-left-side">
				<div class="card-src-im">
					<img src="{{ image }}" alt="{{ title }}">
				</div>
			</span>
			{{#if promo}}
			<span class="sponsored-card-search">sponsored</span>
			{{/if}}
			<span class="card-search-right-side">
				<p class="apartment_categories-src">{{ category }}</p>
				<h4 class="apartment_title-src">{{ title }}</h4>
				<p class="apartment_position-src">{{ address }}</p>
				<div class="apartment-comp-src">
					<span>
						<i class="fas fa-home"></i>
						<span>{{ size }} m²</span>
					</span>
					<span>
						<i class="fas fa-door-open"></i>
						<span>{{ room_number }}</span>
					</span>
					<span>
						<i class="fas fa-bed"></i>
						<span>{{ bed_number }}</span>
					</span>
					<span>
						<i class="fas fa-toilet-paper"></i>
						<span>{{ bath_number }}</span>
					</span>
				</div>
				<div class="apartment-comp-src">
					{{#each services}}
					<span class="extra-active">
						<i class='fas fa-{{this.icon}}'></i>
					</span>
					{{/each}}
				</div>
			</span>			

			<div class="position" hidden>
					<p class='lat'>{{latitude}}</p>
					<p class='long'>{{longitude}}</p>
			</div>
		</a>
</script>
