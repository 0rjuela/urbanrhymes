<template>
	<div class="video-wrapper">
        <div class="video-container" v-if="isNotEnding">
    		<div class="opt-1" @click="goodAnswer" v-if="showControl"></div>
    		<div class="opt-2" @click="badAnswer" v-if="showControl"></div>
    		<video :id="'video'" autoplay ref="videoEl" @ended="videoEnd" @timeupdate="currentTime" @loadeddata="loading">
    			<source :src="videourl" type="video/mp4">
    		</video>
            <div class="video-loader" v-if="showLoader"><img src="/img/loader.gif" alt="Loading"></div>
        </div>
        <div class="share" v-if="isEnding">
            <img src="/img/share.png" alt="Compartir" class="img-responsive">
						<div class="share-icons-wrapper">
                <ul>
                    <li>
						<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fcocodrilo.com.co&ref_src=twsrc%5Etfw&related=twitterapi%2Ctwitter&text=%C2%BFAfligido%20por%20el%20v%C3%A9rtigo%20de%20andar%20en%20la%20urbe%3F%20%C2%A1Practica%20con%20un%20juego%20que%20no%20te%20perturbe!&tw_p=tweetbutton&url=http%3A%2F%2Fcocodrilo.com.co" target="_blank">
                	    <i class="share-icon icon-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=http%3A%2F%2Fcocodrilo.com.co%2F&display=popup&ref=plugin&src=share_button&description=%C2%BFAfligido%20por%20el%20v%C3%A9rtigo%20de%20andar%20en%20la%20urbe%3F%20%C2%A1Practica%20con%20un%20juego%20que%20no%20te%20perturbe!" target="_blank">
                            <i class="share-icon icon-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=http://cocodrilo.com.co&title=Cocodrilo&summary=%C2%BFAfligido%20por%20el%20v%C3%A9rtigo%20de%20andar%20en%20la%20urbe%3F%20%C2%A1Practica%20con%20un%20juego%20que%20no%20te%20perturbe!&source=LinkedIn" target="_blank">
                            <i class="share-icon icon-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
		<div :class="['video-paused', {active:isMenuOpen}]">
			<div class="container">
				<div class="video-paused-container">
					<div class="item">
						<div class="time">
							<span>{{ videos[progress].pausedTime }}</span> {{ videos[progress].pausedScene }} <i class="fa fa-star"></i>
						</div>
						<div class="content">
							<h3 class="subtitle">{{ videos[progress].pausedSubtitle }}</h3>
							<h2 class="title">{{ videos[progress].pausedTitle }}</h2>
						</div>
					</div>
					<div class="item" v-html="videos[progress].pausedText"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
    	props: {
    		current: {
    			type: String,
    			required: true
    		},
            baseprogress: {
                required: true
            },
            baseurl: {
                type: String,
                required: true
            },
            videos: {
                required: true
            },
            menudata: {
                required: true
            },
			videoprogress: {
				required: true
			}
    	},
    	data: function() {
    		return {
                showControl: false,
                videourl: this.baseurl + this.current,
                //progress: this.$store.state.progress,
                badChoice: false,
                selectChoice: false,
                showLoader: true,
                isNotEnding: true,
                isEnding: false,
				scene_1_badChoice: 0,
				scene_2_badChoice: 0,
				scene_3_1_badChoice: 0,
				scene_3_2_badChoice: 0,
				scene_4_badChoice: 0,
				video_progress: this.videoprogress
    		}
    	},
      computed: {
			progress () {
				return this.$store.state.progress
			},
			isMenuOpen () {
				return this.$store.state.isMenuOpen
			}
      },
      mounted() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': Laravel.csrfToken
             		}
            });

			this.videourl = this.baseurl + this.current;
			window.onbeforeunload = this.leaving;
			window.onblur = this.leaving;
			//   window.onmouseout = this.leaving;

			if( this.$store.state.scene_1 == 1 && this.$store.state.progress == 1) {
				this.$refs.videoEl.currentTime = this.video_progress;
			}

			if ( this.$store.state.scene_2 == 1 && this.$store.state.progress == 2) {
				this.$refs.videoEl.currentTime = this.video_progress;
			}

			if ( this.$store.state.scene_3 == 1 && this.$store.state.progress == 3) {
				this.$refs.videoEl.currentTime = this.video_progress;
			}

			if ( this.$store.state.scene_4 == 1 && this.$store.state.progress == 6) {
				this.$refs.videoEl.currentTime = this.video_progress;
			}
      },
		watch: {
			progress () {
				// Check Global progress
				if (this.$store.state.completed == 0) {
					var vm = this;
					if (this.$store.state.progress == 1) {
						if (this.$store.state.scene_1 < 2) {
								// Continuar Escena 1
								$.ajax({
									method: 'POST',
									url: '/update-scene',
									data: {
										scene: 1,
										value: 1
									},
									success: function(data) {
										vm.$store.state.scene_1 = 1;
									}
								});
						}
					}

					if (this.$store.state.progress == 2) {
						// Repetir Escena 1
						$.ajax({
							method: 'POST',
							url: '/update-scene',
							data: {
								scene: 1,
								value: 2
							},
							success: function(data) {
								vm.$store.state.scene_1 = 2;
							}
						});

						if (this.$store.state.scene_2 < 2) {
							// Continuar Escena 2
							$.ajax({
								method: 'POST',
								url: '/update-scene',
								data: {
									scene: 2,
									value: 1
								},
								success: function(data) {
									vm.$store.state.scene_2 = 1;
								}
							});
						}
					}

					if (this.$store.state.progress == 3 || this.$store.state.progress == 4 || this.$store.state.progress == 5) {
						// Repetir Escena 2
						$.ajax({
							method: 'POST',
							url: '/update-scene',
							data: {
								scene: 2,
								value: 2
							},
							success: function(data) {
								vm.$store.state.scene_2 = 2;
							}
						});
						if (this.$store.state.scene_3 < 2) {
							// Continuar Escena 3
							$.ajax({
								method: 'POST',
								url: '/update-scene',
								data: {
									scene: 3,
									value: 1
								},
								success: function(data) {
									vm.$store.state.scene_3 = 1;
								}
							});
						}
					}

					if (this.$store.state.progress == 6) {
						// Repetir Escena 3
						$.ajax({
							method: 'POST',
							url: '/update-scene',
							data: {
								scene: 3,
								value: 2
							},
							success: function(data) {
								vm.$store.state.scene_3 = 2;
							}
						});
						if (this.$store.state.scene_4 < 2) {
							// Continuar Escena 4
							$.ajax({
								method: 'POST',
								url: '/update-scene',
								data: {
									scene: 4,
									value: 1
								},
								success: function(data) {
									vm.$store.state.scene_4 = 1;
								}
							});
						}
					}

					if (this.$store.state.progress == 7) {
						// Repetir escena 4
						$.ajax({
							method: 'POST',
							url: '/update-scene',
							data: {
								scene: 4,
								value: 2
							},
							success: function(data) {
								vm.$store.state.scene_4 = 2;
							}
						});
					}
				} // End global progress
			}, // End Watch progress
			isMenuOpen() {
				// console.log('Check state');
				if (this.$store.state.isMenuOpen == true) {
					this.$refs.videoEl.pause();
				} else {
					this.$refs.videoEl.play();
				}
			},
			isEnding() {				
				$('.video-paused .content').css({display:'none'});
				$('.video-paused .item').css({display:'none'});
			}
		},
      methods: {
            // Good answer action
            goodAnswer: function() {
                // Update the selected choice
                this.selectChoice = true;

                // Reset controls
                this.showControl = false;

                if ( this.$store.state.progress != 3 ) {

                    this.badChoice = false;

                    var vm = this;
                    var progress;

					if ( this.$store.state.progress == 4 ) {
                        progress = this.$store.state.progress + 2;
                        // this.menudata.progress = this.menudata.progress + 2;
                    } else {
						progress = this.$store.state.progress + 1;
                        // this.menudata.progress = this.menudata.progress + 1;
                    }
                    // Update the progress with ajax
                    $.ajax({
                        method: 'POST',
                        url: '/update-progress',
                        data:{
                            progress: progress
                        },
                        success: function(data) {
                            // Select good choice video
                            vm.videourl = vm.baseurl + vm.videos[vm.$store.state.progress].options.B;
							vm.$store.dispatch('UPDATE_PROGRESS', progress);

							// Load the new video
                            this.showLoader = true;
                            vm.$refs.videoEl.load();
                        }
                    });
                	} else {
                        var vm = this;

                        // Update the progress with ajax
						$.ajax({
                            method: 'POST',
                            url: '/update-progress',
                            data:{
                                progress: vm.$store.state.progress + 1,
                            },
                            success: function(data) {
                                // Select good choice video
                                vm.videourl = vm.baseurl + vm.videos[vm.$store.state.progress].options.B;
								vm.$store.dispatch('UPDATE_PROGRESS', vm.$store.state.progress + 1);

                                // Load the new video
                                this.showLoader = true;
                                vm.$refs.videoEl.load();
                            }
                        });
                }

            },
            //Bad answer action
            badAnswer: function() {
                // Update select choice
                this.selectChoice = true;

                // Hide options
                this.showControl = false;

                if ( this.$store.state.progress != 3 ) {

                    // Update Bad Choice
                    this.badChoice = true;

                    // Change video
                    this.videourl = this.baseurl + this.videos[this.$store.state.progress].options.M;

					// Count the bad choices select
					switch (this.$store.state.progress) {
						case 1:
							this.scene_1_badChoice++;
							if (this.scene_1_badChoice > 1) {
								let url = 'img/meme/E01_doble.jpg';
								window.open(url, '_blank');
							}
							break;
						case 2:
							this.scene_2_badChoice++;
							if (this.scene_2_badChoice > 1) {
								let url = 'img/meme/E02_doble.jpg';
								window.open(url, '_blank');
							}
							break;
						case 4:
							this.scene_3_1_badChoice++;
							if (this.scene_3_1_badChoice > 1) {
								let url = 'img/meme/E03_doble.jpg';
								window.open(url, '_blank');
							}
							break;
						case 5:
							this.scene_3_2_badChoice++;
							if (this.scene_3_2_badChoice > 1) {
								let url = 'img/meme/E03_doble.jpg';
								window.open(url, '_blank');
							}
							break;
						case 6:
							this.scene_4_badChoice++;
							if (this.scene_4_badChoice > 1) {
								let url = 'img/meme/E04_doble.jpg';
								window.open(url, '_blank');
							}
							break;
						default:
							console.log('Default');
							break;

					}

					// Reload the video
                    this.showLoader = true;
                    this.$refs.videoEl.load();
                } else {
		                var vm = this;

		                // Update the progress with ajax
		                $.ajax({
		                    method: 'POST',
		                    url: '/update-progress',
		                    data:{
		                        progress: vm.$store.state.progress + 2,
		                    },
		                    success: function(data) {
		                        // Select good choice video
		                        vm.videourl = vm.baseurl + vm.videos[vm.$store.state.progress].options.M;
								vm.$store.dispatch('UPDATE_PROGRESS', vm.$store.state.progress + 2);

		                        // Load the new video
		                        this.showLoader = true;
		                        vm.$refs.videoEl.load();
		                    }
		                });
                }

            },
            /**
             * Video end action
             */
            videoEnd: function() {

                if ( this.$store.state.progress == 0 ) {
                    this.showControl = false;
                    // Update progress
                    var vm = this;
					this.$store.dispatch('UPDATE_PROGRESS', this.$store.state.progress + 1);

					$.ajax({
                        method: 'POST',
                        url: '/update-progress',
                        data:{
                            progress: vm.$store.state.progress
                        },
                        success: function(data) {
                          	vm.videourl = vm.baseurl + vm.videos[vm.$store.state.progress].url

							// Play video
							this.showLoader = true;
                            vm.$refs.videoEl.load();
                        }
                    });

                } else if( this.$store.state.progress == 7 ) {
						this.showLoader = true;
						this.videourl = this.baseurl + this.videos[this.$store.state.progress].url;
						this.$store.dispatch('UPDATE_PROGRESS', this.$store.state.progress + 1);
						// Update the completed value
						$.ajax({
							method: 'POST',
							url: '/set-completed',
							data:{
									completed: 1
							},
							success: function(data) {
								// console.log(data);	
								$('.video-paused .content').css({display:'none'});
								$('.video-paused .item').css({display:'none'});
															
							}
						});
						this.$refs.videoEl.load();

				} else if( this.$store.state.progress == 8 ) { // The end
						this.showLoader = false;
						this.isNotEnding = false;
						this.isEnding = true;

				} else {

                    if ( this.selectChoice != false ) {
                        // Update choice
                        this.selectChoice = false;

                        // Hide controls
                        this.showControl = false;

                        if( this.badChoice == true ) {
                            // Update bad choice
                            this.badChoice = false;
                            // Update video url
                            this.videourl = this.baseurl + this.videos[this.$store.state.progress].url;


							// Play video
                            this.showLoader = true;
                            this.$refs.videoEl.load();
							// Return to select point
							this.$refs.videoEl.currentTime = this.videos[this.$store.state.progress].returnPoint;
                        } else {
							// Update video URL
							this.videourl = this.baseurl + this.videos[this.$store.state.progress].url;
							// Load new video
							this.showLoader = true;
							this.$refs.videoEl.load();
                        }


                    }
                }
            },
            currentTime: function(e) {

                if( this.$store.state.progress != 0 || this.$store.state.progress != 7 ) {

					this.$store.dispatch('UPDATE_VIDEO_PROGRESS', this.$refs.videoEl.currentTime);

					var videoLength =  this.$refs.videoEl.duration;
                    var videoCurrentTime = this.$refs.videoEl.currentTime;
                    // var videoEnding = videoLength - ( videoLength * 0.25 );
                    var videoEnding = this.videos[this.$store.state.progress].returnPoint + 4;

                    if( videoCurrentTime >= videoEnding ) {
                        //console.log('Casi termina');
                        this.showControl = true;
                    }
                }
            },
            loading: function() {
                this.showLoader = false;
            },
			leaving: function () {
				if (this.$store.state.progress == 1 ||
					this.$store.state.progress == 2 ||
					this.$store.state.progress == 3 ||
					this.$store.state.progress == 4 ||
					this.$store.state.progress == 5 ||
					this.$store.state.progress == 6 ) {
					var position = this.$refs.videoEl.currentTime;
					var save = false;

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
