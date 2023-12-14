<template>
	<div :id="'menu'" class="menu-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col xs-12 text-center"><a href="#" id="menu-btn" @click="changeStateMenu">MENÚ</a></div>
            </div>
        </div>

        <!-- <div class="container-fluid menu"> -->
        <div class="menu">
            <div class="row ">
                <div class="col-xs-3 col-md-3">
                	<div :class="['menu-item-wrapper', 'scene-1-wrapper', [scene_1_class]]" @click="(scene_1_text != 'bloqueado') ? goToScene1($event) : null">
						<h4 class="scene">ESCENA 1</h4>
						<h3 class="time">7 AM</h3>
						<h2 class="info">
								<a href="#" v-if="scene_1_text != 'bloqueado'" @click="goToScene1($event)">{{ scene_1_text }}</a>
								<span v-else>{{ scene_1_text }}</span>
						</h2>
						<div class="badget" v-if="scene_1_badget"><img src="/img/badgets/badget_1.png" alt=""></div>
						<div class="cover"></div>
                	</div>
                </div>
                <div class="col-xs-3 col-md-3">
					<div :class="['menu-item-wrapper', 'scene-2-wrapper', [scene_2_class]]" @click="(scene_2_text != 'bloqueado') ? goToScene2($event) : null">
							<h4 class="scene">ESCENA 2</h4>
							<h3 class="time">8:30 AM</h3>
							<h2 class="info">
									<a href="#" v-if="scene_2_text != 'bloqueado'" @click="goToScene2($event)">{{ scene_2_text }}</a>
									<span v-else>{{ scene_2_text }}</span>
							</h2>
							<div class="badget" v-if="scene_2_badget"><img src="/img/badgets/badget_2.png" alt=""></div>
							<div class="cover"></div>
                	</div>
                </div>
                <div class="col-xs-3 col-md-3">
					<div :class="['menu-item-wrapper', 'scene-3-wrapper', [scene_3_class]]" @click="(scene_3_text != 'bloqueado') ? goToScene3($event) : null">
							<h4 class="scene">ESCENA 3</h4>
							<h3 class="time">12:30 PM</h3>
							<h2 class="info">
									<a href="#" v-if="scene_3_text != 'bloqueado'" @click="goToScene3($event)">{{ scene_3_text }}</a>
									<span v-else>{{ scene_3_text }}</span>
							</h2>
							<div class="badget" v-if="scene_3_badget"><img src="/img/badgets/badget_3.png" alt=""></div>
							<div class="cover"></div>
                	</div>
                </div>
                <div class="col-xs-3 col-md-3">
					<div :class="['menu-item-wrapper', 'scene-4-wrapper', [scene_4_class]]" @click="(scene_4_text != 'bloqueado') ? goToScene4($event) : null">
							<h4 class="scene">ESCENA 4</h4>
							<h3 class="time">17:30 PM</h3>
							<h2 class="info">
									<a href="#" v-if="scene_4_text != 'bloqueado'" @click="goToScene4($event)">{{ scene_4_text }}</a>
									<span v-else>{{ scene_4_text }}</span>
							</h2>
							<div class="badget" v-if="scene_4_badget"><img src="/img/badgets/badget_4.png" alt=""></div>
							<div class="cover"></div>
                	</div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>
	export default {
		data: function() {
			return {
				scene_1_val: this.$store.state.scene_1,
				scene_2_val: this.$store.state.scene_2,
				scene_3_val: this.$store.state.scene_3,
				scene_4_val: this.$store.state.scene_4,
				scene_1_text: '',
				scene_2_text: '',
				scene_3_text: '',
				scene_4_text: '',
				scene_1_class: '',
				scene_2_class: '',
				scene_3_class: '',
				scene_4_class: '',
				scene_1_badget: false,
				scene_2_badget: false,
				scene_3_badget: false,
				scene_4_badget: false
			}
		},
		computed: {
			menu () {
				return this.$store.state.progress;
			},
			scene_1() {
				return this.$store.state.scene_1
			},
			scene_2() {
				return this.$store.state.scene_2
			},
			scene_3() {
				return this.$store.state.scene_3
			},
			scene_4() {
				return this.$store.state.scene_4
			}
		},
		mounted() {
			$.ajaxSetup({
					headers: {
							'X-CSRF-Token': Laravel.csrfToken
					}
			});
			switch (this.$store.state.scene_1) {
				case 0:
						this.scene_1_text = "bloqueado";
						this.scene_1_class = 'blocked';
					break;
				case 1:
						this.scene_1_text = "Continuar";
						this.scene_1_class = 'continue';
					break;
				case 2:
						this.scene_1_text = "Repetir";
						this.scene_1_class = 'repeat';
						this.scene_1_badget = true;
					break;
			}

			switch (this.$store.state.scene_2) {
				case 0:
						this.scene_2_text = "bloqueado";
						this.scene_2_class = 'blocked';
					break;
				case 1:
						this.scene_2_text = "Continuar";
						this.scene_2_class = 'continue';
					break;
				case 2:
						this.scene_2_text = "Repetir";
						this.scene_2_class = 'repeat';
						this.scene_2_badget = true;
					break;
			}

			switch (this.$store.state.scene_3) {
				case 0:
						this.scene_3_text = "bloqueado";
						this.scene_3_class = 'blocked';
					break;
				case 1:
						this.scene_3_text = "Continuar";
						this.scene_3_class = 'continue';
					break;
				case 2:
						this.scene_3_text = "Repetir";
						this.scene_3_class = 'repeat';
						this.scene_3_badget = true;
					break;
			}

			switch (this.$store.state.scene_4) {
				case 0:
						this.scene_4_text = "bloqueado";
						this.scene_4_class = 'blocked';
					break;
				case 1:
						this.scene_4_text = "Continuar";
						this.scene_4_class = 'continue';
					break;
				case 2:
						this.scene_4_text = "Repetir";
						this.scene_4_class = 'repeat';
						this.scene_4_badget = true;
					break;
			}
		},
		watch: {
			scene_1 () {
				this.scene_1_val = this.$store.state.scene_1;
				switch (this.$store.state.scene_1) {
					case 0:
							this.scene_1_text = "bloqueado";
							this.scene_1_class = 'blocked';
						break;
					case 1:
							this.scene_1_text = "Continuar";
							this.scene_1_class = 'continue';
						break;
					case 2:
							this.scene_1_text = "Repetir";
							this.scene_1_class = 'repeat';
							this.scene_1_badget = true;
						break;
				}
			},
			scene_2 () {
				this.scene_2_val = this.$store.state.scene_2;
				switch (this.$store.state.scene_2) {
					case 0:
							this.scene_2_text = "bloqueado";
							this.scene_2_class = 'blocked';
						break;
					case 1:
							this.scene_2_text = "Continuar";
							this.scene_2_class = 'continue';
						break;
					case 2:
							this.scene_2_text = "Repetir";
							this.scene_2_class = 'repeat';
							this.scene_2_badget = true;
						break;
				}
			},
			scene_3 () {
				this.scene_3_val = this.$store.state.scene_3;
				switch (this.$store.state.scene_3) {
					case 0:
							this.scene_3_text = "bloqueado";
							this.scene_3_class = 'blocked';
						break;
					case 1:
							this.scene_3_text = "Continuar";
							this.scene_3_class = 'continue';
						break;
					case 2:
							this.scene_3_text = "Repetir";
							this.scene_3_class = 'repeat';
							this.scene_3_badget = true;
						break;
				}
			},
			scene_4 () {
				this.scene_4_val = this.$store.state.scene_4;
				switch (this.$store.state.scene_4) {
					case 0:
							this.scene_4_text = "bloqueado";
							this.scene_4_class = 'blocked';
						break;
					case 1:
							this.scene_4_text = "Continuar";
							this.scene_4_class = 'continue';
						break;
					case 2:
							this.scene_4_text = "Repetir";
							this.scene_4_class = 'repeat';
							this.scene_4_badget = true;
						break;
				}
			}
		},
		methods: {
			goToScene1 (event) {
				if (event) event.preventDefault();
				var vm = this;
				$.ajax({
						method: 'POST',
						url: '/update-progress',
						data:{
								progress: 1
						},
						success: function(data) {
								vm.$store.dispatch('UPDATE_PROGRESS', 1);
								window.location.href = '/peaton';
						}
				});

			},
			goToScene2 (event) {
				if (event) event.preventDefault();
				var vm = this;
				$.ajax({
						method: 'POST',
						url: '/update-progress',
						data:{
								progress: 2
						},
						success: function(data) {
								vm.$store.dispatch('UPDATE_PROGRESS', 2);
								window.location.href = '/peaton';
						}
				});

			},
			goToScene3 (event) {
				if (event) event.preventDefault();
				var vm = this;

				$.ajax({
						method: 'POST',
						url: '/update-progress',
						data: {
							progress: 3
						},
						success: function(data) {
								vm.$store.dispatch('UPDATE_PROGRESS', 3);
								window.location.href = '/peaton';
						}
				});

			},
			goToScene4 (event) {
				if (event) event.preventDefault();
				var vm = this;
				$.ajax({
						method: 'POST',
						url: '/update-progress',
						data:{
								progress: 6
						},
						success: function(data) {
								vm.$store.dispatch('UPDATE_PROGRESS', 6);
								window.location.href = '/peaton';
						}
				});
			},
			changeStateMenu () {
				// console.log('Actual menu state', this.$store.state.isMenuOpen);
				var vc = $('.video-paused-container');
				if (this.$store.state.isMenuOpen == true ) {
					// this.$store.state.isMenuOpen = false;
					this.$store.dispatch('UPDATE_MENU_STATE', false);

					// Remove animated clases
					vc.find('.title').removeClass('animated bounceInLeft');
					vc.find('.subtitle').removeClass('animated bounceInLeft');
					vc.find('.time').removeClass('animated bounceInLeft');
					vc.find('.item p').removeClass('animated bounceInRight');
				} else {
					// this.$store.state.isMenuOpen = true;
					this.$store.dispatch('UPDATE_MENU_STATE', true);

					// Add animated clases
					vc.find('.title').addClass('animated bounceInLeft');
					vc.find('.subtitle').addClass('animated bounceInLeft');
					vc.find('.time').addClass('animated bounceInLeft');
					vc.find('.item p').addClass('animated bounceInRight');

					var save = false;
					var position = this.$store.state.video_progress;

					if( this.$store.state.scene_1 == 1 && this.$store.state.progress == 1) {
						save = true;
					}

					if ( this.$store.state.scene_2 == 1 && this.$store.state.progress == 2) {
						save = true;
					}

					if ( this.$store.state.scene_3 == 1 && this.$store.state.progress == 3) {
						save = true;
					}

					if ( this.$store.state.scene_4 == 1 && this.$store.state.progress == 6) {
						save = true;
					}

					if ( save == true ) {
						$.ajax({
							method: 'POST',
							url: '/update-video-progress',
							data: {
								position: position
							},
							success: function(data) {
								console.log(data);
							}
						});
					}
				}
			}
		}
	}
</script>
