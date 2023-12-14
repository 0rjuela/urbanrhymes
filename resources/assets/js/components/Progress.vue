<template>
	<div class="progress-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-8 text-right level-info">
					Tu nivel de
					<h3>cheveridad</h3>
				</div>
				<div class="col-xs-4 percentage-info" v-if="completed != 1">
					{{ menu.videos[progress].progressNumber }} %
				</div>
				<div class="col-xs-4 percentage-info" v-else>
					100 %
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="progress">
						<div class="progress-bar" role="progressbar" :aria-valuenow="menu.videos[progress].progressNumber" aria-valuemin="0" aria-valuemax="100" :style="{width:menu.videos[progress].progressNumber + '%'}" v-if="completed != 1"></div>
						<div class="progress-bar" role="progressbar" :aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;" v-else></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center msg-info" v-if="completed != 1">
					¡{{ menu.videos[menu.progress].progressMsg }}!
				</div>
				<div class="col-xs-12 text-center msg-info" v-else>
					¡{{ menu.videos[7].progressMsg }}!
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<a href="/logout" class="btn btn-logout btn-block">Log out</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			actualprogress: {
				required: true
			},
			videos: {
				required: true
			},
			menu: {
				required: true
			}
		},
		data: function() {
			return {
				// progress: this.actualprogress,
				arraySize: this.menu.videos.length,
				percentage: this.roundPercentage(this.menu.progress, this.menu.videos.length),
				styleObject: {
					//width: Math.round( (this.menu.progress / this.menu.videos.length) * 100 ) + '%',
					width: this.menu.videos[this.menu.progress].progressNumber + '%'
				},
			};
		},
		mounted() {
			// console.log('Progress mounted');
			// console.log('Desde Progress', this.$store.state.progress);
		},
		methods: {
			roundPercentage: function(progress, arraySize) {
				var calc = Math.round((progress / arraySize) * 100);
				return calc;
			}
		},
		computed: {
			progress () {
				return this.$store.state.progress;
			},
			completed() {
				return this.$store.state.completed;
			}
		},
		watch: {
			menu: function(val) {
				this.styleObject.width = this.menu.videos[val].progressNumber + '%'
			}
		}
	}
</script>
