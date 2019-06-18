
<div class="container" style="margin-top:100px;" ng-app="myApp" ng-controller="SeoCtrl">
	<div class="row">
		<div class="Col-lg-12">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#site">SITE SEO</a></li>
			  <li><a data-toggle="tab" href="#q_seo">QUESTION SEO</a></li>
			  <li><a data-toggle="tab" href="#title_seo">TITLE SEO</a></li>
			</ul>

			<div class="tab-content text-info">
			  <div class=" tab-pane fade in active" id="site" >
			  <br/>
				<div  class="row">
					<div class="col-lg-6">
						<h3 style="color:#FD3768;">SITE SEO</h3>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Meta Title</strong>
							</div>
							<div class="col-lg-8">
							<input type="text" class="form-input" placeholder="Enter Meta Title" value="<?php echo isset($site_seo[0]->meta_value); ?>" ng-model="site_title">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Meta Description</strong>
							</div>
							<div class="col-lg-8">
							<textarea type="text" class="form-input-textarea" placeholder="Enter Meta Description" ng-model="site_description"></textarea>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Meta Keyword</strong>
							</div>
							<div class="col-lg-8">
							<input type="text" class="form-input" ng-model="site_keyword" placeholder="Enter Meta Keyword">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Robots Meta Noindex</strong>
							</div>
							<div class="col-lg-8">
							<label class="switch">
							  <input type="checkbox"  ng-model="site_index" >
							  <span class="slider round"></span>
							</label> 
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Robots Meta Nofollow</strong>
							</div>
							<div class="col-lg-8">
							<label class="switch">
							  <input type="checkbox"  ng-model="site_follow" >
							  <span class="slider round"></span>
							</label> 
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-12">
							<button type="button" class="btn btn-default w3-btn pull-right" ng-click="site_seo()"> &nbsp; &nbsp; Save &nbsp; &nbsp; </button>
							</div>
						</div>
					</div>
					<div class="col-lg-6"></div>
				</div>
			  </div>
			  <div class=" tab-pane fade" id="q_seo" >
				<h3 style="color:#FD3768;">QUESTION SEO</h3>
						<br/>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-4">
							<strong>Meta Title</strong>
							</div>
							<div class="col-lg-8">
							<input type="text" class="form-input" placeholder="Enter Meta Title" ng-model="question_title">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Robots Meta Noindex</strong>
							</div>
							<div class="col-lg-8">
							<label class="switch">
							  <input type="checkbox" ng-model="question_index" >
							  <span class="slider round"></span>
							</label> 
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>Robots Meta Nofollow</strong>
							</div>
							<div class="col-lg-8">
							<label class="switch">
							  <input type="checkbox" ng-model="question_follow" >
							  <span class="slider round"></span>
							</label> 
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-12">
							<button type="button" class="btn btn-default w3-btn pull-right" ng-click="question_seo()"> &nbsp; &nbsp; Save &nbsp; &nbsp; </button>
							</div>
						</div>
					</div>
					<div class="col-lg-6"></div>
			  </div>
			  <div class="tab-pane fade" id="title_seo">
				<h3 style="color:#FD3768;">TITLE SEO</h3>
						<br/>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-4">
							<strong>Search Page</strong>
							</div>
							<div class="col-lg-8">
							<input type="text" class="form-input" placeholder="Enter Search Page" ng-model="search_page">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-4">
							<strong>404 Page</strong>
							</div>
							<div class="col-lg-8">
							<input type="text" class="form-input" placeholder="Enter 404 Page" ng-model="notfound_page">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-12">
							<button type="button" class="btn btn-default w3-btn pull-right" ng-click="page_seo()"> &nbsp; &nbsp; Save &nbsp; &nbsp; </button>
							</div>
						</div>
					</div>
					<div class="col-lg-6"></div>
			  </div>
			</div>
		</div>
	</div>
</div>
