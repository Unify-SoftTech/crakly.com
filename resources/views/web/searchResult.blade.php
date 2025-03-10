@extends('layouts.front')

@section('content')
<style>
 .bg-btn{
        /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
		
		padding: 10px 0;
    color: #fff;
    border-radius: 2px;
    }
	#myTab li{
		text-align: center;
    	font-size: 20px;
		
	}
	#myTab li a{
		padding: 12px;
	}
	/* .nav-item .active{
		color: "{{MyFunctions::getTopbarColor()}}";
	
	} */
	.tag{
		border: 1px solid;
		padding: 6px;
		display: inline-block;
		border-radius: 4px;
		text-align: center;
		min-width: 100%;
		font-size: 20px;
		background: #656464;
		color: #fefefe;
		border-color: #656464;
		margin: 5px 0px;
	}
	.card{
		padding-top: 10px;
	}
	#peopleResult .card .card-img-top,.allPeople .card .card-img-top{
		width: 100px;
    	margin: auto;
		border-radius: 50%;
	}
	.follow_btn {
		padding: 10px 16px 7px 16px;
		font-size: 14px;
	}

	#peopleResult .card,#videoResult .card,.allVideo .card{
		background: #ebeaea;
	}
	#videoResult .video-thumb,.allVideo .video-thumb{
		height:350px;
		border-bottom: 1px solid #ccc;
	}
	#videoResult .video-thumb img,.allVideo .video-thumb img{
		height: 100%;
		object-fit: cover;
	}
	#videoResult .card-body p,.allVideo .card-body p{
		margin-bottom: .25rem!important;
	}
	.viewMore{
		padding: 6px 10px;
		display: inline-block;
		margin-top: 12px;
		color: #007bff !important;
		cursor: pointer;
	}
	.loadMoreResult{
		padding: 7px 14px;
		border: 0px;
		background: #c8cdcd;
		border-radius: 4px;
		cursor: pointer;
	}
	.loadMoreResult:focus{
		border: 0px;
		outline: none;
	}
	.moreVideo .card-body{
		min-height: 100px;
	}
	.video-container,.video-section{
		width: 100%;
		min-height: 440px;
		height: 440px;
		object-fit: fill;
		cursor: pointer;
		/* background:#000; */
	}
	.video_title{
		max-height: 140px;
		overflow-y: scroll;
	}
</style>
@include('includes.topbar')
	<section class="h4-about s-padding ">
		
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-12">
					<div class="about-content">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
							
							<ul class="nav nav-tabs row" id="myTab" role="tablist">		
									<li class="nav-item col-md-3 col-6">
										<a class="nav-link <?php echo ($active=='A') ? 'active' : ''; ?>" id="all_tab" data-bs-toggle="tab" href="#allResult" role="tab" aria-controls="allResult" aria-selected="true"> All</a>
									</li>
									<li class="nav-item col-md-3 col-6">
										<a class="nav-link <?php echo ($active=='T') ? 'active' : ''; ?>" id="tags_tab" data-bs-toggle="tab" href="#tagResult" role="tab" aria-controls="tagResult" aria-selected="true"> Tags</a>
									</li>
									<li class="nav-item col-md-3 col-6">
										<a class="nav-link <?php echo ($active=='P') ? 'active' : ''; ?>" id="people_tab" data-bs-toggle="tab" href="#peopleResult" role="tab" aria-controls="peopleResult" aria-selected="true"> People</a>
									</li>
									<li class="nav-item col-md-3 col-6">
										<a class="nav-link <?php echo ($active=='V') ? 'active' : ''; ?>" id="video_tab" data-bs-toggle="tab" href="#videoResult" role="tab" aria-controls="videoResult" aria-selected="true"> Video</a>
									</li>
									
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="tab-content col-md-12" id="myTabContent">
								<div class="row tab-pane fade <?php echo ($active=='A') ? 'show active' : ''; ?>" id="allResult" role="tabpanel" aria-labelledby="allResult">
									<div class="row">
										<div class="col-md-8">
											<h3 class="mt-2">Tags</h3>
										</div>
										@if(count($hashTags)>0)
										<div class="col-md-4 text-right"><a class="viewMore" id="viewMoreTags">View More</a></div>
										@endif
									</div>
									<div class="row allTag">
										<?php 
										if(count($hashTags)>0){
										$x=1;
										foreach($hashTags as $tag){ 
											$tagArr= explode(' ',$tag);
												foreach($tagArr as $val){
													if($x<=12){
														if(strpos($val,$search)  !== false){
														?>
														<div class="col-md-3 col-12">
															<div class="card text-white bg-dark p-0 mb-3" style="max-width: 18rem;">
																<div class="card-body p-1 text-center">
																<?php if(strpos($val,'#') !== false){
																			if((strpos($val,'#'))==0){
																				$value=$val;
																				$par= trim($val,'#');
																			}else{
																				$value= '#'.$val;
																				$par=$val;
																			}
							
																		}else{
																			$value='#'.$val;
																			$par=$val;
																		} 
																		
																		?>
																	<a class="pjax text-white" href="{{ route('web.tagVideos', $par) }}">
																		<h5 class="card-title m-1">
																		{{$value}}
																	</h5>
																	</a>
																</div>
															</div>
														</div>
												<?php  	$x++;	
														}
													}
												}
										} 
									}else{ ?>
											<div class="col-md-12">
												<h6 class="mt-2">
													No Tag Found...
												</h6>
											</div>
									<?php } 
									 ?>
									</div>
									<br />
									<hr />

									<div class="row">
										<div class="col-md-8">
											<h3 class="mt-2">People</h3>
										</div>
										@if(count($users)>0)
										<div class="col-md-4 text-right"><a class="viewMore" id="viewMorePeople">View More</a></div>
										@endif
									</div>
									<div class="row mt-2 allPeople">
										<?php 
										// echo 'aaaaaa '.count($users);
										if(count($users)>0){
										foreach($users as $user){ ?>
										<div class="col-lg-3 col-md-6 col-12">
											<div class="card mb-4" >
												<img class="card-img-top" src="{{$user->user_dp}}" alt="Card image cap">
												<div class="card-body text-center">
													<h4 class="card-title mb-0"><a class="pjax" href="{{ route('web.userProfile', $user->user_id) }}"><?php echo ucfirst($user->fname) .' '. ucfirst($user->lname); ?></a></h4>
													<p class="card-text mb-1"><a class="pjax" href="{{ route('web.userProfile', $user->user_id) }}">{{ strtolower($user->username) }}</a></p>
													
													<span class="follow_btn" data-id="<?php echo $user->user_id; ?>" style="{{MyFunctions::getTopbarColor()}}">
														<?php if($user->follow>0){
															echo "Unfollow";
														}else{
															echo "Follow";
														} ?>
													</span>
												</div>
											</div>
										</div>
										<?php } 
										}else{ ?>
											<div class="col-md-12">
												<h6 class="mt-2">
													No Record Found...
												</h6>
											</div>
									<?php } 
										?>
									</div>
									<br />
									<hr />
									<div class="row">
										<div class="col-md-8">
											<h3 class="mt-2">Videos</h3>
										</div>
										@if(count($videos))
											<div class="col-md-4 text-right"><a class="viewMore" id="viewMoreVideo">View More</a></div>
										@endif
									</div>
									<div class="row mt-2 allVideo">
										<?php 
										if(count($videos)){
										$count=0;
										foreach($videos as $video){ ?>
										<div class="col-lg-3 col-md-6 col-12">
											<div class="card mb-4 pt-0" >
												<div class="video-thumb">
													<!-- <img class="card-img-top" src="{{$video->thumb}}" alt="Card image cap"> -->
													<video muted="muted" id="video_{{$count}}" data-bs-toggle="modal" data-bs-target="#LeukeModal"  
														onmouseover="hoverVideo('{{$count}}')" onmouseout="hideVideo('{{$count}}')" class="img-responsive card-img-top" style="height:100%;border-radius: 8px;background: #000;"
														loop preload="none" onclick="modelbox_open('{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}', {{ $video->video_id }}, video_{{$count}})"
														poster="{{  $video->thumb }}">
														<source src="{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}" type="video/mp4">
													</video>
												</div>
												<div class="card-body">
													<h5 class="card-title mb-0">{{ strtolower($video->username) }}</h5>
													<p class="card-text mb-1"><?php echo (strlen($video->description) > 30 ) ? mb_substr($video->description, 0, 30).'...' : $video->description; ?></p>
													
													<!-- <span class="follow_btn" data-id="<?php //echo $user->user_id; ?>" style="{{MyFunctions::getTopbarColor()}}">
														<?php 
														// if($user->follow>0){
														// 	echo "Unfollow";
														// }else{
														// 	echo "Follow";
														// } 
														?>
													</span> -->
												</div>
											</div>
										</div>
										<?php
										$count++;
										} 
									}else{ ?>
										<div class="col-md-12">
											<h6 class="mt-2">
												No Video Found...
											</h6>
										</div>
									<?php } ?>
									</div>


								</div>
								<div class="row tab-pane fade <?php echo ($active=='T') ? 'show active' : ''; ?>" id="tagResult" role="tabpanel" aria-labelledby="tagResult">
									<div class="row">
										<div class="col-md-12">
											<h3 class="mt-2">Tags</h3>
										</div>
									</div>
									<div class="row moreTags">
								
										<?php 
										foreach($hashTags as $tag){ ?>
											<?php $tagArr= explode(' ',$tag);
												foreach($tagArr as $val){
													if(strpos($val,$search)  !== false){ ?>
												<div class="col-md-3 col-12">
													<!-- <span class="tag">{{'#'.$tag}}</span> -->
													<div class="card text-white bg-dark p-0 mb-3" style="max-width: 18rem;">
														<div class="card-body p-1 text-center">
														<?php if(strpos($val,'#') !== false){
																			if((strpos($val,'#'))==0){
																				$value=$val;
																				$par= trim($val,'#');
																			}else{
																				$value= '#'.$val;
																				$par=$val;
																			}
							
																		}else{
																			$value='#'.$val;
																			$par=$val;
																		} ?>
															<a class="pjax text-white" href="{{ route('web.tagVideos', $par) }}">
																<h5 class="card-title m-1">{{$value}}</h5>
															</a>
														</div>
													</div>
												</div>
										<?php 	}
											}
										} ?>

										
									</div>
									@if($loadedVideoTags < $totalVideoTags)
										<div class="col-12 text-center">
											<button class="loadMoreResult m-2" type="T">Load More..</button>
										</div>
									@endif
								</div>
								<div class="row tab-pane fade <?php echo ($active=='P') ? 'show active' : ''; ?>" id="peopleResult" role="tabpanel" aria-labelledby="peopleResult">
									<div class="row">
										<div class="col-md-12">
											<h3 class="mt-2">People</h3>
										</div>
									</div>
									<div class="row mt-2 morePeople">
										<?php foreach($users as $user){ ?>
										<div class="col-lg-3 col-md-6 col-12">
											<div class="card mb-4" >
												<img class="card-img-top" src="{{$user->user_dp}}" alt="Card image cap">
												<div class="card-body text-center">
													<h4 class="card-title mb-0"><a class="pjax" href="{{ route('web.userProfile', $user->user_id) }}"><?php echo ucfirst($user->fname) .' '. ucfirst($user->lname); ?></a></h4>
													<p class="card-text mb-1"><a class="pjax" href="{{ route('web.userProfile', $user->user_id) }}">{{ strtolower($user->username) }}</a></p>
													
													<span class="follow_btn" data-id="<?php echo $user->user_id; ?>" style="{{MyFunctions::getTopbarColor()}}">
														<?php if($user->follow>0){
															echo "Unfollow";
														}else{
															echo "Follow";
														} ?>
													</span>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
									@if($loadedPeople < $totalPeople)
										<div class="col-12 text-center">
											<button class="loadMoreResult m-2" type="P">Load More..</button>
										</div>
									@endif
								</div>
								<div class="row tab-pane fade <?php echo ($active=='V') ? 'show active' : ''; ?>" id="videoResult" role="tabpanel" aria-labelledby="videoResult">
									<div class="row">
										<div class="col-md-12">
											<h3 class="mt-2">Videos</h3>
										</div>
									</div>
									<div class="row mt-2 moreVideo">
										<?php
										$count=0;
										foreach($videos as $video){ ?>
										<div class="col-lg-3 col-md-6 col-12">
											<div class="card mb-4 pt-0" >
												<div class="video-thumb">
													<!-- <img class="card-img-top" src="{{$video->thumb}}" alt="Card image cap"> -->
													<video muted="muted" id="video_{{$count}}" data-bs-toggle="modal" data-bs-target="#LeukeModal"  
														onmouseover="hoverVideo('{{$count}}')" onmouseout="hideVideo('{{$count}}')" class="img-responsive card-img-top" style="height:100%;border-radius: 8px;background: #000;"
														loop preload="none" onclick="modelbox_open('{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}', {{ $video->video_id }}, video_{{$count}})"
														poster="{{  $video->thumb }}">
														<source src="{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}" type="video/mp4">
													</video>
												</div>
												<div class="card-body">
													<h5 class="card-title mb-0">{{ strtolower($video->username) }}</h5>
													<p class="card-text mb-1"><?php echo (strlen($video->description) > 30 ) ? mb_substr($video->description, 0, 30).'...' : $video->description; ?></p>
													
												</div>
											</div>
										</div>
										<?php 
											$count++;
										}
										 ?>
										
									</div>
									@if($loadedVideos < $totalVideos)
										<div class="col-12 text-center">
											<button class="loadMoreResult m-2" type="V">Load More..</button>
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
			</div>
		</div>
		<div class="floating-shapes">
			<span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'><img src="{{ asset('default/fl-shape-1.png') }}" alt=""></span>
			<span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'><img src="{{ asset('default/fl-shape-2.png') }}" alt=""></span>
			<span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'><img src="{{ asset('default/fl-shape-3.png') }}" alt=""></span>
			<span data-parallax='{"x": -20, "y": 180}'><img src="{{ asset('default/fl-shape-4.png') }}" alt=""></span>
			<span data-parallax='{"x": 300, "y": 70}'><img src="{{ asset('default/fl-shape-5.png') }}" alt=""></span>
			<span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'><img src="{{ asset('default/fl-shape-6.png') }}" alt=""></span>
			<span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'><img src="{{ asset('default/fl-shape-7.png') }}" alt=""></span>
			<span data-parallax='{"x": 250, "y": -30, "rotateX":2000}'><img src="{{ asset('default/fl-shape-8.png') }}" alt=""></span>
			<span data-parallax='{"x": 60, "y": -100}'><img src="{{ asset('default/fl-shape-9.png') }}" alt=""></span>
			<span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'><img src="{{ asset('default/fl-shape-10.png') }}" alt=""></span>
		</div>
	</section><!-- about -->
 <!-- Modal -->
 <div class="modal fade mx-auto" id="LeukeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content" style="position: relative; height:100%; margin-top:10%;z-index: 99999;">
		
		<div class="modal-body p-0">
			<div class="container-fluid">
				<div class="row">
					<button type="button" class="close d-lg-none d-block" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				  <div class="col-md-5 p-3" >
					<div class="card">
					
						{{-- <video id="leukeVideo" class="videoInsert" style="height:100vh;" loop>
							<source src="" type="video/mp4">
							<!--Browser does not support <video> tag -->
						</video> --}}
						<div class="user-top-info">
							<div class="user-profile-info">
								<a class="pjax row" href="">
									<div class="col-md-3 col-3">
										<img src="" alt="" id="user-profile-img">
									</div>
									<div class="col-md-9 col-9 px-2">
										<div class=""><span id="user-profile-info"></span></div>
										<div class="follow_div"></div>
									</div>
								</a>
							</div>
							<!-- <div class="arrow-button">
								<a href="javascript:void(0)" onclick="ellipsis_open('bn')"><i class="fa fa-ellipsis-h"></i></a>
							</div> -->
						</div>
						<div class="video-section" onclick="play()">
							<video id="leukeVideo" autoplay="" loop style="height:100%;background: #000;">
								<source src="" type="video/mp4">
							</video>
							<div class="modal_user_name">
						
									@<span class="video_user_name">ssss</span> 
										<span class="verified_account">
											<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
										</span>
										<br>
									<div class="video_view modal_video_view" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-eye"></i> <span class="views_count">0</span></div>
									<div class="video_title"></div>
							
							</div>
							{{-- <div class="video-action">
								<a href="javascript:void(0)" class="play" style=""><i class="fa fa-play"></i></a>
							</div> --}}
						</div>
						<div class="modal-video-post-action row">
							<div class="modal-main-action col-md-12">
								<div class="row text-center">
									<div class="col-md-6 col-6"><i id="video-like" class="fa fa-heart-o" onclick="videoLike()" ></i><br />Like </div>
									<div class="col-md-6 col-6"><i id="video-share" class="fa fa-share-square-o ml-2"  data-bs-toggle="popover"></i> <br />Share </div>
									<!-- <div class="col-md-4"><i class="fa fa-ellipsis-h"></i><br /> More </div> -->
								</div>
							</div>
							<div class="col-md-6 text-right">
								<!-- <div class="modal-total-views" id="modal-total-views">
									{{-- 1.3k+ views --}}
								</div>
								<div class="modal-video-date" id="modal-video-date">
									{{-- July 25, 2020 --}}
									{{ date('M d, Y') }}
								</div> -->
							</div>
						</div>
					</div>
				  </div>
				  <!-- <div class="col-md-5 ml-auto"> -->
				  @if (!auth()->guard('web')->check())
				  <div class="col-md-7" style="background-image: url('default/comment-s.jpg');background-size: 100% 100%;">
				  @else
				  	<div class="col-md-7">
				  @endif
				
					{{-- <div class=" d-flex"> --}}
						{{-- @if (auth()->guard('admin')->check())
							<img src="{{ asset('img/author.jpg')}}" class="rounded-circle" style="width: 50px" alt="Cinque Terre"> 
							<div class="pl-2 my-auto">{{ auth()->guard('admin')->user()->name }} </div>
						@else
						<i class="fa fa-sign-in" aria-hidden="true"></i>  Login
						@endif --}}
						<div class="modal-right-section">
							<!-- <div class="user-top-info">
								<div class="user-profile-info">
									<a class="pjax" href="">
										 <img src="" alt="" id="user-profile-img">@<span id="user-profile-info"></span></a>
								</div>
								<div class="arrow-button">
									<a href="javascript:void(0)" onclick="ellipsis_open('bn')"><i class="fa fa-ellipsis-h"></i></a>
								</div>
							</div> -->
							@if (auth()->guard('web')->check())
							<h5 style="color:#000;margin: 20px 0px;">Comments</h5>
							@endif
							<input type="hidden" id="video_id" value="">
							<div class="modal-comment-list" id="modal-comment-list">
																									
							</div>
							@if (auth()->guard('web')->check())
							<div class="modal-video-comment mt-1" id="modal-video-comment" style="padding-left: 30px;">
								
								<form action="" id="modal-comment-form" method="POST">
									@csrf
									<div class="d-flex flex-row justify-content-around p-2 border" style="border-radius: 9999px;background-color: #f6f4f4;width: 95%;">
										<input type="text" name="video_comment" class="border-0" id="video_comment" placeholder="Add Your Comment" style="width: 85%;height:30px;background-color: #f6f4f4;padding: 15px;">
										<a href="javascript:void(0)" style="margin:auto"><i class="fa fa-paper-plane-o" aria-hidden="true" onclick="$('#modal-comment-form').submit();"></i></a>
									</div>
								</form>
								<br />
							</div>
							@endif

							@if (!auth()->guard('web')->check())
								<div class="send-comment-area">
									<div class="card">
										<h4>Login To See &<br /> Add Comments</h4>
										<div class="please-login text-center">
											<a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()"><button class="btn model-login-btn" style="{{MyFunctions::getTopbarColor()}}">Login / Register with Email</button></a>
											<a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()"><button class="btn model-google-btn"><img width="16px" src="{{asset('default/Google__G__Logo.png') }}"> &nbsp;Sign In With Google</button></a>
											<!-- <a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()"><button class="btn model-google-btn"><img width="16px" src="{{asset('default/facebook-icon.png') }}"> &nbsp;Sign In With Google</button></a> -->
											<!-- <p>Please <a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()">Login</a> or 
												<a href="{{ route('web.register') }}" class="pjax" onclick="profileshow()">SignUp</a></p> -->
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>
				  {{-- </div> --}}
				</div>
			</div>
		</div>
		{{-- <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div> --}}
	  </div>
	</div>
</div>
@endsection