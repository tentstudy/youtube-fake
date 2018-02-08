<link rel="stylesheet" href="/css/comment.css">
<div class="comment">
	<div class="number">
		<div class="sum_number">1.000.000 nhận xét</div>
		<div class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="material-icons sort">sort</i> Sắp xếp theo
			</button>
			<ul class="dropdown-menu">
				<li><a href="#">Nhận xét hàng đầu</a></li>
				<li><a href="#">Nhận xét mới nhất</a></li>
			</ul>
		</div>
	</div><br>
	<div class="clearfix">
		
	</div>
	<!--  -->
	<div class="row">
		<div class="img_user">
			<img src="../images/img.png" alt="">
		</div>
		<div class="text_input">
			<input class="your_comment" type="text" placeholder="Thêm nhận xét công khai...">
		</div>
	</div><br>
	<!--  -->
	<?php for ($i=0; $i <10 ; $i++): ?>
	<div class="row">
		<div class="img_user">
			<img src="../images/img.png" alt="">
		</div>
		<!--  -->
		<div class="text_comment">
			<p class="user"><b><a href="">Youtube member</a></b> <span>1 giờ trước</span></p>
			<p>Great!!!</p>
			<ul class="answer">
				<li><a href="0">TRẢ LỜI</a></li>
				<li>6969</li>
				<li><a href=""><i class="material-icons">thumb_up</i></a></li>
				<li><a href=""><i class="material-icons">thumb_down</i></a></li>
			</ul>
		</div>
	</div><br>
	<?php endfor ?>
</div>