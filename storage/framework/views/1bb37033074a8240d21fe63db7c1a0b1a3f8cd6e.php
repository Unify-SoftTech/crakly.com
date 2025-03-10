<div class="row">
<?php $records=MyFunctions::getSuggestionAccount(); 
if(count($records)>0){ ?>
			<div class="col-lg-12 col-md-6 col-12 video-rightbar-main">
						<h3 style="<?php echo e(MyFunctions::getTopbarColor()); ?>">Suggested Accounts</h3>
						<?php
						foreach($records as $res){ ?>
						<div class="video-profile-tab">
							<?php 
							if($res->user_dp!=""){
							if(strpos($res->user_dp,'facebook.com') !== false || strpos($res->user_dp,'fbsbx.com') !== false || strpos($res->user_dp,'googleusercontent.com') !== false){ ?>
								<img src="<?php echo $res->user_dp ;?>" alt="" />
							<?php }else{
								// $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$res->user_id.'/small/'.$res->user_dp);
								// if($exists){
								//if(file_exists(public_path('storage/profile_pic').'/'.$res->user_id.'/small/'.$res->user_dp)){ ?>
							<img src="<?php echo asset(Storage::url('public/profile_pic/'.$res->user_id.'/small/'.$res->user_dp)) ;?>" alt="" />
							<?php //}else{ ?>
								<!-- <img src="<?php //echo asset('storage/profile_pic/default.png');?>" alt="" /> -->
							<?php //} 
								} 
							}else{ ?>
								<img src="<?php echo asset('default/default.png');?>" alt="" />
							<?php }  ?>
							<a class="pjax" href="<?php echo e(route('web.userProfile', $res->user_id)); ?>"><h4><?php echo e($res->fname); ?> <?php echo e($res->lname); ?></h4></a>
							<h5>@<?php echo $res->username; ?>
							<?php if($res->verified=='A'){ ?>
								<img src="<?php echo e(asset('default/verified-icon-blue.png')); ?>" alt="" style="width:15px;height:15px;float:revert">
							<?php } ?>
							</h5>
							<span class="follow_btn" data-id="<?php echo $res->user_id; ?>" style="<?php echo e(MyFunctions::getTopbarColor()); ?>">
								<?php if($res->follow>0){
									echo "Unfollow";
								}else{
									echo "Follow";
								} ?>
							</span>
						</div>
						<?php } ?>
					</div>
						<?php $sponsors_res=MyFunctions::getSponsors();
							if(count($sponsors_res)>0){
								foreach($sponsors_res as $sponsor){
						?>	
							<a href="<?php echo $sponsor->url; ?>">
								<div class="col-lg-12 col-md-6 col-12 video-rightbar-main">
									<h3 style="<?php echo e(MyFunctions::getTopbarColor()); ?>"><?php echo e($sponsor->heading); ?></h3>
									<div class="sponsored">
									<?php  //$exists = Storage::disk(config('app.filesystem_driver'))->exists('public/sponsors/'.$sponsor->image);
											//if($exists){ ?>
												<img src="<?php echo asset(Storage::url('public/sponsors/').$sponsor->image); ?>" alt="" style="max-width:80%"/>
											<?php //} ?>
										
										<h3><?php echo e($sponsor->title); ?></h3>
										<a href="#"><?php echo e($sponsor->url); ?></a>
									</div>
								</div>
							</a>
							<?php } 
							}
							?>
								
					<!-- <div class="col-12 col-lg-12 video-sm text-center " >
						<ul style="display: inline-flex;">
							<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						</ul>
					</div> -->
				</div>
			<?php } ?><?php /**PATH E:\wamp64\www\crakly\resources\views/includes/leftSidebar.blade.php ENDPATH**/ ?>